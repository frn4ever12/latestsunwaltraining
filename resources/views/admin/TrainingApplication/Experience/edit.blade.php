@extends('admin.includes.main')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">अनुभव विवरण</h5>
        </div>
        <div class="card-body">
            <form method="post"
                action="{{ route('training-application.experience.update', ['detail' => $detail->id, 'training' => $detail->trainingApplication->training_id, 'application' => $detail->training_application_id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-sm-12 col-md-8">
                        <label for="sanstha_name" class="form-label">संस्थाको नाम </label>
                        <input type="text" class="form-control {{ $errors->has('sanstha_name') ? 'is-invalid' : '' }}"
                            id="sanstha_name" name="sanstha_name"
                            value="{{ old('sanstha_name', $detail->sanstha_name ?? '') }}">
                        @error('sanstha_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="category" class="form-label">क्याटेगोरी</label>

                        <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" id="category"
                            name="category_id">
                            <option value="">--कृपया छान्नुहोस्--</option>
                            @foreach (\App\Models\Category::select('id', 'name_np')->get() as $data)
                                <option value="{{ $data->id }}"
                                    {{ old('category_id', $detail->category_id ?? '') == $data->id ? 'selected' : '' }}>
                                    {{ $data->name_np }}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="start_miti_bs" class="form-label">सुरु मिति (बि.सं.)</label>
                        <input type="text"
                            class="form-control datepicker {{ $errors->has('start_miti_bs') ? 'is-invalid' : '' }}"
                            id="start_miti_bs" name="start_miti_bs"
                            value="{{ old('start_miti_bs', $detail->start_miti_bs ?? '') }}" placeholder="YYYY-MM-DD">
                        @error('start_miti_bs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="start_miti_ad" class="form-label">सुरु मिति (ई.सं.)</label>
                        <input type="text"
                            class="form-control english-datepicker {{ $errors->has('start_miti_ad') ? 'is-invalid' : '' }}"
                            id="start_miti_ad" name="start_miti_ad"
                            value="{{ old('start_miti_ad', $detail->start_miti_ad ?? '') }}" placeholder="YYYY-MM-DD"
                            readonly>
                        @error('start_miti_ad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="end_miti_bs" class="form-label">समाप्ति मिति (बि.सं.)</label>
                        <input type="text"
                            class="form-control datepicker {{ $errors->has('end_miti_bs') ? 'is-invalid' : '' }}"
                            id="end_miti_bs" name="end_miti_bs"
                            value="{{ old('end_miti_bs', $detail->end_miti_bs ?? '') }}" placeholder="YYYY-MM-DD">
                        @error('end_miti_bs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="end_miti_ad" class="form-label">समाप्ति मिति (ई.सं.)</label>
                        <input type="text"
                            class="form-control english-datepicker {{ $errors->has('end_miti_ad') ? 'is-invalid' : '' }}"
                            id="end_miti_ad" name="end_miti_ad"
                            value="{{ old('end_miti_ad', $detail->end_miti_ad ?? '') }}" placeholder="YYYY-MM-DD" readonly>
                        @error('end_miti_ad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="document" class="form-label">अनुभव दस्तावेज</label>
                        <input type="file" class="form-control {{ $errors->has('document') ? 'is-invalid' : '' }}"
                            id="expDocument" name="document" accept="image/*,pdf">
                        @if (isset($detail->document))
                            <a target="_blank"
                                href="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(2), $detail->document) }}"
                                class="btn btn-sm btn-primary my-1"><i class="fa fa-eye me-2"></i>पूर्वलोकन
                                गर्नुहोस्</a>
                        @endif
                        @error('document')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <strong class="text-danger">नोट: फाइल JPG/PNG/PDF ढाँचामा हुनुपर्छ र अधिकतम आकार ३००KB
                            हुनुपर्छ।</strong>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>सुरक्षित
                        गर्नुहोस्</button>
                    <a href="{{ url()->previous() }}" class="btn btn-danger" data-bs-dismiss="modal"><i
                            class="fas fa-arrow-left me-2"></i>बन्द गर्नुहोस्</a>
                </div>
            </form>
        </div>
    </div>
@endsection
