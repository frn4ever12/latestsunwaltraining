@extends('admin.includes.main')
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
    <div class="card p-4 shadow-sm" style="background-color: white;">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>नाम</th>
                    <td>{{ $contact->name }}</td>
                </tr>
                <tr>
                    <th>ईमेल</th>
                    <td>{{ $contact->email }}</td>
                </tr>
                <tr>
                    <th>फोन नम्बर</th>
                    <td>{{ $contact->phone }}</td>
                </tr>
                <tr>
                    <th>विषय</th>
                    <td>{{ $contact->subject }}</td>
                </tr>
                <tr>
                    <th>सन्देश</th>
                    <td>{{ $contact->message }}</td>
                </tr>
            </table>
        </div>

        <div class="form-group">
            <a href="{{ route('admin.contact.index') }}" class="btn btn-primary">Back to सम्पर्क</a>
        </div>
    </div>
    </div>
@endsection
