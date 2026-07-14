@extends('admin.includes.main')

@section('head')
    @include('admin.includes.datatables-css')
@endsection
@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">ब्यानरहरू</h3>
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
                <a href="#">ब्यानर</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.banner.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;
                        नयाँ ब्यानर थप्नुहोस्</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="table display table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>सि.नं.</th>
                                    <th>शीर्षक</th>
                                    <th>फोटो</th>
                                    <th>स्थिति</th>
                                    <th>क्रियाकलाप</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $banner)
                                    <tr>
                                        <td>{{ \App\Helpers\NumberHelper::toNepaliNumber($loop->iteration) }}</td>
                                        <td>{{ $banner->title }}</td>
                                        <td>
                                            @if (isset($banner->image))
                                                <img src="{{ asset('files/'.$banner->image) }}"
                                                    alt="Banner Image" width="80">
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-sm {{ $banner->status == 1 ? 'btn-success' : 'btn-secondary' }}">
                                                {{ $banner->status == 1 ? 'सक्रिय' : 'निस्क्रिय' }}
                                            </button>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.banner.edit', $banner->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm deleteBtn"
                                                data-route="{{ route('admin.banner.destroy', $banner->id) }}">
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
