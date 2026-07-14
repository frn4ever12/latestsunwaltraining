@extends('admin.includes.main')

@section('head')
    <style>
        .premium-form-card {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .premium-form-card .card-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 12px 12px 0 0;
            border: none;
        }

        .premium-form-card .card-header h4 {
            margin: 0;
            font-weight: 600;
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }

        .form-label::after {
            content: ' *';
            color: #dc3545;
        }

        .btn-premium {
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .input-group-text {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 8px 0 0 8px;
        }

        .form-control.is-invalid {
            border-color: #dc3545;
            background-image: none;
        }

        .form-control.is-valid {
            border-color: #28a745;
            background-image: none;
        }

        .invalid-feedback {
            font-size: 0.85rem;
            color: #dc3545;
        }

        .required-mark {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
<div class="page-header mb-4" data-aos="fade-down">
    <h3 class="mb-3 fw-bold">
        <i class="fas fa-building text-primary me-2"></i>
        विभाग
    </h3>
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
            <a href="{{ route('admin.department.index') }}">विभाग</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">{{ isset($department->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ थप्नुहोस्' }}</a>
        </li>
    </ul>
</div>

<div class="card premium-form-card" data-aos="fade-up">
    <div class="card-header">
        <h4 class="card-title">
            <i class="fas fa-info-circle me-2"></i>
            विवरणहरू
        </h4>
    </div>
    <div class="card-body">
        <form action="{{ isset($department->id) ? route('admin.department.update', $department->id) : route('admin.department.store') }}" 
              method="POST" id="departmentForm">
            @csrf
            @if(isset($department->id))
                @method('PUT')
            @endif

            <div class="mb-4 row">
                <div class="col-md-6">
                    <label for="name_np" class="form-label">नाम (नेपाली)</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-font"></i>
                        </span>
                        <input type="text" 
                               class="form-control @error('name_np') is-invalid @enderror" 
                               id="name_np"
                               name="name_np" 
                               value="{{ old('name_np', $department->name_np ?? '') }}" 
                               placeholder="नेपालीमा नाम लेख्नुहोस्"
                               required
                               >
                    </div>
                    @error('name_np')
                        <div class="invalid-feedback mt-1">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="name_eng" class="form-label">नाम (अंग्रेजी)</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-font"></i>
                        </span>
                        <input type="text" 
                               class="form-control @error('name_eng') is-invalid @enderror" 
                               id="name_eng"
                               name="name_eng" 
                               value="{{ old('name_eng', $department->name_eng ?? '') }}" 
                               placeholder="English name"
                               required
                               >
                    </div>
                    @error('name_eng')
                        <div class="invalid-feedback mt-1">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 row">
                <div class="col-md-6">
                    <label for="status" class="form-label">स्थिति</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-toggle-on"></i>
                        </span>
                        <select class="form-select @error('status') is-invalid @enderror" 
                                id="status" 
                                name="status"
                                required
                                >
                            <option value="">-- छान्नुहोस् --</option>
                            <option value="1" {{ old('status', $department->status ?? '') == '1' ? 'selected' : '' }}>
                                सक्रिय
                            </option>
                            <option value="0" {{ old('status', $department->status ?? '') == '0' ? 'selected' : '' }}>
                                निष्क्रिय
                            </option>
                        </select>
                    </div>
                    @error('status')
                        <div class="invalid-feedback mt-1">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end gap-3 mt-5">
                <a href="{{ route('admin.department.index') }}" class="btn btn-premium btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    फिर्ता जानुहोस्
                </a>
                <button type="submit" class="btn btn-premium btn-primary" id="submitBtn">
                    <i class="fa fa-save me-2"></i>
                    {{ isset($department->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('departmentForm');
    const submitBtn = document.getElementById('submitBtn');

    form.addEventListener('submit', function(e) {
        let isValid = true;
        
        // Validate required fields
        const requiredFields = form.querySelectorAll('[required]');
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                isValid = false;
            } else {
                field.classList.remove('is-invalid');
                field.classList.add('is-valid');
            }
        });

        if (!isValid) {
            e.preventDefault();
            showToastAdmin('कृपया सबै आवश्यक फिल्डहरू भर्नुहोस्', 'error');
        } else {
            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> बचत गर्दै...';
        }
    });

    // Remove validation on input
    form.querySelectorAll('input, select').forEach(field => {
        field.addEventListener('input', function() {
            this.classList.remove('is-invalid');
            if (this.value.trim()) {
                this.classList.add('is-valid');
            } else {
                this.classList.remove('is-valid');
            }
        });
    });
});
</script>
@endsection
