@extends('admin.includes.main')
@section('head')
    @include('admin.includes.datatables-css')
@endsection
@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">ग्यालेरीको सूची </h3>
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
                <a href="#">ग्यालेरी</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; नयाँ ग्यालेरी थप्नुहोस्</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="table display table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>सि.नं.</th>
                                    <th>शीर्षक</th>
                                    <th>स्थिति</th>
                                    <th>क्रियाकलाप</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->title ?? 'N/A' }}</td>
                                        <td>
                                            <button class="btn btn-sm {{ $data->status == 'active' ? 'btn-success' : 'btn-secondary' }}">
                                                {{ $data->status == 'active' ? 'Active' : 'Inactive' }}
                                            </button>
                                        </td>
                                        
                                        <td>
                                            <a href="{{ route('admin.gallery.edit', $data->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm deleteBtn"
                                                data-route="{{ route('admin.gallery.destroy', $data->id) }}">
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
