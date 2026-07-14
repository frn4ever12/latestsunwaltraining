@if (session('success'))
    <div class="custom-alert" id="alert">
        <span> {{ session('success') }}</span>
        <span class="close" aria-label="Close">&times;</span>
    </div>
@endif
@if (session('error'))
    <div class="custom-error-alert" id="alert">
        <span>{{ session('error') }}</span>
        <span class="close" aria-label="Close">&times;</span>
    </div>
@endif
