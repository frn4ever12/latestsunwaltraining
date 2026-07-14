@extends('admin.includes.main')
@section('head')
    @include('admin.includes.datatables-css')
@endsection
@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">प्राथमिकता सूची</h3>
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
                <a href="#">प्राथमिकता</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.preference.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>&nbsp;नयाँ राख्नुहोस्
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="fixed-header-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>क्र.स.</th>
                                    <th>नाम (नेपाली)</th>
                                    <th>नाम (अंग्रेजी)</th>
                                    <th>स्थिति</th>
                                    <th>क्रियाकलाप</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ \App\Helpers\NumberHelper::toNepaliNumber($loop->iteration) }}</td>
                                        <td>{{ $data->name_np }}</td>
                                        <td>{{ $data->name_eng }}</td>
                                        <td>
                                            <button class="btn btn-sm {{ $data->status == 1 ? 'btn-success' : 'btn-secondary' }}">
                                                {{ $data->status == 1 ? 'सक्रिय' : 'निस्क्रिय' }}
                                            </button>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.preference.edit', $data->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm deleteBtn"
                                                data-route="{{ route('admin.preference.destroy', $data->id) }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
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
@endsection
