@extends('admin.includes.main')
@section('content')
<div class="page-header">
    <h3 class="mb-3 fw-bold">कर्मचारी विवरण</h3>
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
            <a href="{{ route('admin.karmachari.index') }}">कर्मचारी सूची</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">{{ isset($karmachari->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ थप्नुहोस्' }}</a>
        </li>
    </ul>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">विवरणहरू</h4>
    </div>
    <div class="card-body">
        <form action="{{ isset($karmachari->id) ? route('admin.karmachari.update', $karmachari->id) : route('admin.karmachari.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($karmachari->id))
                @method('PUT')
            @endif

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label ">नाम,थर (नेपालीमा)</label>
                    <input type="text" 
                           class="form-control @error('fullname_np') is-invalid @enderror"
                           name="fullname_np"
                           value="{{ old('fullname_np', $karmachari->fullname_np ?? '') }}"
                            placeholder="नाम,थर">
                    @error('fullname_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label ">नाम,थर (अंग्रेजीमा)</label>
                    <input type="text" 
                           class="form-control @error('fullname_eng') is-invalid @enderror"
                           name="fullname_eng"
                           value="{{ old('fullname_eng', $karmachari->fullname_eng ?? '') }}"
                            placeholder="नाम,थर">
                    @error('fullname_eng')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label ">पद (नेपालीमा)</label>
                    <input type="text" 
                           class="form-control @error('padh_np') is-invalid @enderror"
                           name="padh_np"
                           value="{{ old('padh_np', $karmachari->padh_np ?? '') }}"
                            placeholder="पद">
                    @error('padh_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label ">पद (अंग्रेजीमा)</label>
                    <input type="text" 
                           class="form-control @error('padh_eng') is-invalid @enderror"
                           name="padh_eng"
                           value="{{ old('padh_eng', $karmachari->padh_eng ?? '') }}"
                            placeholder="पद">
                    @error('padh_eng')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label ">शाखा (नेपालीमा)</label>
                    <input type="text" 
                           class="form-control @error('shakha_np') is-invalid @enderror"
                           name="shakha_np"
                           value="{{ old('shakha_np', $karmachari->shakha_np ?? '') }}"
                            placeholder="शाखा">
                    @error('shakha_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label ">शाखा (अंग्रेजीमा)</label>
                    <input type="text" 
                           class="form-control @error('shakha_eng') is-invalid @enderror"
                           name="shakha_eng"
                           value="{{ old('shakha_eng', $karmachari->shakha_eng ?? '') }}"
                            placeholder="शाखा">
                    @error('shakha_eng')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
                <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label ">सम्पर्क नम्बर</label>
                    <input type="text" 
                           class="form-control @error('contact_no') is-invalid @enderror"
                           name="contact_no"
                           value="{{ old('contact_no', $karmachari->contact_no ?? '') }}"
                           minlength="10"
                           maxlength="10"
                            placeholder="सम्पर्क नम्बर">
                    @error('contact_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label ">ईमेल</label>
                    <input type="text" 
                           class="form-control @error('email') is-invalid @enderror"
                           name="email"
                           value="{{ old('email', $karmachari->email ?? '') }}"
                            placeholder="ईमेल">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label ">फोटो</label>
                    @if(isset($karmachari->photo))
                        <img src="{{  URL::temporarySignedRoute('file.show', now()->addMinutes(2),$karmachari->photo) }}" alt="Current Photo" class="img-thumbnail mb-2" style="max-width: 100%;">
                    @endif
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo">
                    @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="form-label ">स्थिति</label>
                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                        <option value="1" {{ old('status', $karmachari->status ?? '') == 1 ? 'selected' : '' }}>सक्रिय</option>
                        <option value="0" {{ old('status', $karmachari->status ?? '') == 0 ? 'selected' : '' }}>निस्क्रिय</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <label class="form-label">कैफियत</label>
                    <textarea class="form-control @error('kaifiyat') is-invalid @enderror" name="kaifiyat" id="" cols="30" rows="4">{{ old('kaifiyat', $karmachari->kaifiyat ?? '') }}</textarea>
                    @error('kaifiyat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i>&nbsp;
                        {{ isset($karmachari->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
