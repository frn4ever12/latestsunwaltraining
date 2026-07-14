<!-- Toast Container -->
<div class="toast-container" id="toastContainer" style="position: fixed; top: 20px; right: 20px; z-index: 1000; pointer-events: none;"></div>

<script>
// Toast Notification System
function showToast(message, type = 'info') {
    const container = document.getElementById('toastContainer');
    const toast = document.createElement('div');
    toast.className = 'toast-custom';
    
    const icons = {
        success: 'fa-check-circle text-success',
        error: 'fa-times-circle text-danger',
        warning: 'fa-exclamation-circle text-warning',
        info: 'fa-info-circle text-primary'
    };
    
    toast.innerHTML = `
        <i class="fas ${icons[type]} fa-2x"></i>
        <div>
            <h6 class="mb-0 fw-bold">${type.charAt(0).toUpperCase() + type.slice(1)}</h6>
            <p class="mb-0 small">${message}</p>
        </div>
    `;
    
    container.appendChild(toast);
    
    setTimeout(() => {
        toast.style.animation = 'slideIn 0.3s ease reverse';
        setTimeout(() => toast.remove(), 300);
    }, 5000);
}

// Show notification on new training (example)
document.addEventListener('DOMContentLoaded', function() {
    // Example: Show welcome notification
    // setTimeout(() => {
    //     showToast('नयाँ तालिम कार्यक्रमहरू उपलब्ध छन्!', 'info');
    // }, 3000);
});
</script>
