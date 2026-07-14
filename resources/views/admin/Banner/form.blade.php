@extends('admin.includes.main')

@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">ब्यानरहरू</h3>
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
                <a href="#">ब्यानर</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ isset($banner->id) ? 'Edit Banner' : 'Create Banner' }}</a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            ब्यानरको विवरण
        </div>
        <div class="card-body">
            <form
                action="{{ isset($banner->id) ? route('admin.banner.update', $banner->id) : route('admin.banner.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($banner->id))
                    @method('PUT')
                @endif

                <div class="mb-3 row">

                    <div class="col-12 col-md-6">
                        <label for="title">शीर्षक</label>
                        <input type="text" name="title" class="form-control"
                            value="{{ isset($banner->id) ? $banner->title : old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="image">फोटो</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        @if (isset($banner) && $banner->image)
                            <img src="{{ asset('files/' . $banner->image) }}" alt="Banner Image" width="80">
                        @endif
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="status" class="form-label ">स्थिति</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                            <option disabled>-- छान्नुहोस् --</option>
                            <option value="1"
                                {{ old('status', $arthik_barsa->status ?? '') == '1' ? 'selected' : '' }}>
                                सक्रिय
                            </option>
                            <option value="0"
                                {{ old('status', $arthik_barsa->status ?? '') == '0' ? 'selected' : '' }}>
                                निष्क्रिय
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;
                        सुरक्षित गर्नुहोस्
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
