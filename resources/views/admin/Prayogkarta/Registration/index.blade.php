@extends('admin.includes.main')
@section('head')
    @include('admin.includes.datatables-css')
@endsection
@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">प्रयोगकर्ता सुची</h3>
        <ul class="mb-3 breadcrumbs">
            <li class="nav-home">
                <a href="{{ route('dashboard') }}">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.prayog-karta-darta.index') }}">प्रयोगकर्ता सुची</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.prayog-karta-darta.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>&nbsp; नयाँ थप्नुहोस्
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-responsive" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>इमेल</th>
                                    <th>नाम</th>
                                    <th>भूमिका</th>
                                    <th>स्थिति</th>
                                    <th>कार्य</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->getRoleNames()->first() }}</td>
                                        <td>
                                            @if($data->approval_status == 'pending')
                                                <button class="btn btn-sm btn-warning">पेन्डिङ</button>
                                            @elseif($data->approval_status == 'approved')
                                                <button class="btn btn-sm btn-success">स्वीकृत</button>
                                            @elseif($data->approval_status == 'rejected')
                                                <button class="btn btn-sm btn-danger">अस्वीकृत</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($data->approval_status == 'pending')
                                                <form action="{{ route('admin.users.approve', $data->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('के तपाईं यो प्रयोगकर्तालाई स्वीकृत गर्न चाहनुहुन्छ?')">
                                                        <i class="fas fa-check"></i> स्वीकृत गर्नुहोस्
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.users.reject', $data->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('के तपाईं यो प्रयोगकर्तालाई अस्वीकार गर्न चाहनुहुन्छ?')">
                                                        <i class="fas fa-times"></i> अस्वीकार गर्नुहोस्
                                                    </button>
                                                </form>
                                            @elseif($data->approval_status == 'rejected')
                                                <form action="{{ route('admin.users.approve', $data->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('के तपाईं यो प्रयोगकर्तालाई स्वीकृत गर्न चाहनुहुन्छ?')">
                                                        <i class="fas fa-check"></i> स्वीकृत गर्नुहोस्
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="{{ route('admin.prayog-karta-darta.edit', $data->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm deleteBtn"
                                                data-route="{{ route('admin.prayog-karta-darta.destroy', $data->id) }}">
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
