<!--   Core JS Files   -->
<script src="{{ asset('Backend/assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('Backend/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('Backend/assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('Backend/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('Backend/assets/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('Backend/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>


<!-- Bootstrap Notify -->
<script src="{{ asset('Backend/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<!-- Kaiadmin JS -->
<script src="{{ asset('Backend/assets/js/kaiadmin.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

@if (session('success'))
    <script>
        $.notify({
            icon: 'fa fa-check',
            title: 'Success!',
            message: '{{ session('success') }}'
        }, {
            type: 'success',
            placement: {
                from: "top",
                align: "right"
            },
            time: 1000
        });
    </script>
@endif

@if (session('error'))
    <script>
        $.notify({
            icon: 'fa fa-times-circle',
            title: 'Error!',
            message: '{{ session('error') }}'
        }, {
            type: 'danger',
            placement: {
                from: "top",
                align: "right"
            },
            time: 1000
        });
    </script>
@endif


<script>
    $(document).ready(function() {
        $('#logOutBtn1,#logOutBtn2').click(function(e) {
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
<script src="{{ asset('dist/js/nepali.datepicker.min.js') }}"></script>
<script src="{{ asset('dist/js/np-fulldate.js') }}"></script>



<script>
    const npDateElement = document.getElementById('npDate');
    if (npDateElement) {
        const inputDate = NepaliFunctions.BS.GetCurrentDate();
        const fullDate = convertToFullDate(inputDate);
        const fullDay = convertToFullDay(inputDate);
        npDateElement.textContent = fullDate + ', ' + fullDay;
    }
</script>
<script src="{{ asset('Backend/assets/js/index.js') }}"></script>
<script src="{{ asset('Backend/assets/js/np-number.js') }}"></script>
