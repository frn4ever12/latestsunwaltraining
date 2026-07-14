<!-- Personal Details Tab -->
<div class="tab-pane fade {{ session('education_tab') || session('experience_tab') || session('anye_tab') ? '' : 'show active' }}"
    id="personal" role="tabpanel" aria-labelledby="personal-tab">
    <h4 class="mb-3 fw-bold">व्यक्तिगत विवरण {{ session('education_tab') }}</h4>
    <form
        action="{{ isset($application->id) ? route('training-application.update', ['training' => $application->training_id, 'application' => $application->id]) : route('training-application.store', $training->id) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($application->id))
            @method('PUT')
        @endif
        <div class="row g-3 mb-4">
            <div class="col-md-4 col-sm-12">
                <label for="fullname_np" class="form-label">पूरा नाम</label>
                <input type="text" class="form-control {{ $errors->has('fullname_np') ? 'is-invalid' : '' }}"
                    id="fullname_np" name="fullname_np"
                    value="{{ old('fullname_np', $application->fullname_np ?? (Auth::user()->name_np ?? '')) }}">
                @error('fullname_np')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-2 col-sm-12">
                <label for="dob_bs" class="form-label">जन्म मिति (बि.सं.)</label>
                <input type="text" class="form-control datepicker {{ $errors->has('dob_bs') ? 'is-invalid' : '' }}"
                    id="dob_bs" name="dob_bs" placeholder="YYYY-MM-DD"
                    value="{{ old('dob_bs', $application->dob_bs ?? (auth()->user()->dob_bs ?? '')) }}">
                @error('dob_bs')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-2 col-sm-12">
                <label for="dob_ad" class="form-label">जन्म मिति (ई.सं.)</label>
                <input type="text"
                    class="form-control english-datepicker {{ $errors->has('dob_ad') ? 'is-invalid' : '' }}"
                    id="dob_ad" name="dob_ad" placeholder="YYYY-MM-DD"
                    value="{{ old('dob_ad', $application->dob_ad ?? (auth()->user()->dob_ad ?? '')) }}" readonly>
                @error('dob_ad')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-2 col-sm-12">
                <label for="gender" class="form-label">लिङ्ग</label>
                <select class="form-select select2 {{ $errors->has('gender') ? 'is-invalid' : '' }}" id="gender"
                    name="gender">
                    <option value="">--कृपया छान्नुहोस्--</option>
                    <option value="male"
                        {{ old('gender', $application->gender ?? (Auth::user()->gender ?? '')) == 'male' ? 'selected' : '' }}>
                        पुरुष </option>
                    <option value="female"
                        {{ old('gender', $application->gender ?? (Auth::user()->gender ?? '')) == 'female' ? 'selected' : '' }}>
                        महिला </option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>अन्य</option>

                </select>
                @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3 col-sm-12">
                <label for="citizenship_no" class="form-label">नागरिकता नं</label>
                <input type="text" class="form-control {{ $errors->has('citizenship_no') ? 'is-invalid' : '' }}"
                    id="citizenship_no" name="citizenship_no" placeholder="नागरिकता नं"
                    value="{{ old('citizenship_no', $application->citizenship_no ?? '') }}">
                @error('citizenship_no')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 col-sm-12">
                <label for="citizenship_district_id" class="form-label">नागरिकता जारी जिल्ला</label>
                <select
                    class="form-select select2 custom-scroll-select {{ $errors->has('citizenship_district_id') ? 'is-invalid' : '' }}"
                    id="citizenship_district_id" name="citizenship_district_id">
                    <option value="">--कृपया छान्नुहोस्--</option>
                    @foreach (\App\Models\District::select('id', 'name','name_eng')->get() as $data)
                        <option value="{{ $data->id }}"
                            {{ old('citizenship_district_id', $application->citizenship_district_id ?? '') == $data->id ? 'selected' : '' }}>
                            {{ $data->name }}-{{ $data->name_eng }} </option>
                    @endforeach
                </select>
                @error('citizenship_district_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 col-sm-12">
                <label for="photo" class="form-label">फोटो</label>
                <input type="file" class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}"
                    id="photo" name="photo"
                    accept="image/*">
                @if (isset($application->photo))
                    <a target="_blank"
                        href="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(2), $application->photo) }}"
                        class="btn btn-sm btn-primary my-1"><i class="fa fa-eye me-2"></i>पूर्वलोकन गर्नुहोस्</a>
                @endif
                @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 col-sm-12">
                <label for="nagrita_copy_front" class="form-label">नागरिकता अगाडि</label>
                <input type="file"
                    class="form-control {{ $errors->has('nagrita_copy_front') ? 'is-invalid' : '' }}"
                    id="nagrita_copy_front" name="nagrita_copy_front" accept=".jpg,.png,image/*,.pdf">
                @if (isset($application->nagrita_copy_front))
                    <a target="_blank"
                        href="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(2), $application->nagrita_copy_front) }}"
                        class="btn btn-sm btn-primary my-1">
                        <i class="fa fa-eye me-2"></i>पूर्वलोकन गर्नुहोस्
                    </a>
                @endif
                @error('nagrita_copy_front')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3 col-sm-12">
                <label for="nagrita_copy_back" class="form-label">नागरिकता पछाडि</label>
                <input type="file"
                    class="form-control {{ $errors->has('nagrita_copy_back') ? 'is-invalid' : '' }}"
                    id="nagrita_copy_back" name="nagrita_copy_back" accept=".jpg,.png,image/*,.pdf">
                @if (isset($application->nagrita_copy_back))
                    <a target="_blank"
                        href="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(2), $application->nagrita_copy_back) }}"
                        class="btn btn-sm btn-primary my-1">
                        <i class="fa fa-eye me-2"></i>पूर्वलोकन गर्नुहोस्
                    </a>
                @endif
                @error('nagrita_copy_back')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 col-sm-12">
                <label for="passport_copy" class="form-label">पासपोर्ट साइज फोटो</label>
                <input type="file"
                    class="form-control {{ $errors->has('passport_copy') ? 'is-invalid' : '' }}"
                    id="passport_copy" name="passport_copy" accept=".jpg,.png,image/*,.pdf">
                @if (isset($application->passport_copy))
                    <a target="_blank"
                        href="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(2), $application->passport_copy) }}"
                        class="btn btn-sm btn-primary my-1">
                        <i class="fa fa-eye me-2"></i>पूर्वलोकन गर्नुहोस्
                    </a>
                @endif
                @error('passport_copy')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 col-sm-12">
                <label for="educational_certificate" class="form-label">शैक्षिक प्रमाणपत्र</label>
                <input type="file"
                    class="form-control {{ $errors->has('educational_certificate') ? 'is-invalid' : '' }}"
                    id="educational_certificate" name="educational_certificate" accept=".jpg,.png,image/*,.pdf">
                @if (isset($application->educational_certificate))
                    <a target="_blank"
                        href="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(2), $application->educational_certificate) }}"
                        class="btn btn-sm btn-primary my-1">
                        <i class="fa fa-eye me-2"></i>पूर्वलोकन गर्नुहोस्
                    </a>
                @endif
                @error('educational_certificate')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 col-sm-12">
                <label for="recommendation_letter" class="form-label">सिफारिस पत्र</label>
                <input type="file"
                    class="form-control {{ $errors->has('recommendation_letter') ? 'is-invalid' : '' }}"
                    id="recommendation_letter" name="recommendation_letter" accept=".jpg,.png,image/*,.pdf">
                @if (isset($application->recommendation_letter))
                    <a target="_blank"
                        href="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(2), $application->recommendation_letter) }}"
                        class="btn btn-sm btn-primary my-1">
                        <i class="fa fa-eye me-2"></i>पूर्वलोकन गर्नुहोस्
                    </a>
                @endif
                @error('recommendation_letter')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 col-sm-12">
                <label for="disability_certificate" class="form-label">अपाङ्गता परिचयपत्र</label>
                <input type="file"
                    class="form-control {{ $errors->has('disability_certificate') ? 'is-invalid' : '' }}"
                    id="disability_certificate" name="disability_certificate" accept=".jpg,.png,image/*,.pdf">
                @if (isset($application->disability_certificate))
                    <a target="_blank"
                        href="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(2), $application->disability_certificate) }}"
                        class="btn btn-sm btn-primary my-1">
                        <i class="fa fa-eye me-2"></i>पूर्वलोकन गर्नुहोस्
                    </a>
                @endif
                @error('disability_certificate')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 col-sm-12">
                <label for="other_documents" class="form-label">अन्य कागजात</label>
                <input type="file"
                    class="form-control {{ $errors->has('other_documents') ? 'is-invalid' : '' }}"
                    id="other_documents" name="other_documents" accept=".jpg,.png,image/*,.pdf">
                @if (isset($application->other_documents))
                    <a target="_blank"
                        href="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(2), $application->other_documents) }}"
                        class="btn btn-sm btn-primary my-1">
                        <i class="fa fa-eye me-2"></i>पूर्वलोकन गर्नुहोस्
                    </a>
                @endif
                @error('other_documents')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <strong class="text-danger">नोट: फाइल JPG/PNG/PDF ढाँचामा हुनुपर्छ र अधिकतम आकार ३००KB
                    हुनुपर्छ।</strong>
            </div>
        </div>

        <h4 class="mb-4 fw-bold">सम्पर्क विवरण</h4>
        <div class="row g-3  mb-4">
            <div class="col-sm-12 col-md-4 ">
                <label>इमेल</label>
                <input class="form-control @error('email') is-invalid @enderror" placeholder="इमेल" type="text"
                    name="email" id="email"
                    value="{{ old('email', $application->email ?? (Auth::user()->email ?? '')) }}" />
                @error('email')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-12 col-md-4 ">
                <label>सम्पर्क नं</label>
                <input class="form-control @error('contact_no') is-invalid @enderror" placeholder="सम्पर्क  नं "
                    type="text" name="contact_no" id="contact_no"
                    value="{{ old('contact_no', $application->contact_no ?? (Auth::user()->contact_no ?? '')) }}" />
                @error('contact_no')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-12 col-md-4 ">
                <label>मोबाइल नं </label>
                <input class="form-control @error('mobile_no') is-invalid @enderror" placeholder="मोबाइल नं  "
                    type="text" name="mobile_no" id="mobile_no"
                    value="{{ old('mobile_no', $application->mobile_no ?? (Auth::user()->contact_no ?? '')) }}" />
                @error('mobile_no')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-12 col-md-4 ">
                <label>हजुरबुबाको नाम</label>
                <input class="form-control @error('grandfather_name') is-invalid @enderror" placeholder="हजुरबुबाको नाम"
                    type="text" name="grandfather_name" id="grandfather_name"
                    value="{{ old('grandfather_name', $application->grandfather_name ?? '') }}" />
                @error('grandfather_name')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-12 col-md-4 ">
                <label>बुबाको नाम</label>
                <input class="form-control @error('father_name') is-invalid @enderror" placeholder="बुबाको नाम"
                    type="text" name="father_name" id="father_name"
                    value="{{ old('father_name', $application->father_name ?? '') }}" />
                @error('father_name')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-12 col-md-4 ">
                <label>आमाको नाम</label>
                <input class="form-control @error('mother_name') is-invalid @enderror" placeholder="आमाको नाम"
                    type="text" name="mother_name" id="mother_name"
                    value="{{ old('mother_name', $application->mother_name ?? '') }}" />
                @error('mother_name')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <h4 class="mb-4 fw-bold">ठेगाना विवरण</h4>

        <div class="row g-3  mb-4">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <label>स्थायी ठेगाना:</label>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <label>प्रदेश:</label>
                <select name="sthyayi_province_id"
                    class="form-control @error('sthyayi_province_id') is-invalid @enderror select2"
                    id="sthyayiProvince">
                    <option value="">--कृपया छान्नुहोस्--</option>
                    @foreach (\App\Models\Province::get() as $province)
                        <option value="{{ $province->id }}"
                            {{ old('sthyayi_province_id', $application->theganaDetail->sthyayi_province_id ?? '5') == $province->id ? 'selected' : '' }}>
                            {{ $province->name }}</option>
                    @endforeach
                </select>
                @error('sthyayi_province_id')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <label>जिल्ला:</label>
                <select name="sthyayi_district_id"
                    class="form-control @error('sthyayi_district_id') is-invalid @enderror select2"
                    id="sthyayiDistrict">
                    <option value="">--कृपया छान्नुहोस्--</option>
                    @foreach (\App\Models\District::get() as $district)
                        <option value="{{ $district->id }}"
                            {{ old('sthyayi_district_id', $application->theganaDetail->sthyayi_district_id ?? '58') == $district->id ? 'selected' : '' }}>
                            {{ $district->name }}
                        </option>
                    @endforeach
                </select>
                @error('sthyayi_district_id')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label>स्थानिय तह:</label>
                <select name="sthyayi_sthaniya_taha_id"
                    class="form-control @error('sthyayi_sthaniya_taha_id') is-invalid @enderror select2"
                    id="sthyayiArea">
                    <option value="">--कृपया छान्नुहोस्--</option>
                    @foreach (\App\Models\SthaniyaTaha::get() as $area)
                        <option value="{{ $area->id }}"
                            {{ old('sthyayi_sthaniya_taha_id', $application->theganaDetail->sthyayi_sthaniya_taha_id ?? '576') == $area->id ? 'selected' : '' }}>
                            {{ $area->name }}
                        </option>
                    @endforeach
                </select>
                @error('sthyayi_sthaniya_taha_id')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <label>वडा नम्बर</label>
                <select name="sthyayi_ward_id"
                    class="form-control @error('sthyayi_ward_id') is-invalid @enderror select2" id="sthyayiWard">
                    <option value="">--कृपया छान्नुहोस्--</option>
                    @foreach (\App\Models\Ward::get() as $data)
                        <option value="{{ $data->id }}"
                            {{ old('sthyayi_ward_id', $application->theganaDetail->sthyayi_ward_id ?? '') == $data->id ? 'selected' : '' }}>
                            {{ $data->name }}
                        </option>
                    @endforeach
                </select>
                @error('sthyayi_ward_id')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label>गाउँ/टोल</label>
                <input class="form-control @error('sthyayi_tole_name') is-invalid @enderror" placeholder="गाउँ/टोल "
                    type="text" name="sthyayi_tole_name" id="sthyayiTole"
                    value="{{ old('sthyayi_tole_name', $application->theganaDetail->sthyayi_tole_name ?? '') }}" />
                @error('sthyayi_tole_name')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12  ">
                <label>अस्थायी ठेगाना:</label>
                <div class="checkbox" style="display: inline-flex;margin-left: 1rem;">
                    <label style="color: rgb(192, 36, 36);"><input type="checkbox" id="copyAddressCheckbox">
                        स्थायी
                        ठेगाना अनुकरण गर्ने</label>
                </div>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <label>प्रदेश:</label>
                <select name="asthyayi_province_id"
                    class="form-control @error('asthyayi_province_id') is-invalid @enderror select2"
                    id="asthyayiProvince">
                    <option value="">--कृपया छान्नुहोस्--</option>
                    @foreach (\App\Models\Province::get() as $province)
                        <option value="{{ $province->id }}"
                            {{ old('asthyayi_province_id', $application->theganaDetail->asthyayi_province_id ?? '5') == $province->id ? 'selected' : '' }}>
                            {{ $province->name }}
                        </option>
                    @endforeach
                </select>
                @error('asthyayi_province_id')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <label>जिल्ला:</label>
                <select name="asthyayi_district_id"
                    class="form-control @error('asthyayi_district_id') is-invalid @enderror select2"
                    id="asthyayiDistrict">
                    <option value="">--कृपया छान्नुहोस्--</option>
                    @foreach (\App\Models\District::get() as $district)
                        <option value="{{ $district->id }}"
                            {{ old('asthyayi_district_id', $application->theganaDetail->asthyayi_district_id ?? '') == $district->id ? 'selected' : '' }}>
                            {{ $district->name }}
                        </option>
                    @endforeach
                </select>
                @error('asthyayi_district_id')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label>स्थानिय तह:</label>
                <select name="asthyayi_sthaniya_taha_id"
                    class="form-control @error('asthyayi_sthaniya_taha_id') is-invalid @enderror select2"
                    id="asthyayiArea">
                    <option value="">--कृपया छान्नुहोस्--</option>
                    @foreach (\App\Models\SthaniyaTaha::get() as $area)
                        <option value="{{ $area->id }}"
                            {{ old('asthyayi_sthaniya_taha_id', $application->theganaDetail->asthyayi_sthaniya_taha_id ?? '') == $area->id ? 'selected' : '' }}>
                            {{ $area->name }}
                        </option>
                    @endforeach
                </select>
                @error('asthyayi_sthaniya_taha_id')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <label>वडा नम्बर</label>
                <select name="asthyayi_ward_id"
                    class="form-control @error('asthyayi_ward_id') is-invalid @enderror select2" id="asthyayiWard">
                    <option value="">--कृपया छान्नुहोस्--</option>
                    @foreach (\App\Models\Ward::get() as $data)
                        <option value="{{ $data->id }}"
                            {{ old('asthyayi_ward_id', $application->theganaDetail->asthyayi_ward_id ?? '') == $data->id ? 'selected' : '' }}>
                            {{ $data->name }}
                        </option>
                    @endforeach
                </select>
                @error('asthyayi_ward_id')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label>गाउँ/टोल</label>
                <input class="form-control @error('asthyayi_tole_name') is-invalid @enderror" placeholder="गाउँ/टोल "
                    type="text" name="asthyayi_tole_name" id="asthyayiTole"
                    value="{{ old('asthyayi_tole_name', $application->theganaDetail->asthyayi_tole_name ?? '') }}" />
                @error('asthyayi_tole_name')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label class="form-label">बसाइँ सराइ प्रमाणपत्र</label>
                <input class="form-control @error('migration_certificate') is-invalid @enderror" type="file"
                    name="migration_certificate" id="migration_certificate" />
                @if (isset($application->theganaDetail->migration_certificate))
                    <a target="_blank"
                        href="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(2), $application->theganaDetail->migration_certificate) }}"
                        class="btn btn-sm btn-primary my-1"><i class="fa fa-eye me-2"></i>पूर्वलोकन गर्नुहोस्</a>
                @endif
                @error('migration_certificate')
                    <div class="text-danger  mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 ">
                @if (isset($application->id))
                <input type="text" id="todayMiti" name="application_miti_bs" placeholder="YYYY-MM-DD"
                value="" hidden readonly>
                @endif
                <span class="text-danger">नोट: यदि अन्य कुनै स्थानबाट बसाइँसराइ गरेर आएको हो भने, कृपया सो जानकारी
                    स्पष्ट
                    गराउन सम्बन्धित कागजातहरू पनि राख्नुहोस्।</span>
            </div>
        </div>
        <div>
            <strong class="text-danger">नोट: फाइल JPG/PNG/PDF ढाँचामा हुनुपर्छ र अधिकतम आकार ३००KB हुनुपर्छ।</strong>
        </div>

        <div class="tab-navigation">
            <button type="button" class="btn btn-secondary prev-tab" disabled>
                <i class="fa fa-arrow-left me-2"></i>पछाडि
            </button>
            <button class="btn btn-primary next-tab" type="submit">
                <i class="fa fa-save me-2"></i>सुरक्षित गर्नुहोस्
            </button>
        </div>

    </form>

</div>

