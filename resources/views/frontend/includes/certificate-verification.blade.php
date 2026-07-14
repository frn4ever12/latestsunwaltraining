<!-- Digital Certificate Verification -->
<div class="modal fade" id="certificateVerificationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-gradient text-white">
                <h5 class="modal-title">
                    <i class="fas fa-certificate me-2"></i>
                    प्रमाणपत्र प्रमाणीकरण
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Verification Form -->
                <div class="mb-4">
                    <div class="search-box mb-3">
                        <i class="fas fa-search text-muted"></i>
                        <input type="text" id="certificateNumberInput" placeholder="प्रमाणपत्र नम्बर प्रविष्ट गर्नुहोस्...">
                        <button onclick="verifyCertificate()">प्रमाणित गर्नुहोस्</button>
                    </div>
                    
                    <div class="text-center mb-3">
                        <span class="text-muted small">वा</span>
                    </div>
                    
                    <div class="text-center">
                        <button class="btn btn-outline-primary" onclick="openCertificateQRScanner()">
                            <i class="fas fa-qrcode me-2"></i>
                            QR कोड स्क्यान गर्नुहोस्
                        </button>
                    </div>
                </div>

                <!-- Certificate QR Scanner -->
                <div id="certificateQRScanner" class="qr-scanner d-none mb-4">
                    <div id="certificateReader"></div>
                    <button class="btn btn-secondary w-100 mt-3" onclick="closeCertificateQRScanner()">
                        <i class="fas fa-times me-2"></i> बन्द गर्नुहोस्
                    </button>
                </div>

                <!-- Verification Result -->
                <div id="certificateResult" class="d-none">
                    <div class="verification-card" id="verificationCard">
                        <div class="text-center mb-4">
                            <i class="fas fa-check-circle fa-5x text-success mb-3" id="verificationIcon"></i>
                            <h4 class="fw-bold" id="verificationStatus">प्रमाणित</h4>
                        </div>
                        
                        <div class="card shadow-sm">
                            <div class="card-header bg-white">
                                <h6 class="mb-0 fw-bold">प्रमाणपत्र विवरण</h6>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <small class="text-muted">प्रमाणपत्र नम्बर</small>
                                        <p class="fw-bold mb-0" id="certNumber">-</p>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">आवेदकको नाम</small>
                                        <p class="fw-bold mb-0" id="certName">-</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <small class="text-muted">तालिमको नाम</small>
                                        <p class="fw-bold mb-0" id="certTraining">-</p>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">नगरपालिका</small>
                                        <p class="fw-bold mb-0" id="certMunicipality">-</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <small class="text-muted">जारी मिति</small>
                                        <p class="fw-bold mb-0" id="certIssueDate">-</p>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">QR स्थिति</small>
                                        <p class="fw-bold mb-0 text-success" id="certQRStatus">सक्रिय</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Trigger Button -->
<button class="btn btn-outline-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#certificateVerificationModal">
    <i class="fas fa-certificate me-2"></i>
    प्रमाणपत्र प्रमाणित गर्नुहोस्
</button>

<script>
let certificateHtml5QrcodeScanner = null;

// Verify Certificate
function verifyCertificate() {
    const certificateNumber = document.getElementById('certificateNumberInput').value;
    
    if (!certificateNumber) {
        Swal.fire({
            icon: 'warning',
            title: 'चेतावनी',
            text: 'कृपया प्रमाणपत्र नम्बर प्रविष्ट गर्नुहोस्।',
            confirmButtonColor: '#667eea'
        });
        return;
    }

    // Show loading
    Swal.fire({
        title: 'प्रमाणित गर्दै...',
        text: 'कृपया केही क्षण पर्खनुहोस्',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // AJAX request to verify certificate
    $.ajax({
        url: '{{ route('api.certificate.verify') }}',
        method: 'POST',
        data: {
            certificate_number: certificateNumber,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            Swal.close();
            
            if (response.valid) {
                displayCertificateResult(response.certificate, true);
            } else {
                displayCertificateResult(response, false);
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

// Display Certificate Result
function displayCertificateResult(data, isValid) {
    const card = document.getElementById('verificationCard');
    const icon = document.getElementById('verificationIcon');
    const status = document.getElementById('verificationStatus');
    
    if (isValid) {
        card.classList.remove('invalid');
        card.classList.add('verified');
        icon.className = 'fas fa-check-circle fa-5x text-success mb-3';
        status.textContent = 'प्रमाणित';
        status.className = 'fw-bold text-success';
        
        document.getElementById('certNumber').textContent = data.certificate_number || '-';
        document.getElementById('certName').textContent = data.applicant_name || '-';
        document.getElementById('certTraining').textContent = data.training_name || '-';
        document.getElementById('certMunicipality').textContent = data.municipality || '-';
        document.getElementById('certIssueDate').textContent = data.issue_date || '-';
        document.getElementById('certQRStatus').textContent = data.qr_status || 'सक्रिय';
        document.getElementById('certQRStatus').className = 'fw-bold mb-0 text-success';
    } else {
        card.classList.remove('verified');
        card.classList.add('invalid');
        icon.className = 'fas fa-times-circle fa-5x text-danger mb-3';
        status.textContent = 'अमान्य प्रमाणपत्र';
        status.className = 'fw-bold text-danger';
        
        document.getElementById('certNumber').textContent = '-';
        document.getElementById('certName').textContent = '-';
        document.getElementById('certTraining').textContent = '-';
        document.getElementById('certMunicipality').textContent = '-';
        document.getElementById('certIssueDate').textContent = '-';
        document.getElementById('certQRStatus').textContent = '-';
    }
    
    document.getElementById('certificateResult').classList.remove('d-none');
}

// Open Certificate QR Scanner
function openCertificateQRScanner() {
    document.getElementById('certificateQRScanner').classList.remove('d-none');
    
    if (!certificateHtml5QrcodeScanner) {
        certificateHtml5QrcodeScanner = new Html5Qrcode("certificateReader");
    }
    
    certificateHtml5QrcodeScanner.start(
        { facingMode: "environment" },
        {
            fps: 10,
            qrbox: { width: 250, height: 250 }
        },
        (decodedText, decodedResult) => {
            document.getElementById('certificateNumberInput').value = decodedText;
            closeCertificateQRScanner();
            verifyCertificate();
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

// Close Certificate QR Scanner
function closeCertificateQRScanner() {
    document.getElementById('certificateQRScanner').classList.add('d-none');
    if (certificateHtml5QrcodeScanner) {
        certificateHtml5QrcodeScanner.stop().catch(err => {
            console.error("Error stopping scanner", err);
        });
    }
}

// Close modal and cleanup
document.getElementById('certificateVerificationModal').addEventListener('hidden.bs.modal', function() {
    closeCertificateQRScanner();
    document.getElementById('certificateResult').classList.add('d-none');
    document.getElementById('certificateNumberInput').value = '';
});
</script>
