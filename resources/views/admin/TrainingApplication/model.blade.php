<!-- StatusModal -->
<div class="modal fade" id="StatusModal" tabindex="-1" role="dialog" aria-labelledby="StatusModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">स्थिति परिवर्तन गर्नुहोस्</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.application.updateStatus', $application->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="status">स्थिति छान्नुहोस्</label>
                        <select name="status" id="status" class="form-select">
                            <option value="processing" {{ $application->status == 'processing' ? 'selected' : '' }}>प्रोसेसिङ</option>
                            <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>स्वीकृत</option>
                            <option value="declined" {{ $application->status == 'declined' ? 'selected' : '' }}>निष्क्रिय</option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <label for="remarks">टिप्पणी दिनुहोस्</label>
                        <textarea class="form-control @error('remarks') is-invalid @enderror" name="remarks" id="" cols="30" rows="3">{{old('remarks')}}</textarea>
                        @error('remarks')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary"><i
                            class="fas fa-save"></i>&nbsp; सुरक्षित गर्नुहोस्</button>
                        <button type="button" class="btn btn-secondary ms-2" data-bs-dismiss="modal"><i
                            class="fas fa-arrow-left"></i>&nbsp; रद्द गर्नुहोस्</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
