@extends('admin.includes.main')

@section('head')
    @include('admin.includes.datatables-css')
@endsection

@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">प्रमाणपत्र ढाँचाहरु</h3>
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
                <a href="#">प्रमाणपत्र ढाँचाहरु</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.certificate.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>&nbsp; नयाँ थप्नुहोस्
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="fixed-header-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>क्र.सं.</th>
                                    <th>प्रमाण-पत्र</th>
                                    <th>स्थिती</th>
                                    <th>क्रियाकलाप</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ \App\Helpers\NumberHelper::toNepaliNumber($loop->iteration) }}</td>
                                        <td>ढाँचा-{{ \App\Helpers\NumberHelper::toNepaliNumber($loop->iteration)  }}</td>
                                        <td>
                                            <button class="btn btn-sm {{ $data->status == 1 ? 'btn-success' : 'btn-secondary' }}">
                                                {{ $data->status == 1 ? 'सक्रिय' : 'निस्क्रिय' }}
                                            </button>
                                        </td>
                                        <td>
                                            <a target="_blank" href="{{ route('admin.certificate.show', $data->id) }}" 
                                               class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.certificate.edit', $data->id) }}" 
                                               class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" 
                                                    class="btn btn-danger btn-sm deleteBtn"
                                                    data-route="{{ route('admin.certificate.destroy', $data->id) }}">
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
