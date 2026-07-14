<!-- Online Application Tracker -->
<div class="modal fade" id="applicationTrackerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-gradient text-white">
                <h5 class="modal-title">
                    <i class="fas fa-search me-2"></i>
                    आवेदन ट्र्याकर
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Search Form -->
                <div class="mb-4">
                    <div class="search-box mb-3">
                        <i class="fas fa-search text-muted"></i>
                        <input type="text" id="applicationSearchInput" placeholder="आवेदन नम्बर, नागरिकता नम्बर वा QR कोड...">
                        <button onclick="trackApplication()">खोज्नुहोस्</button>
                    </div>
                    
                    <div class="text-center mb-3">
                        <span class="text-muted small">वा</span>
                    </div>
                    
                    <div class="text-center">
                        <button class="btn btn-outline-primary" onclick="openQRScanner()">
                            <i class="fas fa-qrcode me-2"></i>
                            QR कोड स्क्यान गर्नुहोस्
                        </button>
                    </div>
                </div>

                <!-- QR Scanner -->
                <div id="qrScanner" class="qr-scanner d-none mb-4">
                    <div id="reader"></div>
                    <button class="btn btn-secondary w-100 mt-3" onclick="closeQRScanner()">
                        <i class="fas fa-times me-2"></i> बन्द गर्नुहोस्
                    </button>
                </div>

                <!-- Application Status Result -->
                <div id="applicationResult" class="d-none">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h6 class="mb-0 fw-bold">आवेदन विवरण</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <small class="text-muted">आवेदन नम्बर</small>
                                    <p class="fw-bold mb-0" id="resultAppNumber">-</p>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">आवेदकको नाम</small>
                                    <p class="fw-bold mb-0" id="resultAppName">-</p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <small class="text-muted">तालिम</small>
                                    <p class="fw-bold mb-0" id="resultTraining">-</p>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">आवेदन मिति</small>
                                    <p class="fw-bold mb-0" id="resultDate">-</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline -->
                    <div class="timeline mt-4" id="statusTimeline">
                        <!-- Timeline items will be dynamically added -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Trigger Button -->
<button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#applicationTrackerModal">
    <i class="fas fa-search me-2"></i>
    आवेदन ट्र्याक गर्नुहोस्
</button>

<script>
let html5QrcodeScanner = null;

// Track Application
function trackApplication() {
    const searchTerm = document.getElementById('applicationSearchInput').value;
    
    if (!searchTerm) {
        Swal.fire({
            icon: 'warning',
            title: 'चेतावनी',
            text: 'कृपया आवेदन नम्बर, नागरिकता नम्बर वा QR कोड प्रविष्ट गर्नुहोस्।',
            confirmButtonColor: '#667eea'
        });
        return;
    }

    // Show loading
    Swal.fire({
        title: 'खोज्दै...',
        text: 'कृपया केही क्षण पर्खनुहोस्',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // AJAX request to search application
    $.ajax({
        url: '{{ route('api.application.track') }}',
        method: 'POST',
        data: {
            search_term: searchTerm,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            Swal.close();
            
            if (response.success) {
                displayApplicationResult(response.application);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'आवेदन फेला परेन',
                    text: response.message || 'आवेदन फेला परेन। कृपया सही जानकारी प्रविष्ट गर्नुहोस्।',
                    confirmButtonColor: '#667eea'
                });
            }
        },
        error: function() {
            Swal.close();
            Swal.fire({
                icon: 'error',
                title: 'त्रुटि',
                text: 'केही गलत भयो। कृपया पुन: प्रयास गर्नुहोस्।',
                confirmButtonColor: '#667eea'
            });
        }
    });
}

