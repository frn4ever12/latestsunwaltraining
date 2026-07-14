@extends('admin.includes.main')
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <h3 class="mb-3 fw-bold">प्रयोगकर्ता भूमिका सुची</h3>
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
                <a href="#">भूमिका</a>
            </li>
        </ul>
    </div>
    <!-- Card Structure -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.prayog-karta-bhumika.create') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i>&nbsp;
                        <span>नयाँ राख्नुहोस्</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>भूमिका</th>
                                    <th>कार्य</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.prayog-karta-bhumika.edit', $data->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                            <button type="button" data-route="{{ route('admin.prayog-karta-bhumika.destroy', $data->id) }}" class="btn btn-sm btn-danger deleteBtn"><i class="fa fa-trash"></i></button>
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
