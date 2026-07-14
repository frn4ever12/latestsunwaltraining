@extends('admin.includes.main')
@section('content')
    <div class="card">
         <div class="card-header d-flex justify-content-between align-items-center">
             <h5 class="card-title mb-0">शैक्षिक विवरण</h5>
         </div>
        <div class="card-body">
            <form method="post"
                action="{{ route('training-application.education.update', ['detail' => $detail->id, 'training' => $detail->trainingApplication->training_id, 'application' => $detail->training_application_id]) }}"
                enctype="multipart/form-data">
                @csrf
@method('PUT')
                <div class="row g-3">
                    <div class="col-sm-12 col-md-4">
                        <label for="education_level_id" class="form-label">शिक्षा स्तर <span
                                class="text-danger">*</span></label>
                        <select class="form-control {{ $errors->has('education_level') ? 'is-invalid' : '' }}"
                            id="education_level" name="education_level_id">
                            <option value="">--कृपया छान्नुहोस्--</option>
                            @foreach (\App\Models\EducationLevel::select('id', 'name_np')->get() as $data)
                                <option value="{{ $data->id }}"
                                    {{ old('education_level_id', $detail->education_level_id ?? '') == $data->id ? 'selected' : '' }}>
                                    {{ $data->name_np }}</option>
                            @endforeach
                        </select>
                        @error('education_level_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <label for="institution_name" class="form-label">शैक्षिक संस्थाको नाम
                        </label>
                        <input type="text"
                            class="form-control {{ $errors->has('institution_name') ? 'is-invalid' : '' }}"
                            id="institution_name" name="institution_name"
                            value="{{ old('institution_name', $detail->institution_name ?? '') }}" >
                        @error('institution_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="field_of_study" class="form-label">पढाइको विषय</label>
                        <input type="text" class="form-control {{ $errors->has('field_of_study') ? 'is-invalid' : '' }}"
                            id="field_of_study" name="field_of_study"
                            value="{{ old('field_of_study', $detail->field_of_study ?? '') }}">
                        @error('field_of_study')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <label for="passed_year" class="form-label">उत्तीर्ण वर्ष</label>
                        <input type="text" class="form-control" name="passed_year" id="passed_year"
                            value="{{ old('passed_year', $detail->passed_year ?? '') }}">
                        @error('passed_year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <label for="result_type" class="form-label">शैक्षिक मूल्याङ्कन</label>
                        <select class="form-control {{ $errors->has('result_type') ? 'is-invalid' : '' }}" id="result_type"
                            name="result_type">
                            <option value="">--कृपया छान्नुहोस्--</option>
                            <option value="grade"
                                {{ old('result_type', $detail->result_type ?? '') == 'grade' ? 'selected' : '' }}>
                                Grade</option>
                            <option value="percentage"
                                {{ old('result_type', $detail->result_type ?? '') == 'percentage' ? 'selected' : '' }}>
                                Percentage
                            </option>
                        </select>

                        @error('result_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="result_score" class="form-label">GPA / Percentage</label>
                        <input type="text" class="form-control {{ $errors->has('result_score') ? 'is-invalid' : '' }}"
                            id="result_score" name="result_score"
                            value="{{ old('result_score', $detail->result_score ?? '') }}">
                        @error('result_score')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="marksheet" class="form-label">शैक्षिक परिणाम पत्र</label>
                        <input type="file" class="form-control {{ $errors->has('marksheet') ? 'is-invalid' : '' }}"
                            id="marksheet" name="marksheet" accept="image/*,pdf">
                        @if (isset($detail->marksheet))
                            <a target="_blank"
                                href="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(2), $detail->marksheet) }}"
                                class="btn btn-sm btn-primary my-1"><i class="fa fa-eye me-2"></i>पूर्वलोकन
                                गर्नुहोस्</a>
                        @endif
                        @error('marksheet')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <label for="character_certificate" class="form-label">चरित्र
                            प्रमाणपत्र</label>
                        <input type="file"
                            class="form-control {{ $errors->has('character_certificate') ? 'is-invalid' : '' }}"
                            id="character_certificate" name="character_certificate" accept="image/*,pdf">
                        @if (isset($detail->character_certificate))
                            <a target="_blank"
                                href="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(2), $detail->character_certificate) }}"
                                class="btn btn-sm btn-primary my-1"><i class="fa fa-eye me-2"></i>पूर्वलोकन
                                गर्नुहोस्</a>
                        @endif
                        @error('character_certificate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <label for="equivalency_certificate" class="form-label">समकक्षता
                            प्रमाणपत्</label>
                        <input type="file"
                            class="form-control {{ $errors->has('equivalency_certificate') ? 'is-invalid' : '' }}"
                            id="equivalency_certificate" name="equivalency_certificate" accept="image/*,pdf">
                        @if (isset($detail->equivalency_certificate))
                            <a target="_blank"
                                href="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(2), $detail->equivalency_certificate) }}"
                                class="btn btn-sm btn-primary my-1"><i class="fa fa-eye me-2"></i>पूर्वलोकन
                                गर्नुहोस्</a>
                        @endif
                        @error('equivalency_certificate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>सुरक्षित
                        गर्नुहोस्</button>
                    <a href="{{ url()->previous() }}" class="btn btn-danger" data-bs-dismiss="modal"><i
                            class="fas fa-arrow-left me-2"></i>बन्द गर्नुहोस्</a>
                </div>
            </form>
        </div>
    </div>
@endsection