// Display Application Result
function displayApplicationResult(application) {
    document.getElementById('resultAppNumber').textContent = application.application_number || '-';
    document.getElementById('resultAppName').textContent = application.applicant_name || '-';
    document.getElementById('resultTraining').textContent = application.training_name || '-';
    document.getElementById('resultDate').textContent = application.application_date || '-';

    // Build timeline
    const timeline = document.getElementById('statusTimeline');
    const statuses = [
        { key: 'submitted', label: 'आवेदन पेश', icon: 'fa-paper-plane', color: 'primary' },
        { key: 'under_verification', label: 'प्रमाणीकरण अन्तर्गत', icon: 'fa-search', color: 'info' },
        { key: 'ward_recommendation', label: 'वार्ड सिफारिस', icon: 'fa-thumbs-up', color: 'warning' },
        { key: 'municipality_approval', label: 'नगरपालिका स्वीकृति', icon: 'fa-check-circle', color: 'success' },
        { key: 'selected', label: 'चयन गरियो', icon: 'fa-user-check', color: 'success' },
        { key: 'waiting_list', label: 'प्रतीक्षा सूची', icon: 'fa-clock', color: 'warning' },
        { key: 'rejected', label: 'अस्वीकृत', icon: 'fa-times-circle', color: 'danger' },
        { key: 'training_assigned', label: 'तालिम तोकियो', icon: 'fa-calendar-check', color: 'primary' },
        { key: 'completed', label: 'सम्पन्न', icon: 'fa-flag-checkered', color: 'success' }
    ];

    let currentStatusIndex = statuses.findIndex(s => s.key === application.status);
    if (currentStatusIndex === -1) currentStatusIndex = 0;

    let timelineHTML = '';
    statuses.forEach((status, index) => {
        const isCompleted = index <= currentStatusIndex;
        const isCurrent = index === currentStatusIndex;
        
        timelineHTML += `
            <div class="timeline-item">
                <div class="timeline-content ${isCompleted ? 'border-start border-4 border-' + status.color : ''}">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas ${status.icon} me-2 text-${isCompleted ? status.color : 'muted'}"></i>
                        <h6 class="mb-0 fw-bold">${status.label}</h6>
                        ${isCurrent ? '<span class="badge bg-' + status.color + ' ms-auto">वर्तमान</span>' : ''}
                    </div>
                    ${isCurrent && application.status_remark ? `<p class="small text-muted mb-0">${application.status_remark}</p>` : ''}
                    ${isCompleted && status.key === application.status && application.updated_at ? `<small class="text-muted">${application.updated_at}</small>` : ''}
                </div>
            </div>
        `;
    });

    timeline.innerHTML = timelineHTML;
    document.getElementById('applicationResult').classList.remove('d-none');
}

// Open QR Scanner
function openQRScanner() {
    document.getElementById('qrScanner').classList.remove('d-none');
    
    if (!html5QrcodeScanner) {
        html5QrcodeScanner = new Html5Qrcode("reader");
    }
    
    html5QrcodeScanner.start(
        { facingMode: "environment" },
        {
            fps: 10,
            qrbox: { width: 250, height: 250 }
        },
        (decodedText, decodedResult) => {
            document.getElementById('applicationSearchInput').value = decodedText;
            closeQRScanner();
            trackApplication();
        },
        (errorMessage) => {
            // QR scanning in progress
        }
    ).catch(err => {
        console.error("Error starting scanner", err);
        Swal.fire({
            icon: 'error',
            title: 'त्रुटि',
            text: 'क्यामेरा खोल्न सकिएन। कृपया क्यामेरा अनुमति दिनुहोस्।',
            confirmButtonColor: '#667eea'
        });
    });
}

// Close QR Scanner
function closeQRScanner() {
    document.getElementById('qrScanner').classList.add('d-none');
    if (html5QrcodeScanner) {
        html5QrcodeScanner.stop().catch(err => {
            console.error("Error stopping scanner", err);
        });
    }
}

// Close modal and cleanup
document.getElementById('applicationTrackerModal').addEventListener('hidden.bs.modal', function() {
    closeQRScanner();
    document.getElementById('applicationResult').classList.add('d-none');
    document.getElementById('applicationSearchInput').value = '';
});
</script>
