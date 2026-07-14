@extends('admin.includes.main')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">अन्य विवरण</h5>
        </div>
        <div class="card-body">
            <form method="post"
                action="{{ route('training-application.anye-bibaran.update', ['detail' => $detail->id, 'training' => $detail->trainingApplication->training_id, 'application' => $detail->training_application_id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-sm-12 col-md-4">
                        <label>चलनी नं.</label>
                        <input class="form-control @error('chalani_no') is-invalid @enderror" placeholder="चलनी नं."
                            type="text" name="chalani_no" id="chalani_no"
                            value="{{ old('chalani_no', $detail->chalani_no ?? '') }}">
                        @error('chalani_no')
                            <div class="text-danger  mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <label>कागजको नाम  </label>
                        <input class="form-control @error('document_name') is-invalid @enderror" placeholder="कागजको नाम"
                            type="text" name="document_name" id="document_name"
                            value="{{ old('document_name', $detail->document_name ?? '') }}">
                        @error('document_name')
                            <div class="text-danger  mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="anye_document">छुटपुट कागजात</label>
                        <input type="file" class="form-control {{ $errors->has('anye_document') ? 'is-invalid' : '' }}"
                            id="anye_document" name="anye_document" accept="image/*,pdf">
                        @if (isset($detail->anye_document))
                            <a target="_blank"
                                href="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(2), $detail->anye_document) }}"
                                class="btn btn-sm btn-primary my-1"><i class="fa fa-eye me-2"></i>पूर्वलोकन गर्नुहोस्</a>
                        @endif
                        @error('anye_document')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
