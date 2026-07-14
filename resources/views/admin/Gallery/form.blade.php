@extends('admin.includes.main')

@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">{{ isset($gallery->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ थप्नुहोस्' }}</h3>
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
                <a href="#">ग्यालेरीहरु</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ isset($gallery->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ थप्नुहोस्' }}</a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            विवरण
        </div>
        <div class="card-body">
            <form action="{{ isset($gallery->id) ? route('admin.gallery.update', $gallery->id) : route('admin.gallery.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($gallery->id))
                    @method('PUT')
                @endif

                <div class="mb-3 row">
                    <div class="col-6">
                        <label for="title" class="form-label">शीर्षक *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title', $gallery->title ?? '') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="status" class="form-label">स्थिति *</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status"
                            required>
                            <option value="active" {{ old('status', $gallery->status ?? '') == 'active' ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="inactive" {{ old('status', $gallery->status ?? '') == 'inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-6">
                        <label class="form-label" for="description">विवरण</label>
                        <textarea rows="10" id="description" name="description"
                            class="form-control @error('description') is-invalid @enderror">{{ old('description', $gallery->description ?? '') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Gallery Photos Section -->
                <div class="mb-3 row">
                    <div class="col-12">
                        <label class="form-label" for="images">फोटोहरु</label>
                        <input type="file" class="form-control @error('images') is-invalid @enderror" id="images"
                            name="images[]" multiple accept=".jpg,.png,image/*">
                        @error('images')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;
                        सुरक्षित गर्नुहोस्
                    </button>
                </div>
            </form>

            @if ($gallery->photos && count($gallery->photos) > 0)
                    <div class="mb-3 row">
                        <div class="col-12">
                            <h5>हालका फोटोहरू</h5>
                            <div class="row">
                                @foreach ($gallery->photos as $photo)
                                    <div class="col-3">
                                        <div class="border shadow-none card">
                                            <img src="{{ asset('files/' . $photo->photo) }}" class="card-img-top"
                                                width="150" height="150" alt="Photo">
                                            <div class="card-body">
                                                <form
                                                    action="{{ route('admin.gallery.deletePhoto', [$gallery->id, $photo->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
        </div>
    </div>
@endsection
