@if (isset($broadcast->message))
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">{{ $broadcast->title_np ?? '' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $broadcast->message ?? '' }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                            class="fa fa-times me-2"></i> बन्द गर्नुहोस्</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            if (!sessionStorage.getItem('modalShown')) {
                $('#messageModal').modal('show');

                sessionStorage.setItem('modalShown', 'true');
            }
        });
    </script>
@endif
