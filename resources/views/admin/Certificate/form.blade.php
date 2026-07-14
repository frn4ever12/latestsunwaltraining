@extends('admin.includes.main')

@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">प्रमाणपत्र</h3>
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
                <a href="{{ route('admin.certificate.index') }}">प्रमाणपत्र</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ isset($certificate->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ थप्नुहोस्' }}</a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">विवरणहरू</h4>
        </div>

        <div class="card-body">
            <form
                action="{{ isset($certificate->id) ? route('admin.certificate.update', $certificate->id) : route('admin.certificate.store') }}"
                method="POST">
                @csrf
                @if (isset($certificate->id))
                    @method('PUT')
                @endif

                <div class="mb-3 row">
                    <div class="col-12">
                        <textarea class="col-xs-10 col-sm-5 form-control ckeditor" rows="30" id="description" name="description">
                        @if (isset($certificate) && isset($certificate->description))
{!! $certificate->description !!}
@else
<div class="certificate-body">
        <p>
            {{ get_detail()->palika_name??'' }}को आर्थिक सहयोग तथा {trainer_sanstha_np} को प्राविधिक सहयोगमा मिति
            <span>{suru_miti_bs}</span> गते देखि
            <span>{sakine_miti}</span>  सम्म सञ्चालित {training_name_np}
            <span>{days_np}</span> दिन तालिममा
            {trainee_address_np} मा बसोबास गर्ने
            <span>{trainee_name_np}</span> ले सफलतापूर्वक तालिम सम्पन्न गर्नु भएको प्रमाण स्वरूप यो प्रमाण-पत्र प्रदान
            गरिएको छ।
        </p>

        <p style="margin-top: 20px;">
            This certificate is awarded to <span>{trainee_name_eng}</span>,
            inhabitant of {trainee_address_eng}, on successful completion of {days_eng} days {training_name_eng},
            conducted from <span>{start_date_ad}</span> to <span>{end_date_ad}</span>,
            with technical support of {trainer_sanstha_eng} and financial support of {{get_detail()->palika_name_eng??''}}
        </p>
    </div>

    <div class="certificate-footer">
        <div class="signature-block">
            <div>...............................</div>
            <div>{trainer_sanstha_np}<br>{department}</div>
        </div>

        <div class="signature-block">
            <div>...............................</div>
            <div>प्रमुख प्रशासकीय अधिकृत<br>{{ get_detail()->palika_name??'' }}</div>
        </div>

        <div class="signature-block">
            <div>...............................</div>
            <div>रामकृष्ण खाण<br>नगर प्रमुख<br>{{ get_detail()->palika_name??'' }}</div>
        </div>
    </div>
@endif
                    </textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="status" class="form-label ">स्थिति</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                            <option disabled>-- छान्नुहोस् --</option>
                            <option value="1" {{ old('status', $certificate->status ?? '') == '1' ? 'selected' : '' }}>
                                सक्रिय
                            </option>
                            <option value="0" {{ old('status', $certificate->status ?? '') == '0' ? 'selected' : '' }}>
                                निष्क्रिय
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-start">
                    @if (!isset($certificate->entry_date))
                        <div class="col-lg-3 col-md-3 col-sm-12 d-none">
                            <input class="form-control" placeholder="YYYY-MM-DD" type="hidden" id="entryDate"
                                name="entry_date" readonly />
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save me-2"></i>
                        {{ isset($certificate->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#entryDate').val(getTodayDate());
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
