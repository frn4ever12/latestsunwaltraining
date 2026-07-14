@extends('admin.includes.main')
@section('content')
<div class="page-header">
    <h3 class="mb-3 fw-bold">जिल्ला</h3>
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
            <a href="{{ route('admin.district.index') }}">जिल्ला</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">{{ isset($district->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ थप्नुहोस्' }}</a>
        </li>
    </ul>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">विवरणहरू</h4>
    </div>
    <div class="card-body">
        <form action="{{ isset($district->id) ? route('admin.district.update', $district->id) : route('admin.district.store') }}" 
              method="POST">
            @csrf
            @if(isset($district->id))
                @method('PUT')
            @endif

            <div class="mb-3 row">
                <div class="col-md-4">
                    <label class="form-label required">जिल्ला (नेपाली)</label>
                    <input type="text" 
                           class="form-control @error('name') is-invalid @enderror"
                           name="name" 
                           value="{{ old('name', $district->name ?? '') }}" 
                           placeholder="जिल्ला"
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label required">जिल्ला (अंग्रेजी)</label>
                    <input type="text" 
                           class="form-control @error('name_eng') is-invalid @enderror"
                           name="name_eng" 
                           value="{{ old('name_eng', $district->name_eng ?? '') }}" 
                           placeholder="जिल्ला"
                           required>
                    @error('name_eng')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label required">प्रदेश</label>
                    <select class="form-select @error('province_id') is-invalid @enderror" 
                            name="province_id"
                            required>
                        <option value="">-- प्रदेश छान्नुहोस् --</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}" 
                                {{ old('province_id', $district->province_id ?? '') == $province->id ? 'selected' : '' }}>
                                {{ $province->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('province_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-4">
                    <label class="form-label required">स्थिति</label>
                    <select class="form-select @error('status') is-invalid @enderror" 
                            name="status"
                            required>
                        <option value="1" {{ old('status', $district->status ?? '1') == '1' ? 'selected' : '' }}>
                            सक्रिय
                        </option>
                        <option value="0" {{ old('status', $district->status ?? '1') == '0' ? 'selected' : '' }}>
                            निस्क्रिय
                        </option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i>&nbsp;
                        {{ isset($district->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
