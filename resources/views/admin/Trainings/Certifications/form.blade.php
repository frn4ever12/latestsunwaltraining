@extends('admin.includes.main')
@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">प्रमाणपत्र वितरण</h3>
        <ul class="mb-3 breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">प्रमाणपत्र वितरण</a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">हाजिर भएका आवेदकहरू</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.certifications.store', $training->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf


                <div class="mb-3 row g-3">
                    <div class="col-md-6 col-sm-12">
                        <label for="certified_date" class="form-label ">प्रमाणपत्र ढाँचा</label>
                        <select class="form-control" name="certificate_id" id="">
                            <option value="">--कृपया छान्नुहोस्--</option>
                            @foreach (\App\Models\Certificate::where('status', '1')->select('id')->get() as $data)
                                <option value="{{ $data->id }}"
                                    {{ old('certificate_id', $certificationData['certificate_id'] ?? '') == $data->id ? 'selected' : '' }}>
                                    ढाँचा-{{ \App\Helpers\NumberHelper::toNepaliNumber($loop->iteration) }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="certified_date" class="form-label ">मिति (बि.सं.) </label>
                        <input type="text"
                            class="form-control nepali-datepicker @error('certified_date') is-invalid @enderror"
                            id="certified_date" name="certified_date"
                            value="{{ old('certified_date', $certificationData['certified_date'] ?? '') }}"
                            placeholder="YYYY-MM-DD">
                        @error('certified_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" col-12">
                        <h6 class="fw-bold">आवेदकहरू</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>क्र.सं.</th>
                                <th>आवेदकको नाम</th>
                                <th>प्रमाण पत्र – स्वीकृत/अस्वीकृत</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applicants as $applicant)
                            <tr>
                                <td>{{ \App\Helpers\NumberHelper::toNepaliNumber($loop->iteration) }}</td>
                                <td>{{ $applicant->fullname_np }}</td>
                                    <td>

                                        <input type="hidden" name="certifications[{{ $applicant->id }}]" value="0">
                                        <input type="checkbox"
                                            class="form-check-input"
                                            name="certifications[{{ $applicant->id }}]"
                                            value="1"
                                            style="height: 20px;width:20px;border:1.4px solid rgb(99, 98, 98);"
                                            @if (old("certifications.{$applicant->id}", $certificationData[$applicant->id]['status'] ?? 0) == 1) checked @endif>  
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i>&nbsp;
                        {{ isset($attendance->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                    </button>
                    <a href="{{ route('admin.training.show', $training->id) }}" class="btn btn-danger"><i
                            class="fa fa-arrow-left me-2"></i>
                        फर्किनुहोस् </a>
                </div>
            </form>
        </div>
    </div>
@endsection
