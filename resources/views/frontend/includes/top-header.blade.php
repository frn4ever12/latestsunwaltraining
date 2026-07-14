<!-- Date/Time Section -->
<div class="mb-2 bg-main-secondary">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <p class="py-2 mb-0  text-start text-md-start">
                    <small>
                        <span>नेपाली समय </span>
                        <span id="timeNow"></span>,
                        <span id="npDate"></span>
                    </small>
                </p>
            </div>
            <div class="col-md-8 d-sm-none d-md-block">
                <div class="pt-2 text-end">
                    @if (isset(get_detail()->email))
                        <small class="me-3"><i class="fa fa-envelope me-2" style="font-size:0.75rem;"></i> {{ get_detail()->email ?? '' }}</small>
                    @endif
                    @if (isset(get_detail()->contact_no))
                        <small><i class="fa fa-phone-volume me-2" style="font-size:0.75rem;"></i> {{ \App\Helpers\NumberHelper::toNepaliNumber(get_detail()->contact_no) ?? '' }}</small>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
