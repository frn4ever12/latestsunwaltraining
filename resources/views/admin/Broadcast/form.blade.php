@extends('admin.includes.main')

@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">प्रसारित सन्देश</h3>
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
                <a href="{{ route('admin.broadcast.index') }}">प्रसारित सन्देश</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ isset($broadcast->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ थप्नुहोस्' }}</a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">विवरणहरू</h4>
        </div>
        <div class="card-body">
            <form
                action="{{ isset($broadcast->id) ? route('admin.broadcast.update', $broadcast->id) : route('admin.broadcast.store') }}"
                method="POST">
                @csrf
                @if (isset($broadcast->id))
                    @method('PUT')
                @endif

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="title_np" class="form-label ">नाम (नेपाली)</label>
                        <input type="text" class="form-control @error('title_np') is-invalid @enderror" id="title_np"
                            name="title_np" value="{{ old('title_np', $broadcast->title_np ?? '') }}" placeholder="नाम">
                        @error('title_np')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="title_eng" class="form-label ">नाम (अंग्रेजी)</label>
                        <input type="text" class="form-control @error('title_eng') is-invalid @enderror" id="title_eng"
                            name="title_eng" value="{{ old('title_eng', $broadcast->title_eng ?? '') }}" placeholder="नाम">
                        @error('title_eng')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="message" class="form-label">सन्देश</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message"
                            placeholder="सन्देश">{{ old('message', $broadcast->message ?? '') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label ">स्थिति</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                            <option disabled>-- छान्नुहोस् --</option>
                            <option value="1" {{ old('status', $broadcast->status ?? '') == '1' ? 'selected' : '' }}>
                                सक्रिय
                            </option>
                            <option value="0" {{ old('status', $broadcast->status ?? '') == '0' ? 'selected' : '' }}>
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
                        {{ isset($broadcast->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
