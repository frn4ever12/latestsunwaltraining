<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('dist/js/nepali.datepicker.min.js') }}"></script>
<script src="{{ asset('dist/js/np-fulldate.js') }}"></script>
<script src="{{ asset('dist/js/message.js') }}"></script>
<!-- CountUp.js for Animated Numbers -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.7/countUp.umd.js"></script>
<!-- AOS Animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Lightbox -->
<link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/css/lightbox.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/js/lightbox.min.js"></script>

<!-- PWA Service Worker Registration -->
<script>
if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
        navigator.serviceWorker.register('{{ asset('sw.js') }}')
            .then(function(registration) {
                console.log('Service Worker registered with scope:', registration.scope);
            })
            .catch(function(error) {
                console.log('Service Worker registration failed:', error);
            });
    });
}
</script>

<script>
    const inputDate = NepaliFunctions.BS.GetCurrentDate();
    const fullDate = convertToFullDate(inputDate);
    const fullDay = convertToFullDay(inputDate);
    document.getElementById('npDate').textContent = fullDate + ', ' + fullDay;
</script>
<script>
    function toNepaliDigits(str) {
        const nepaliDigits = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
        return str.replace(/\d/g, (digit) => nepaliDigits[digit]);
    }

    function updateTime() {
        const now = new Date();
        const options = {
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric',
            hour12: true,
            timeZone: 'Asia/Kathmandu',
        };

        let formattedTime = new Intl.DateTimeFormat('ne-NP', options).format(now);
        formattedTime = formattedTime.replace(/पूर्वाह्न/g, 'बिहान').replace(/अपराह्न/g, 'बेलुका');
        const nepaliTime = toNepaliDigits(formattedTime);
        document.getElementById('timeNow').textContent = nepaliTime;
    }

    setInterval(updateTime, 1000);
    updateTime();
</script>
<script>
    $(document).ready(function() {
        $('#logOutBtn').click(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('logout') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    window.location.href = '{{ route('login') }}';
                },
                error: function() {
                    alert('Something went wrong!');
                }
            });
        });
    });
</script>