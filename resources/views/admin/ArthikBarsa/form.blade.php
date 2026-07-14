@extends('admin.includes.main')

@section('content')
<div class="page-header">
    <h3 class="mb-3 fw-bold">आर्थिक वर्ष</h3>
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
            <a href="{{ route('admin.arthik-barsa.index') }}">आर्थिक वर्ष</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">{{ isset($arthik_barsa->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ थप्नुहोस्' }}</a>
        </li>
    </ul>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">विवरणहरू</h4>
    </div>
    <div class="card-body">
        <form action="{{ isset($arthik_barsa->id) ? route('admin.arthik-barsa.update', $arthik_barsa->id) : route('admin.arthik-barsa.store') }}" 
              method="POST">
            @csrf
            @if(isset($arthik_barsa->id))
                @method('PUT')
            @endif

            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="arthik_barsa" class="form-label ">आर्थिक वर्ष</label>
                    <input type="text" 
                           class="form-control @error('arthik_barsa') is-invalid @enderror" 
                           id="arthik_barsa"
                           name="arthik_barsa" 
                           value="{{ old('arthik_barsa', $arthik_barsa->arthik_barsa ?? '') }}" 
                           placeholder="आर्थिक वर्ष"
                           >
                    @error('arthik_barsa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="status" class="form-label ">स्थिति</label>
                    <select class="form-select @error('status') is-invalid @enderror" 
                            id="status" 
                            name="status"
                            >
                        <option disabled>-- छान्नुहोस् --</option>
                        <option value="1" {{ old('status', $arthik_barsa->status ?? '') == '1' ? 'selected' : '' }}>
                            सक्रिय
                        </option>
                        <option value="0" {{ old('status', $arthik_barsa->status ?? '') == '0' ? 'selected' : '' }}>
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
                    {{ isset($arthik_barsa->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Add any JavaScript functionality here
    });
</script>
@endsection
