@extends('admin.includes.main')

@section('head')
    @include('admin.includes.datatables-css')
@endsection
@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">सम्पर्क</h3>
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
                <a href="#">सम्पर्क</a>
            </li>
        </ul>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card p-4">
        <table class="table table-bordered table-hover" id="datatable">
            <thead>
                <tr>
                    <th>क्र.सं.</th>
                    <th>नाम</th>
                    <th>ईमेल</th>
                    <th>फोन नम्बर</th>
                    <th>विषय</th>
                    <th>सन्देश</th>
                    <th>क्रियाकलाप</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ Str::limit($contact->message, 50) }}</td>
                        <td>
                            <a href="{{ route('admin.contact.show', $contact->id) }}" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
@section('scripts')
    @include('admin.includes.datatables-scripts')
    @include('admin.includes.sweet-alert-script')
@endsection
