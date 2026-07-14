@extends('admin.includes.main')
@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">वडा नं.</h3>
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
                <a href="{{ route('admin.ward.index') }}">वडा नं.</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ isset($ward->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ थप्नुहोस्' }}</a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">विवरणहरू</h4>
        </div>
        <div class="card-body">
            <form action="{{ isset($ward->id) ? route('admin.ward.update', $ward->id) : route('admin.ward.store') }}"
                method="POST">
                @csrf
                @if (isset($ward->id))
                    @method('PUT')
                @endif

                <div class="mb-3 row">
                    <div class="col-md-4">
                        <label class="form-label ">वडा नं. (नेपाली)</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name', $ward->name ?? '') }}" placeholder="वडा नं." >
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label ">वडा नं. (अंग्रेजी)</label>
                        <input type="text" class="form-control @error('name_eng') is-invalid @enderror" name="name_eng"
                            value="{{ old('name_eng', $ward->name_eng ?? '') }}" placeholder="वडा नं." >
                        @error('name_eng')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label ">स्थिति</label>
                        <select class="form-select @error('status') is-invalid @enderror" name="status" >
                            <option value="1" {{ old('status', $ward->status ?? '1') == '1' ? 'selected' : '' }}>
                                सक्रिय
                            </option>
                            <option value="0" {{ old('status', $ward->status ?? '1') == '0' ? 'selected' : '' }}>
                                निस्क्रिय
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i>&nbsp;
                                {{ isset($ward->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
