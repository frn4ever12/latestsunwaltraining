<!-- Photo & Video Gallery Section -->
<section class="mb-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">
                <i class="fas fa-images text-primary me-2"></i>
                ग्यालेरी
            </h2>
            <a href="{{ route('gallery.index') }}" class="btn btn-outline-primary rounded-pill px-4">
                सबै हेर्नुहोस् <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-pills mb-4" data-aos="fade-up">
            <button class="filter-pill active" onclick="filterGallery('all')">सबै</button>
            <button class="filter-pill" onclick="filterGallery('photo')">तस्बिर</button>
            <button class="filter-pill" onclick="filterGallery('video')">भिडियो</button>
        </div>

        <div class="gallery-grid" id="galleryGrid">
            @if(isset($gallery) && $gallery->count() > 0)
                @foreach($gallery->take(9) as $item)
                    <div class="gallery-item" data-type="{{ $item->type ?? 'photo' }}" data-aos="fade-up">
                        @if($item->type === 'video')
                            <div class="position-relative">
                                <video 
                                    src="{{ asset('files/' . $item->file) }}" 
                                    class="w-100 h-100 object-fit-cover" 
                                    muted
                                    onclick="playVideo(this)"
                                    loading="lazy">
                                </video>
                                <div class="overlay">
                                    <i class="fas fa-play-circle fa-3x text-white"></i>
                                </div>
                            </div>
                        @else
                            <a href="{{ asset('files/' . $item->file) }}" data-lightbox="gallery" data-title="{{ $item->title ?? '' }}">
                                <img 
                                    src="{{ asset('files/' . $item->file) }}" 
                                    alt="{{ $item->title ?? 'Gallery Image' }}"
                                    loading="lazy">
                                <div class="overlay">
                                    <i class="fas fa-search-plus fa-2x text-white"></i>
                                </div>
                            </a>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <i class="fas fa-images fa-4x text-muted mb-3"></i>
                    <p class="text-muted">हाल कुनै ग्यालेरी छैन।</p>
                </div>
            @endif
        </div>
    </div>
</section>

<script>
// Filter Gallery
function filterGallery(type) {
    const items = document.querySelectorAll('.gallery-item');
    const pills = document.querySelectorAll('.filter-pill');
    
    // Update active pill
    pills.forEach(pill => pill.classList.remove('active'));
    event.target.classList.add('active');
    
    // Filter items
    items.forEach(item => {
        if (type === 'all' || item.getAttribute('data-type') === type) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

// Play Video
function playVideo(videoElement) {
    if (videoElement.paused) {
        videoElement.play();
        videoElement.muted = false;
    } else {
        videoElement.pause();
        videoElement.muted = true;
    }
}
</script>
