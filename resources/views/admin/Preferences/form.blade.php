@extends('admin.includes.main')
@section('content')
<div class="page-header">
    <h3 class="mb-3 fw-bold">प्राथमिकता</h3>
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
            <a href="#">प्राथमिकता</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">{{ isset($preference->id) ? 'प्राथमिकता सम्पादन' : 'नयाँ प्राथमिकता' }}</a>
        </li>
    </ul>
</div>

<div class="card">
    <div class="card-header">
        विवरण
    </div>
    <div class="card-body">
        <form role="form" action="{{ isset($preference->id) ? route('admin.preference.update', $preference) : route('admin.preference.store') }}" method="POST">
            @csrf
            @if(isset($preference->id))
                @method('PUT')
            @endif
            
            <div class="mb-3 row">
                <div class="col-4">
                    <label class="form-label">नाम (नेपाली)<span style="color:red">*</span></label>
                    <input class="form-control @error('name_np') is-invalid @enderror" 
                        placeholder="नाम" id="name_np" name="name_np" type="text" 
                        value="{{ old('name_np', $preference->name_np ?? '') }}" required>
                    @error('name_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label class="form-label">नाम (अंग्रेजी)<span style="color:red">*</span></label>
                    <input class="form-control @error('name_eng') is-invalid @enderror" 
                        placeholder="Preference" id="name_eng" name="name_eng" type="text" 
                        value="{{ old('name_eng', $preference->name_eng ?? '') }}" required>
                    @error('name_eng')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label class="form-label">स्थिति</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                        <option value="1" {{ (old('status', $preference->status ?? '1') == '1') ? 'selected' : '' }}>सक्रिय</option>
                        <option value="0" {{ (old('status', $preference->status ?? '1') == '0') ? 'selected' : '' }}>निस्क्रिय</option>
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
                        {{ isset($preference->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
