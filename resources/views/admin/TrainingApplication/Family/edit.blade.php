@extends('admin.includes.main')
@section('content')
    <div class="card">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">परिवार विवरण सम्पादन गर्नुहोस्</h5>
        </div>
        <div class="card-body">
            <form method="post"
                action="{{ route('training-application.family.update', ['detail' => $detail->id, 'training' => $detail->trainingApplication->training_id, 'application' => $detail->training_application_id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-sm-12 col-md-4">
                        <label for="name" class="form-label">नाम <span class="text-danger">*</span></label>
                        <input type="text"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            id="name" name="name"
                            value="{{ old('name', $detail->name ?? '') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <label for="relationship" class="form-label">सम्बन्ध <span class="text-danger">*</span></label>
                        <select class="form-control {{ $errors->has('relationship') ? 'is-invalid' : '' }}"
                            id="relationship" name="relationship" required>
                            <option value="">--कृपया छान्नुहोस्--</option>
                            <option value="father" {{ old('relationship', $detail->relationship ?? '') == 'father' ? 'selected' : '' }}>बुबा</option>
                            <option value="mother" {{ old('relationship', $detail->relationship ?? '') == 'mother' ? 'selected' : '' }}>आमा</option>
                            <option value="spouse" {{ old('relationship', $detail->relationship ?? '') == 'spouse' ? 'selected' : '' }}>जीवनसाथी</option>
                            <option value="son" {{ old('relationship', $detail->relationship ?? '') == 'son' ? 'selected' : '' }}>छोरा</option>
                            <option value="daughter" {{ old('relationship', $detail->relationship ?? '') == 'daughter' ? 'selected' : '' }}>छोरी</option>
                            <option value="brother" {{ old('relationship', $detail->relationship ?? '') == 'brother' ? 'selected' : '' }}>दाजु/भाइ</option>
                            <option value="sister" {{ old('relationship', $detail->relationship ?? '') == 'sister' ? 'selected' : '' }}>दिदी/बहिनी</option>
                            <option value="other" {{ old('relationship', $detail->relationship ?? '') == 'other' ? 'selected' : '' }}>अन्य</option>
                        </select>
                        @error('relationship')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="occupation" class="form-label">पेशा</label>
                        <input type="text" class="form-control {{ $errors->has('occupation') ? 'is-invalid' : '' }}"
                            id="occupation" name="occupation"
                            value="{{ old('occupation', $detail->occupation ?? '') }}">
                        @error('occupation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="mobile" class="form-label">मोबाइल</label>
                        <input type="text" class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}"
                            id="mobile" name="mobile"
                            value="{{ old('mobile', $detail->mobile ?? '') }}">
                        @error('mobile')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">सुरक्षित गर्नुहोस्</button>
                    <a href="{{ route('training-application.edit', ['training' => $detail->trainingApplication->training_id, 'application' => $detail->training_application_id]) }}"
                        class="btn btn-secondary">रद्द गर्नुहोस्</a>
                </div>
            </form>
        </div>
    </div>
@endsection
