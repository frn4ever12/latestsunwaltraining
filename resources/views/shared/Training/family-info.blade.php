<!-- Family Details Tab -->
<div class="tab-pane fade" id="family" role="tabpanel" aria-labelledby="family-tab">
    <h4 class="mb-3 fw-bold">परिवार विवरण</h4>
    <form action="{{ route('training-application.update', ['training' => $application->training_id, 'application' => $application->id]) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="card rounded-0 shadow-none mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">परिवार सदस्यहरू</h5>
                <button type="button" id="add-family-form" class="btn btn-sm btn-success" data-bs-toggle="modal"
                    data-bs-target="#FamilyModal"><i class="fa fa-plus"></i></button>
            </div>
            <div class="card-body">
                @if(isset($application) && $application->id)
                    <!-- Table to list family data -->
                    @include('admin.TrainingApplication.Family.table')
                @else
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        कृपया पहिले व्यक्तिगत विवरण भर्नुहोस् र सुरक्षित गर्नुहोस्।
                    </div>
                @endif
            </div>
        </div>

        <div class="tab-navigation">
            <button type="button" class="btn btn-secondary prev-tab">
                <i class="fa fa-arrow-left me-2"></i>पछाडि
            </button>
            <button type="button" class="btn btn-primary next-tab">
                <i class="fa fa-arrow-right me-2"></i>अघि
            </button>
        </div>
    </form>

    <!-- Family Modal -->
    <div class="modal fade" id="FamilyModal" tabindex="-1" aria-labelledby="FamilyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="FamilyModalLabel">परिवार सदस्य थप्नुहोस्</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="familyForm" action="{{ route('training-application.family.store', ['training' => $application->training_id, 'application' => $application->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="family_name" class="form-label">नाम</label>
                                <input type="text" class="form-control" id="family_name" name="family_name" required>
                            </div>
                            <div class="col-md-4">
                                <label for="relationship" class="form-label">सम्बन्ध</label>
                                <select class="form-select" id="relationship" name="relationship" required>
                                    <option value="">--कृपया छान्नुहोस्--</option>
                                    <option value="father">बुबा</option>
                                    <option value="mother">आमा</option>
                                    <option value="spouse">जीवनसाथी</option>
                                    <option value="son">छोरा</option>
                                    <option value="daughter">छोरी</option>
                                    <option value="brother">दाजु/भाइ</option>
                                    <option value="sister">दिदी/बहिनी</option>
                                    <option value="other">अन्य</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="family_occupation" class="form-label">पेशा</label>
                                <input type="text" class="form-control" id="family_occupation" name="family_occupation">
                            </div>
                            <div class="col-md-4">
                                <label for="family_mobile" class="form-label">मोबाइल</label>
                                <input type="text" class="form-control" id="family_mobile" name="family_mobile">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">रद्द गर्नुहोस्</button>
                    <button type="submit" form="familyForm" class="btn btn-primary">सुरक्षित गर्नुहोस्</button>
                </div>
            </div>
        </div>
    </div>
</div>
