@extends('admin.includes.main')
@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap4-theme/1.5.2/select2-bootstrap4.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dist/css/select2.css') }}">
@endsection
@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">तालीम</h3>
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
                <a href="{{ route('admin.training.index') }}">तालीम</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ isset($training->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ थप्नुहोस्' }}</a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">विवरणहरू</h4>
        </div>
        <div class="card-body">
            <form
                action="{{ isset($training->id) ? route('admin.training.update', $training->id) : route('admin.training.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($training->id))
                    @method('PUT')
                @endif

                <div class="mb-3 row g-3">
                    <div class="col-md-3 col-sm-12">
                        <label for="name_np" class="form-label ">तालीमको नाम (नेपाली)</label>
                        <input type="text" class="form-control @error('name_np') is-invalid @enderror" id="name_np"
                            name="name_np" value="{{ old('name_np', $training->name_np ?? '') }}" placeholder="नाम">
                        @error('name_np')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="name_eng" class="form-label ">तालीमको नाम (अंग्रेजी)</label>
                        <input type="text" class="form-control @error('name_eng') is-invalid @enderror" id="name_eng"
                            name="name_eng" value="{{ old('name_eng', $training->name_eng ?? '') }}" placeholder="नाम">
                        @error('name_eng')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="category_id" class="form-label ">क्याटेगोरी</label>
                        <select class="form-control" name="category_id" id="">
                            <option value="">--कृपया छान्नुहोस्--</option>
                            @foreach (\App\Models\Category::select('id', 'name_np')->get() as $data)
                                <option value="{{ $data->id }}" {{ old('category_id',$training->category_id??'')==$data->id?'selected':'' }}>{{ $data->name_np }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="document" class="form-label ">फाइल</label>
                        <input type="file" class="form-control @error('document') is-invalid @enderror" id="document"
                            name="document" accept=".jpg,.png,image/*,.pdf">
                        @if (isset($training->document))
                            <a href="{{ asset('files/' . $training->document) }}" target="_blank"
                                class="d-block fw-bold btn btn-sm btn-outline-primary mt-2"><i class="fa fa-file"></i>
                                पूर्वावलोकन गर्नुहोस्</a>
                        @endif
                        @error('document')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="institution_name_np" class="form-label ">संस्थाको नाम (नेपाली)</label>
                        <input type="text" class="form-control @error('institution_name_np') is-invalid @enderror"
                            id="institution_name_np" name="institution_name_np"
                            value="{{ old('institution_name_np', $training->institution_name_np ?? '') }}"
                            placeholder="नाम">
                        @error('institution_name_np')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="institution_name_eng" class="form-label ">संस्थाको नाम (अंग्रेजी)</label>
                        <input type="text" class="form-control @error('institution_name_eng') is-invalid @enderror"
                            id="institution_name_eng" name="institution_name_eng"
                            value="{{ old('institution_name_eng', $training->institution_name_eng ?? '') }}"
                            placeholder="नाम">
                        @error('institution_name_eng')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="department_id" class="form-label ">विभाग</label>
                        <select class="form-control" name="department_id" id="">
                            <option value="">--कृपया छान्नुहोस्--</option>
                            @foreach (\App\Models\Department::select('id', 'name_np')->get() as $data)
                                <option value="{{ $data->id }}" {{ old('department_id',$training->department_id??'')==$data->id?'selected':'' }}>{{ $data->name_np }}</option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="trainer_name_np" class="form-label ">तालीम दिने व्यक्तिको नाम (नेपाली)</label>
                        <input type="text" class="form-control @error('trainer_name_np') is-invalid @enderror"
                            id="trainer_name_np" name="trainer_name_np"
                            value="{{ old('trainer_name_np', $training->trainer_name_np ?? '') }}" placeholder="नाम">
                        @error('trainer_name_np')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="trainer_name_eng" class="form-label ">तालीम दिने व्यक्तिको नाम (अंग्रेजी)</label>
                        <input type="text" class="form-control @error('trainer_name_eng') is-invalid @enderror"
                            id="trainer_name_eng" name="trainer_name_eng"
                            value="{{ old('trainer_name_eng', $training->trainer_name_eng ?? '') }}" placeholder="नाम">
                        @error('trainer_name_eng')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="contact_no" class="form-label "> सम्पर्क नं. </label>
                        <input type="text" class="form-control @error('contact_no') is-invalid @enderror"
                            id="contact_no" name="contact_no"
                            value="{{ old('contact_no', $training->contact_no ?? '') }}" placeholder="नाम">
                        @error('contact_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="training_cost" class="form-label ">तालीम शुल्क</label>
                        <input type="text" class="form-control @error('training_cost') is-invalid @enderror"
                            id="training_cost" name="training_cost"
                            value="{{ old('training_cost', $training->training_cost ?? 'free') }}" placeholder="नाम">
                        @error('training_cost')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 col-sm-12">
                        <label for="available_seats" class="form-label ">कोटा</label>
                        <input type="text" class="form-control @error('available_seats') is-invalid @enderror"
                            id="available_seats" name="available_seats"
                            value="{{ old('available_seats', $training->available_seats ?? '') }}" placeholder="कोटा">
                        @error('available_seats')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="budget" class="form-label ">बजेट रकम</label>
                        <input type="text" class="form-control @error('budget') is-invalid @enderror" id="budget"
                            name="budget" value="{{ old('budget', $training->budget ?? '') }}" placeholder="बजेट रकम">
                        @error('budget')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="budget_bibaran_id"
                            class="form-label  @error('budget_bibaran_id') is-invalid @enderror">बजेट समूह</label>
                        <select name="budget_bibaran_id" class="form-control select2">
                            <option value="">--कृपया छान्नुहोस्--</option>
                            @foreach (\App\Models\BudgetBibaran::where('status', 1)->select('id', 'name_np')->get() as $data)
                                <option value="{{ $data->id }}"
                                    {{ old('budget_bibaran_id', $training->budget_bibaran_id ?? '') == $data->id ? 'selected' : '' }}>
                                    {{ $data->name_np }}</option>
                            @endforeach
                        </select>
                        @error('budget_bibaran_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 ">
                        <label class="form-label">प्रदेश: <span style="color:red;">*</span></label>
                        <select name="province_id" class="form-control select2" id="Province">
                            <option value="">--कृपया छान्नुहोस्--</option>
                            @foreach (\App\Models\Province::select('id','name')->get() as $province)
                                <option value="{{ $province->id }}"
                                    {{ old('province_id', $training->province_id ?? '5') == $province->id ? 'selected' : '' }}>
                                    {{ $province->name }}</option>
                            @endforeach
                        </select>
                        @error('province_id')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 ">
                        <label class="form-label">जिल्ला: <span style="color:red;">*</span></label>
                        <select name="district_id" class="form-control select2" id="District">
                            <option value="">--कृपया छान्नुहोस्--</option>
                            @foreach (\App\Models\District::select('id','name')->get() as $district)
                                <option value="{{ $district->id }}"
                                    {{ old('district_id', $training->district_id ?? '58') == $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}</option>
                            @endforeach
                        </select>
                        @error('district_id')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 ">
                        <label class="form-label">स्थानिय तह: <span style="color:red;">*</span></label>
                        <select name="sthaniya_taha_id"
                            class="form-control @error('sthaniya_taha_id') is-invalid @enderror select2"
                            id="SthaniyaTaha" @isset($required) required @endisset>
                            <option value="">--कृपया छान्नुहोस्--</option>
                            @foreach (\App\Models\SthaniyaTaha::select('id','name')->get() as $area)
                                <option value="{{ $area->id }}"
                                    {{ old('sthaniya_taha_id', $training->sthaniya_taha_id ?? '576') == $area->id ? 'selected' : '' }}>
                                    {{ $area->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('sthaniya_taha_id')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 ">
                        <label class="form-label">वडा नम्बर <span style="color:red;">*</span></label>
                        <select name="ward_id" class="form-control @error('ward_id') is-invalid @enderror select2"
                            id="Ward" @isset($required) required @endisset>
                            <option value="">--कृपया छान्नुहोस्--</option>
                            @foreach (\App\Models\Ward::select('id','name')->get() as $ward)
                                <option value="{{ $ward->id }}"
                                    {{ old('ward_id', $training->ward_id ?? '') == $ward->id ? 'selected' : '' }}>
                                    {{ $ward->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('ward_id')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 ">
                        <label class="form-label">गाउँ/टोल <span style="color:red;">*</span></label>
                        <input class="form-control" placeholder="गाउँ/टोल " type="text" name="tole_name"
                            id="Tole" value="{{ old('tole_name', $training->tole_name ?? '') }}" />
                        @error('tole_name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="start_miti_bs" class="form-label ">तालिम सुरु हुने मिति (बि.सं.) </label>
                        <input type="text"
                            class="form-control datepicker @error('start_miti_bs') is-invalid @enderror"
                            id="start_miti_bs" name="start_miti_bs"
                            value="{{ old('start_miti_bs', $training->start_miti_bs ?? '') }}" placeholder="YYYY-MM-DD">
                        @error('start_miti_bs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="start_miti_ad" class="form-label ">तालिम सुरु हुने मिति (ई.सं.)</label>
                        <input type="text"
                            class="form-control english-datepicker @error('start_miti_ad') is-invalid @enderror"
                            id="start_miti_ad" name="start_miti_ad"
                            value="{{ old('start_miti_ad', $training->start_miti_ad ?? '') }}" placeholder="YYYY-MM-DD"
                            readonly>
                        @error('start_miti_ad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="end_miti_bs" class="form-label ">तालिम सकिने मिति (बि.सं.) </label>
                        <input type="text" class="form-control datepicker @error('end_miti_bs') is-invalid @enderror"
                            id="end_miti_bs" name="end_miti_bs"
                            value="{{ old('end_miti_bs', $training->end_miti_bs ?? '') }}" placeholder="YYYY-MM-DD">
                        @error('end_miti_bs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="end_miti_ad" class="form-label ">तालिम सकिने मिति (ई.सं.)</label>
                        <input type="text"
                            class="form-control english-datepicker @error('end_miti_ad') is-invalid @enderror"
                            id="end_miti_ad" name="end_miti_ad"
                            value="{{ old('end_miti_ad', $training->end_miti_ad ?? '') }}" placeholder="YYYY-MM-DD"
                            readonly>
                        @error('end_miti_ad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="application_start_miti_bs" class="form-label ">निवेदन खुल्ने मिति (बि.सं.)
                        </label>
                        <input type="text"
                            class="form-control datepicker @error('application_start_miti_bs') is-invalid @enderror"
                            id="application_start_miti_bs" name="application_start_miti_bs"
                            value="{{ old('application_start_miti_bs', $training->application_start_miti_bs ?? '') }}"
                            placeholder="YYYY-MM-DD">
                        @error('application_start_miti_bs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="application_start_miti_ad" class="form-label ">निवेदन खुल्ने मिति (ई.सं.)</label>
                        <input type="text"
                            class="form-control english-datepicker @error('application_start_miti_ad') is-invalid @enderror"
                            id="application_start_miti_ad" name="application_start_miti_ad"
                            value="{{ old('application_start_miti_ad', $training->application_start_miti_ad ?? '') }}"
                            placeholder="YYYY-MM-DD" readonly>
                        @error('application_start_miti_ad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="application_deadline_miti_bs" class="form-label ">निवेदन बुझाउने अन्तिम मिति (बि.सं.)
                        </label>
                        <input type="text"
                            class="form-control datepicker @error('application_deadline_miti_bs') is-invalid @enderror"
                            id="application_deadline_miti_bs" name="application_deadline_miti_bs"
                            value="{{ old('application_deadline_miti_bs', $training->application_deadline_miti_bs ?? '') }}"
                            placeholder="YYYY-MM-DD">
                        @error('application_deadline_miti_bs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="application_deadline_miti_ad" class="form-label ">निवेदन बुझाउने अन्तिम मिति
                            (ई.सं.)</label>
                        <input type="text"
                            class="form-control english-datepicker @error('application_deadline_miti_ad') is-invalid @enderror"
                            id="application_deadline_miti_ad" name="application_deadline_miti_ad"
                            value="{{ old('application_deadline_miti_ad', $training->application_deadline_miti_ad ?? '') }}"
                            placeholder="YYYY-MM-DD" readonly>
                        @error('application_deadline_miti_ad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="col-md-6 col-sm-12">
                        <label for="start_samaya" class="form-label ">तालिम सुरु हुने समय

                        </label>
                        <input type="time" class="form-control @error('start_samaya') is-invalid @enderror"
                            id="start_samaya" name="start_samaya"
                            value="{{ old('start_samaya', $training->start_samaya ?? '') }}" placeholder="नाम">
                        @error('start_samaya')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="end_samaya" class="form-label ">तालिम सकिने समय</label>
                        <input type="time" class="form-control @error('end_samaya') is-invalid @enderror"
                            id="end_samaya" name="end_samaya"
                            value="{{ old('end_samaya', $training->end_samaya ?? '') }}" placeholder="नाम">
                        @error('end_samaya')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="min_age" class="form-label ">न्यूनतम उमेर
                        </label>
                        <input type="number" class="form-control @error('min_age') is-invalid @enderror" id="min_age"
                            name="min_age" min="10" max="100"
                            value="{{ old('min_age', $training->min_age ?? '') }}">
                        @error('min_age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="max_age" class="form-label ">अधिकतम उमेर
                        </label>
                        <input type="number" class="form-control @error('max_age') is-invalid @enderror" id="max_age"
                            name="max_age" min="10" max="100"
                            value="{{ old('max_age', $training->max_age ?? '') }}">
                        @error('max_age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="target_groups"
                            class="form-label  @error('target_groups') is-invalid @enderror">टार्गेट समूह</label>
                        <select name="target_groups[]" class="form-control select2" multiple>
                            <option value="">--कृपया छान्नुहोस्--</option>
                            @foreach (\App\Models\TargetGroup::where('status', 1)->select('id', 'name_np')->get() as $data)
                                <option value="{{ $data->name_np }}"
                                    {{ in_array($data->name_np, old('target_groups', $training->target_groups ?? [])) ? 'selected' : '' }}>
                                    {{ $data->name_np }}
                                </option>
                            @endforeach
                        </select>
                        @error('target_groups')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="preferences"
                            class="form-label  @error('preferences') is-invalid @enderror">प्राथमिकता</label>
                        <select name="preferences[]" class="form-control select2" multiple>
                            <option value="">--कृपया छान्नुहोस्--</option>
                            @foreach (\App\Models\Preference::where('status', 1)->select('id', 'name_np')->get() as $data)
                                <option value="{{ $data->name_np }}"
                                    {{ in_array($data->name_np, old('preferences', $training->preferences ?? [])) ? 'selected' : '' }}>
                                    {{ $data->name_np }}
                                </option>
                            @endforeach

                        </select>
                        @error('preferences')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">विवरण *</label>
                        <textarea class="col-12 form-control" rows="5" cols="30" id="description" name="description">
                                {{ old('description', $training->description ?? '') }}
                            </textarea>
                    </div>
                    <div class="col-12">
                        <label for="training_location" class="form-label ">स्थानको नक्सा</label>
                        <textarea class="form-control" rows="4" cols="30" id="location" name="training_location"
                            placeholder="<iframe>....</iframe>">{{ old('training_location', $training->training_location ?? '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44974.305691810696!2d83.41955809153349!3d27.626302912641687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3996850003c1e5c3%3A0x6dcb72372663ccc9!2sTilottama%20Municipality%20Office!5e0!3m2!1sen!2snp!4v1746341847662!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>') }}</textarea>
                        @error('training_location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">कैफियत</label>
                        <textarea class="form-control @error('kaifiyat') is-invalid @enderror" name="kaifiyat" id=""
                            cols="30" rows="4">{{ old('kaifiyat', $training->kaifiyat ?? '') }}</textarea>
                        @error('kaifiyat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="status" class="form-label ">स्थिति</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                            <option disabled>-- छान्नुहोस् --</option>
                            <option value="upcoming"
                                {{ old('status', $training->status ?? '') == 'upcoming' ? 'selected' : '' }}>
                                आगामी आउन लागेको
                            </option>
                            <option value="active"
                                {{ old('status', $training->status ?? '') == 'active' ? 'selected' : '' }}>
                                सक्रिय
                            </option>
                            <option value="completed"
                                {{ old('status', $training->status ?? '') == 'completed' ? 'selected' : '' }}>
                                सम्पन्न भएको
                            </option>
                            <option value="dismissed"
                                {{ old('status', $training->status ?? '') == 'dismissed' ? 'selected' : '' }}>
                                बर्खास्त भएको
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save me-2"></i>
                        {{ isset($training->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="{{ asset('dist/js/form.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll("input.datepicker").forEach(function(dateInput) {
                $(dateInput).nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function() {
                        var bsDate = dateInput.value;

                        var nextInput = dateInput.closest('.col-md-6').nextElementSibling
                            .querySelector('.english-datepicker');

                        if (nextInput) {
                            nextInput.value = NepaliFunctions.BS2AD(bsDate);
                        }
                    }
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#description',
            menubar: false,
            plugins: 'code table lists image tablemergeless tablemergedcells',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | table | image',
            table_advtab: true,
            table_merge_cells: true,
            table_split_cells: true
        });
    </script>
@endsection
