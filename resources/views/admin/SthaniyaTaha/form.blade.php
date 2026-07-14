@extends('admin.includes.main')
@section('content')
<div class="page-header">
    <h3 class="mb-3 fw-bold">स्थानिय तह</h3>
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
            <a href="#">स्थानिय तह</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">{{ isset($sthaniya_taha->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ थप्नुहोस्' }}</a>
        </li>
    </ul>
</div>

<div class="card">
    <div class="card-header">
        Details
    </div>
    <div class="card-body">
        <form action="{{ isset($sthaniya_taha->id) ? route('admin.sthaniya-taha.update', $sthaniya_taha) : route('admin.sthaniya-taha.store') }}" 
              method="POST">
            @csrf
            @if(isset($sthaniya_taha->id))
                @method('PUT')
            @endif

            <div class="mb-3 row">
                <div class="col-4">
                    <label for="name" class="form-label">स्थानिय तह (नेपाली) *</label>
                    <input type="text" 
                           class="form-control @error('name') is-invalid @enderror"
                           id="name"
                           name="name" 
                           value="{{ old('name', $sthaniya_taha->name ?? '') }}" 
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <label for="name_eng" class="form-label">स्थानिय तह (अंग्रेजी) *</label>
                    <input type="text" 
                           class="form-control @error('name_eng') is-invalid @enderror"
                           id="name_eng"
                           name="name_eng" 
                           value="{{ old('name_eng', $sthaniya_taha->name_eng ?? '') }}" 
                           required>
                    @error('name_eng')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <label for="district_id" class="form-label">जिल्ला *</label>
                    <select class="form-select @error('district_id') is-invalid @enderror" 
                            id="district_id"
                            name="district_id"
                            required>
                        <option value="">-- जिल्ला छान्नुहोस् --</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}" 
                                {{ old('district_id', $sthaniya_taha->district_id ?? '') == $district->id ? 'selected' : '' }}>
                                {{ $district->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('district_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-4">
                    <label for="status" class="form-label">स्थिति *</label>
                    <select class="form-select @error('status') is-invalid @enderror" 
                            id="status"
                            name="status"
                            required>
                        <option value="1" {{ old('status', $sthaniya_taha->status ?? '1') == '1' ? 'selected' : '' }}>
                            सक्रिय
                        </option>
                        <option value="0" {{ old('status', $sthaniya_taha->status ?? '1') == '0' ? 'selected' : '' }}>
                            निस्क्रिय
                        </option>
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
                        {{ isset($sthaniya_taha->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
