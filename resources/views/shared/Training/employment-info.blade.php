<!-- Employment & Skills Tab -->
<div class="tab-pane fade" id="employment" role="tabpanel" aria-labelledby="employment-tab">
    <h4 class="mb-3 fw-bold">रोजगार र सीपहरू</h4>
    <form action="{{ route('training-application.update', ['training' => $application->training_id, 'application' => $application->id]) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3 mb-4">
            <div class="col-md-4 col-sm-12">
                <label for="employment_status" class="form-label">हालको अवस्था</label>
                <select class="form-select select2 {{ $errors->has('employment_status') ? 'is-invalid' : '' }}"
                    id="employment_status" name="employment_status">
                    <option value="">--कृपया छान्नुहोस्--</option>
                    <option value="unemployed" {{ old('employment_status', $application->employment_status ?? '') == 'unemployed' ? 'selected' : '' }}>बेरोजगार</option>
                    <option value="self_employed" {{ old('employment_status', $application->employment_status ?? '') == 'self_employed' ? 'selected' : '' }}>स्वरोजगार</option>
                    <option value="government" {{ old('employment_status', $application->employment_status ?? '') == 'government' ? 'selected' : '' }}>सरकारी</option>
                    <option value="private" {{ old('employment_status', $application->employment_status ?? '') == 'private' ? 'selected' : '' }}>निजी</option>
                    <option value="foreign" {{ old('employment_status', $application->employment_status ?? '') == 'foreign' ? 'selected' : '' }}>वैदेशिक रोजगार</option>
                    <option value="student" {{ old('employment_status', $application->employment_status ?? '') == 'student' ? 'selected' : '' }}>विद्यार्थी</option>
                </select>
                @error('employment_status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12">
                <label for="profession" class="form-label">पेशा</label>
                <input type="text" class="form-control {{ $errors->has('profession') ? 'is-invalid' : '' }}"
                    id="profession" name="profession"
                    value="{{ old('profession', $application->profession ?? '') }}">
                @error('profession')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12">
                <label for="work_experience_years" class="form-label">कार्य अनुभव (वर्ष)</label>
                <input type="number" class="form-control {{ $errors->has('work_experience_years') ? 'is-invalid' : '' }}"
                    id="work_experience_years" name="work_experience_years"
                    value="{{ old('work_experience_years', $application->work_experience_years ?? '') }}">
                @error('work_experience_years')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="main_skill" class="form-label">मुख्य सीप</label>
                <input type="text" class="form-control {{ $errors->has('main_skill') ? 'is-invalid' : '' }}"
                    id="main_skill" name="main_skill"
                    value="{{ old('main_skill', $application->main_skill ?? '') }}">
                @error('main_skill')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="other_skills" class="form-label">अन्य सीपहरू</label>
                <input type="text" class="form-control {{ $errors->has('other_skills') ? 'is-invalid' : '' }}"
                    id="other_skills" name="other_skills"
                    value="{{ old('other_skills', $application->other_skills ?? '') }}">
                @error('other_skills')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="tab-navigation">
            <button type="button" class="btn btn-secondary prev-tab">
                <i class="fa fa-arrow-left me-2"></i>पछाडि
            </button>
            <button type="button" class="btn btn-primary next-tab">
                <i class="fa fa-arrow-right me-2"></i>अघि
            </button>
        </div>
    </form>
</div>
