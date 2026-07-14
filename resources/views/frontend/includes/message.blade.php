@if (session('success'))
    <div class="card notification-message success-message" id="success-alert">
        <div class="card-header py-3">
            <h6 class="mb-0 fw-bold">{{ session('success') }}<span class="ms-3 close" aria-label="Close">&times;</span>
            </h6>
        </div>

    </div>
@endif
@if (session('error'))
    <div class="card notification-message error-message" id="success-alert">
        <div class="card-header py-3">
            <h6 class="mb-0 fw-bold">{{ session('error') }}<span class="ms-3 close" aria-label="Close">&times;</span>
            </h6>
        </div>

    </div>
@endif
