@extends('admin.includes.main')

@section('head')
    @include('admin.includes.datatables-css')
@endsection

@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">आवेदनको सूची</h3>
        <ul class="mb-3 breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">आवेदन</a>
            </li>
        </ul>
    </div>

    <div class="card my-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">आवेदक खोज्नुहोस्</h5>
                <button class="btn btn-link p-0" id="filterToggle">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div id="filterForm" class="collapse card-body">
            <form method="GET" id="filterData" action="{{ route('admin.application.index') }}">
                <div class="row g-2">
                    <div class="form-group col-md-3 col-12">
                        <input type="text" name="name_np" class="form-control" placeholder="तालीमको नाम"
                            value="{{ request('name_np') }}">
                    </div>
                    @unlessrole('trainee')
                        <div class="form-group col-md-3 col-12">
                            <input type="text" name="fullname_np" class="form-control" placeholder="आवेदकको नाम"
                                value="{{ request('fullname_np') }}">
                        </div>
                    @endunlessrole
                    <div class="form-group col-md-3 col-12">
                        <input type="text" name="start_miti_bs" placeholder="YYYY-MM-DD"
                            class="form-control nepali-datepicker" value="{{ request('start_miti_bs') }}">
                    </div>
                    <div class="form-group col-md-3 col-12">
                        <input type="text" name="end_miti_bs" placeholder="YYYY-MM-DD"
                            class="form-control nepali-datepicker" value="{{ request('end_miti_bs') }}">
                    </div>

                    <div class="form-group col-md-3 col-12">
                        <select name="category" class="form-control">
                            <option value="">क्याटेगोरी छान्नुहोस्</option>
                            @foreach (\App\Models\Category::select('id', 'name_np')->get() as $data)
                                <option value="{{ $data->id }}"
                                    {{ request('category') == $data->id ? 'selected' : '' }}>
                                    {{ $data->name_np }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i>
                        खोज्नुहोस्
                    </button>

                    <a href="{{ route('admin.application.index') }}" class="btn btn-secondary">
                        <i class="fas fa-undo"></i>
                        रिसेट
                    </a>
                </div>

            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="fixed-header-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>क्र.सं.</th>
                                    <th>आवेदन नं.</th>
                                    <th>आवेदकको नाम</th>
                                    <th>तालिम नाम</th>
                                    <th>मिति</th>
                                    <th>स्थिती</th>
                                    <th>कैफियत</th>
                                    <th>वडा नं.</th>
                                    <th>क्रियाकलाप</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ \App\Helpers\NumberHelper::toNepaliNumber($loop->iteration) }}</td>
                                        <td>{{ \App\Helpers\NumberHelper::toNepaliNumber($data->application_no) ?? '' }}</td>
                                        <td>{{ $data->fullname_np ?? '' }}</td>
                                        <td>{{ $data->training->name_np ?? '' }}</td>
                                        <td>{{ \App\Helpers\NumberHelper::toNepaliNumber($data->application_miti_bs) ?? '' }}</td>
                                        <td>
                                            <button
                                                class="btn btn-sm 
    {{ $data->status == 'approved' ? 'btn-success' : ($data->status == 'declined' ? 'btn-danger' : 'btn-warning') }}">
                                                @if ($data->status == 'approved')
                                                    {{ 'स्वीकृत' }} <!-- Approved -->
                                                @elseif($data->status == 'declined')
                                                    {{ 'निष्क्रिय' }} <!-- Declined -->
                                                @else
                                                    {{ 'प्रोसेसिङ' }} <!-- Processing -->
                                                @endif
                                            </button>

                                        </td>

                                        <td>{{ $data->remarks ?? '' }}</td>
                                        <td>{{ $data->theganaDetail->sthyayiWard->name ?? '' }}</td>
                                        <td>
                                            <a href="{{ route('admin.application.show', ['training' => $data->training_id, 'application' => $data->id]) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            {{-- Case 1: User with manage_training permission gets Edit + Delete --}}
                                            @can('manage_training')
                                                <a href="{{ route('admin.application.edit', ['training' => $data->training_id, 'application' => $data->id]) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm deleteBtn"
                                                    data-route="{{ route('admin.application.destroy', $data->id) }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            @endcan

                                            {{-- Case 2: Other users who passed training_status & already_applied middleware --}}
                                            @cannot('manage_training')
                                                @if (auth()->user()->can('apply_training') && $data->status !== 'approved')
                                                    <a href="{{ route('admin.application.edit', ['training' => $data->training_id, 'application' => $data->id]) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                @endif
                                            @endcannot

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.includes.datatables-scripts')
    @include('admin.includes.sweet-alert-script')
    <script>
        $(document).ready(function() {
            $('#filterToggle').on('click', function() {
                $('#filterForm').slideToggle(300);
                $(this).find('i').toggleClass('fa-plus fa-minus');
            });
        });
    </script>
@endsection
