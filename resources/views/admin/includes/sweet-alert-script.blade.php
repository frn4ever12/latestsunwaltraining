<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click', '.deleteBtn', function() {
        var id = $(this).data('id');
        var deleteRoute = $(this).data('route');
        Swal.fire({
            title: 'के तपाईँ डेटा मेट्न चाहनुहुन्छ?',
            text: 'मेटिएको डेटा पुनः प्राप्त गर्न सकिँदैन!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'हो',
            cancelButtonText: 'रद्द गर्नुहोस्',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deleteRoute,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status === 200) {
                            Swal.fire(
                                'मेट्न सफल',
                                'डेटा मेटिएको छ!',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed || result
                                    .isDismissed) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire(
                                'मेट्न असफल!',
                                'त्रुटि',
                                'error'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire(
                            'त्रुटि!',
                            'डेटा मेट्न असफल!',
                            'error'
                        );
                    }
                });
            }
        });
    });
</script>
