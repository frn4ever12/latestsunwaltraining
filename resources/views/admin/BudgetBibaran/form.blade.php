@extends('admin.includes.main')

@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">बजेट विवरण</h3>
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
                <a href="{{ route('admin.budgetBibaran.index') }}">बजेट विवरण</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ isset($bibaran->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ थप्नुहोस्' }}</a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">बजेट विवरणहरू</h4>
        </div>
        <div class="card-body">
            <form
                action="{{ isset($bibaran->id) ? route('admin.budgetBibaran.update', $bibaran->id) : route('admin.budgetBibaran.store') }}"
                method="POST">
                @csrf
                @if (isset($bibaran->id))
                    @method('PUT')
                @endif

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="name_np" class="form-label">बजेट नाम (नेपाली)</label>
                        <input type="text" class="form-control @error('name_np') is-invalid @enderror" id="name_np"
                            name="name_np" value="{{ old('name_np', $bibaran->name_np ?? '') }}" placeholder="नाम">
                        @error('name_np')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="name_eng" class="form-label">बजेट नाम (अंग्रेजी)</label>
                        <input type="text" class="form-control @error('name_eng') is-invalid @enderror" id="name_eng"
                            name="name_eng" value="{{ old('name_eng', $bibaran->name_eng ?? '') }}" placeholder="नाम">
                        @error('name_eng')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="rakam" class="form-label">रकम</label>
                        <input type="text" class="form-control @error('rakam') is-invalid @enderror" id="rakam"
                            name="rakam" value="{{ old('rakam', $bibaran->rakam ?? '') }}" placeholder="रकम">
                        @error('rakam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="department_id" class="form-label">विभाग</label>
                        <select class="form-select @error('department_id') is-invalid @enderror" id="department_id"
                            name="department_id">
                            <option value="" disabled selected>-- छान्नुहोस् --</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id', $bibaran->department_id ?? '') == $department->id ? 'selected' : '' }}>
                                    {{ $department->name_np }}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="status" class="form-label">स्थिति</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                            <option disabled>-- छान्नुहोस् --</option>
                            <option value="1" {{ old('status', $bibaran->status ?? '') == '1' ? 'selected' : '' }}>
                                सक्रिय
                            </option>
                            <option value="0" {{ old('status', $bibaran->status ?? '') == '0' ? 'selected' : '' }}>
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
                        {{ isset($bibaran->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
