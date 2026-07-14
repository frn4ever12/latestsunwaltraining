@extends('admin.includes.main')

@section('content')
<div class="page-header">
    <h3 class="mb-3 fw-bold">हाम्रो बारेमा</h3>
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
            <a href="#">हाम्रो बारेमा</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">{{ isset($about->id) ? 'अपडेट गर्नुहोस्' : 'नयाँ थप्नुहोस्' }}</a>
        </li>
    </ul>
</div>

<div class="card">
    <div class="card-header">
        विवरण 
    </div>
    <div class="card-body">
        <form action="{{ isset($about->id) ? route('admin.about-us.update', $about) : route('admin.about-us.store') }}" method="POST">
            @csrf
            @if (isset($about->id))
                @method('PUT')
            @endif

            <div class="mb-3 row">
                <div class="col-md-12">
                    <label for="title" class="form-label">शीर्षक *</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" 
                        value="{{ old('title', isset($about->id) ? $about->title : '') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-12">
                    <label for="description" class="form-label">विवरण *</label>
                    <textarea class="col-xs-10 col-sm-5 form-control ckeditor" rows="15" id="description" name="description">
                        {{ $about->description ?? '' }}
                    </textarea>  
                </div>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">स्थिति *</label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                    <option value="active" {{ old('status', isset($about->id) ? $about->status : '') == 'active' ? 'selected' : '' }}>
                        Active
                    </option>
                    <option value="inactive" {{ old('status', isset($about->id) ? $about->status : '') == 'inactive' ? 'selected' : '' }}>
                        Inactive
                    </option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid">
                <div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;
                        {{ isset($about->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                    </button>
                </div>
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

@endsection