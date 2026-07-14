@extends('admin.includes.main')
@section('content')
<div class="page-header">
    <h3 class="mb-3 fw-bold">प्रदेश</h3>
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
            <a href="#">प्रदेश</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">{{ isset($province->id) ? 'प्रदेश सम्पादन' : 'नयाँ प्रदेश' }}</a>
        </li>
    </ul>
</div>

<div class="card">
    <div class="card-header">
        विवरण
    </div>
    <div class="card-body">
        <form role="form" action="{{ isset($province->id) ? route('admin.province.update', $province) : route('admin.province.store') }}" method="POST">
            @csrf
            @if(isset($province->id))
                @method('PUT')
            @endif
            
            <div class="mb-3 row">
                <div class="col-4">
                    <label class="form-label">प्रदेश (नेपाली)<span style="color:red">*</span></label>
                    <input class="form-control @error('name') is-invalid @enderror" 
                        placeholder="प्रदेश" id="name" name="name" type="text" 
                        value="{{ old('name', $province->name ?? '') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label class="form-label">प्रदेश (अंग्रेजी)<span style="color:red">*</span></label>
                    <input class="form-control @error('name_eng') is-invalid @enderror" 
                        placeholder="Province" id="name_eng" name="name_eng" type="text" 
                        value="{{ old('name_eng', $province->name_eng ?? '') }}" required>
                    @error('name_eng')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label class="form-label">स्थिति</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                        <option value="1" {{ (old('status', $province->status ?? '1') == '1') ? 'selected' : '' }}>सक्रिय</option>
                        <option value="0" {{ (old('status', $province->status ?? '1') == '0') ? 'selected' : '' }}>निस्क्रिय</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-grid">
                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i>&nbsp;
                        {{ isset($province->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
