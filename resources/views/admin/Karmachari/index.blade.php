@extends('admin.includes.main')

@section('head')
    @include('admin.includes.datatables-css')
@endsection

@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">कर्मचारीको सूची</h3>
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
                <a href="#">कर्मचारी</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.karmachari.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>&nbsp; नयाँ थप्नुहोस्
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="fixed-header-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>क्र.सं.</th>
                                    <th>फोटो</th>
                                    <th>नाम,थर</th>
                                    <th>पद</th>
                                    <th>शाखा</th>
                                    <th>सम्पर्क नं.</th>
                                    <th>ईमेल</th>
                                    <th>स्थिती</th>
                                    <th>क्रियाकलाप</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ \App\Helpers\NumberHelper::toNepaliNumber($loop->iteration) }}</td>
                                        <td><img src="{{ route('file.show',$data->photo) }}" height="60px" alt=""></td>
                                        <td>{{ $data->fullname_np ?? $data->fullname_eng }}</td>
                                        <td>{{ $data->padh_np ?? $data->padh_eng }}</td>
                                        <td>{{ $data->shakha_np ?? $data->shakha_eng }}</td>
                                        <td>{{ $data->contact_no }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>
                                            <button class="btn btn-sm {{ $data->status == 1 ? 'btn-success' : 'btn-secondary' }}">
                                                {{ $data->status == 1 ? 'सक्रिय' : 'निस्क्रिय' }}
                                            </button>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.karmachari.edit', $data->id) }}" 
                                               class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" 
                                                    class="btn btn-danger btn-sm deleteBtn"
                                                    data-route="{{ route('admin.karmachari.destroy', $data->id) }}">
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
