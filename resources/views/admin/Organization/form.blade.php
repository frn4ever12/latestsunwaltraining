@extends('admin.includes.main')

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap4-theme/1.5.2/select2-bootstrap4.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dist/css/select2.css') }}">
@endsection

@section('content')
<div class="card card-custom">
    <div class=" card-header bg-main rounded-top">
        <h3 class="card-title mb-0 text-white">पालिकाको विवरण</h3>
    </div>
    <div class="card-body">
        <form role="form" enctype="multipart/form-data" action="{{ $palika ? route('admin.organization.update', $palika->id) : route('admin.organization.store') }}" method="{{ $palika ? 'PUT' : 'POST' }}">
            @if($palika)
                @method('PUT')
            @endif
            @csrf
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label class="form-label ">पालिका नाम (नेपाली)</label>
                    <input class="form-control @error('palika_name') is-invalid @enderror" placeholder=".... नगरपालिका"
                        type="text" name="palika_name" value="{{ old('palika_name', $palika->palika_name ?? '') }}" />
                    @error('palika_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label ">पालिका नाम (अंग्रेजी)</label>
                    <input class="form-control @error('palika_name_eng') is-invalid @enderror" placeholder="Municipality Name"
                        type="text" name="palika_name_eng" value="{{ old('palika_name_eng', $palika->palika_name_eng ?? '') }}" />
                    @error('palika_name_eng')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <label class="form-label ">पालिका कार्यालय (नेपाली)</label>
                    <input class="form-control @error('palika_karyalaya') is-invalid @enderror"
                        placeholder="नगर/गाउँ कार्यपालिकाको कार्यालय" type="text" name="palika_karyalaya"
                        value="{{ old('palika_karyalaya', $palika->palika_karyalaya ?? '') }}" />
                    @error('palika_karyalaya')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label ">पालिका कार्यालय (अंग्रेजी)</label>
                    <input class="form-control @error('palika_karyalaya_eng') is-invalid @enderror"
                        placeholder="Municipality Office" type="text" name="palika_karyalaya_eng"
                        value="{{ old('palika_karyalaya_eng', $palika->palika_karyalaya_eng ?? '') }}" />
                    @error('palika_karyalaya_eng')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <label class="form-label ">पालिका प्रदेश</label>
                    <select id="province" name="province_id" class="form-control select2 @error('province') is-invalid @enderror"
                        >
                        <option value="">--कृपया छान्नुहोस्--</option>
                        @foreach (\App\Models\Province::get() as $province)
                            <option value="{{ $province->id }}"
                                {{ old('province', $palika->province_id ?? '') == $province->id ? 'selected' : '' }}>
                                {{ $province->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('province')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label ">पालिका जिल्ला</label>
                    <select id="district" name="district_id" class="form-control select2 @error('district') is-invalid @enderror"
                        >
                        <option value="">--कृपया छान्नुहोस्--</option>
                        @foreach (\App\Models\District::orderBy('name', 'asc')->get() as $district)
                            <option value="{{ $district->id }}"
                                {{ old('district', $palika->district_id ?? '') == $district->id ? 'selected' : '' }}>
                                {{ $district->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('district')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <label class="form-label ">पालिका ठेगाना</label>
                    <input class="form-control @error('address') is-invalid @enderror" placeholder="ठेगाना" type="text"
                        name="address" value="{{ old('address', $palika->address ?? '') }}" />
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label ">पालिका देश</label>
                    <input class="form-control @error('country') is-invalid @enderror" placeholder="देश" type="text"
                        name="country" value="{{ old('country', $palika->country ?? 'नेपाल') }}" />
                    @error('country')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label class="form-label ">इमेल </label>
                    <input class="form-control @error('email') is-invalid @enderror" placeholder="इमेल " type="email"
                        name="email" value="{{ old('email', $palika->email ?? '') }}" />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label ">सम्पर्क नम्बर</label>
                    <input class="form-control @error('contact_no') is-invalid @enderror" placeholder="सम्पर्क नम्बर" type="text"
                        name="contact_no" value="{{ old('contact_no', $palika->contact_no ?? '') }}" />
                    @error('contact_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <label class="form-label ">पालिका लोगो</label>
                    @if ($palika && $palika->logo)
                        <div class="mb-3">
                            <img src="{{ asset('files/'.$palika->logo) }}" class="img-thumbnail" style="height: 120px;"
                                alt="Palika Logo">
                        </div>
                    @endif
                    <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" accept=".jpg,.png,image/*" />
                    @error('logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-2"></i>सुरक्षित गर्नुहोस्
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap4',
                width: '100%',
                placeholder: '--कृपया छान्नुहोस्--'
            });

            $('#province').on('change', function() {
                const provinceId = $(this).val();
                const districtSelect = $('#district');

                districtSelect.empty().append('<option value="">--कृपया छान्नुहोस्--</option>');

                if (provinceId) {
                    $.ajax({
                        url: `/districts/${provinceId}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            data.forEach(district => {
                                districtSelect.append(new Option(district.name, district
                                    .id));
                            });
                            districtSelect.trigger('change');
                        },
                        error: function() {
                            toastr.error('जिल्ला लोड गर्न सकिएन। कृपया पुन: प्रयास गर्नुहोस्।');
                        }
                    });
                }
            });
        });
    </script>
@endsection
