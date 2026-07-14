@extends('admin.includes.main')

@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">समाचार</h3>
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
                <a href="{{ route('admin.samachar.index') }}">समाचार</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ isset($samachar->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ थप्नुहोस्' }}</a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">विवरणहरू</h4>
        </div>
        <div class="card-body">
            <form
                action="{{ isset($samachar->id) ? route('admin.samachar.update', $samachar->id) : route('admin.samachar.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($samachar->id))
                    @method('PUT')
                @endif

                <div class="mb-3 row">
                    <div class="col-md-6 col-sm-12">
                        <label for="title_np" class="form-label ">शिर्षक (नेपाली)</label>
                        <input type="text" class="form-control @error('title_np') is-invalid @enderror" id="title_np"
                            name="title_np" value="{{ old('title_np', $samachar->title_np ?? '') }}" placeholder="शिर्षक">
                        @error('title_np')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="title_eng" class="form-label ">शिर्षक (अंग्रेजी)</label>
                        <input type="text" class="form-control @error('title_eng') is-invalid @enderror" id="title_eng"
                            name="title_eng" value="{{ old('title_eng', $samachar->title_eng ?? '') }}"
                            placeholder="शिर्षक">
                        @error('title_eng')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6 col-sm-12">
                        <label for="document" class="form-label ">फाइल</label>
                        <input type="file" class="form-control @error('document') is-invalid @enderror" id="document"
                            name="document" accept=".jpg,.png,image/*,.pdf">
                        @if (isset($samachar->document))
                            <a href="{{ asset('files/' . $samachar->document) }}" target="_blank"
                                class="d-block fw-bold btn btn-sm btn-outline-primary mt-2"><i class="fa fa-file"></i>
                                पूर्वावलोकन गर्नुहोस्</a>
                        @endif
                        @error('document')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="miti_bs" class="form-label ">मिति (बि.सं.) </label>
                        <input type="text" class="form-control @error('miti_bs') is-invalid @enderror" id="miti_bs"
                            name="miti_bs" value="{{ old('miti_bs', $samachar->miti_bs ?? '') }}" placeholder="YYYY-MM-DD">
                        @error('miti_bs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="miti_ad" class="form-label ">मिति (ई.सं.)</label>
                        <input type="text" class="form-control @error('miti_ad') is-invalid @enderror" id="miti_ad"
                            name="miti_ad" value="{{ old('miti_ad', $samachar->miti_ad ?? '') }}" placeholder="YYYY-MM-DD"
                            readonly>
                        @error('miti_ad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-12">
                        <label for="description" class="form-label">विवरण *</label>
                        <textarea class="col-xs-10 col-sm-5 form-control ckeditor" rows="15" id="description" name="description">
                            {{ old('description', $samachar->description ?? '') }}
                        </textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6 col-sm-12">
                        <label for="status" class="form-label ">स्थिति</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                            <option disabled>-- छान्नुहोस् --</option>
                            <option value="1" {{ old('status', $samachar->status ?? '') == '1' ? 'selected' : '' }}>
                                सक्रिय
                            </option>
                            <option value="0" {{ old('status', $samachar->status ?? '') == '0' ? 'selected' : '' }}>
                                निष्क्रिय
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
                        {{ isset($samachar->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
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
    <script>
        var date = document.getElementById("miti_bs");
        date.nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            onChange: function() {
                $('#miti_ad').val(NepaliFunctions.BS2AD(date.value));
            }
        });
    </script>
@endsection
