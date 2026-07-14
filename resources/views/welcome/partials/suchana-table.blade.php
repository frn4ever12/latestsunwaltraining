<div class="col-sm-12 col-md-4">
    <div class="card h-100">
        <div class="card-header pt-3 bg-main">
            <h5 class="card-title text-center fw-bold text-white">सूचना तथा समाचार</h5>
        </div>
        <div class="card-body">
            @foreach ($latestItems as $item)
                <div class="mb-3 border border-b">
                    <a class="d-block p-2 talim-btn text-main d-flex align-items-center" href="#">
                        <div class="bg-main text-white rounded text-center py-2  px-3 me-3 fw-bold" style="font-size: 0.8rem;">
                            <small>{{ $item->created_at->format('d') }}</small><br>
                            <small>{{ $item->created_at->format('M') }}</small>
                        </div>
                        <div>
                            <small class="fw-bold d-block">{{ $item->title_np }}</small>
                            <small class="text-secondary fw-bold" style="font-size: 0.75rem;">
                                <i class="fas fa-calendar-alt me-1"></i> {{ $item->miti_bs }}
                            </small>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
        <div class="card-footer bg-white text-center">
            <div>
                <a href="{{ route('samachar.index') }}" class="btn btn-main px-4">थप हेर्नुहोस् <i class="fa fa-caret-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>
