@extends('admin.includes.main')

@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">शैक्षिक स्तर</h3>
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
                <a href="{{ route('admin.education-level.index') }}">शैक्षिक स्तर</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ isset($EducationLevel->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ थप्नुहोस्' }}</a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">विवरणहरू</h4>
        </div>
        <div class="card-body">
            <form
                action="{{ isset($EducationLevel->id) ? route('admin.education-level.update', $EducationLevel->id) : route('admin.education-level.store') }}"
                method="POST">
                @csrf
                @if (isset($EducationLevel->id))
                    @method('PUT')
                @endif

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="name_np" class="form-label">नाम (नेपाली)</label>
                        <input type="text" class="form-control @error('name_np') is-invalid @enderror" id="name_np"
                            name="name_np" value="{{ old('name_np', $EducationLevel->name_np ?? '') }}" placeholder="नाम">
                        @error('name_np')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="name_eng" class="form-label">नाम (अंग्रेजी)</label>
                        <input type="text" class="form-control @error('name_eng') is-invalid @enderror" id="name_eng"
                            name="name_eng" value="{{ old('name_eng', $EducationLevel->name_eng ?? '') }}"
                            placeholder="नाम">
                        @error('name_eng')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="status" class="form-label">स्थिति</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                            <option disabled>-- छान्नुहोस् --</option>
                            <option value="1"
                                {{ old('status', $EducationLevel->status ?? '') == '1' ? 'selected' : '' }}>
                                सक्रिय
                            </option>
                            <option value="0"
                                {{ old('status', $EducationLevel->status ?? '') == '0' ? 'selected' : '' }}>
                                निष्क्रिय
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save me-2"></i>
                        {{ isset($EducationLevel->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
