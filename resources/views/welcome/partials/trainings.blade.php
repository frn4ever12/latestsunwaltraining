<!-- Featured Trainings Section -->
<div class="mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">
            <i class="fas fa-graduation-cap text-primary me-2"></i>
            तालिमहरू
        </h2>
        <a href="{{ route('training.index') }}" class="btn btn-primary rounded-pill px-4">
            सबै हेर्नुहोस् <i class="fas fa-arrow-right ms-2"></i>
        </a>
    </div>

    <!-- Advanced Search & Filter -->
    <div class="card shadow-sm mb-4" data-aos="fade-up" style="border-radius: 16px;">
        <div class="card-body">
            <div class="row g-3">
                <!-- Search Input -->
                <div class="col-lg-4 col-md-6">
                    <div class="search-box position-relative">
                        <i class="fas fa-search text-muted position-absolute" style="left: 12px; top: 50%; transform: translateY(-50%);"></i>
                        <input type="text" id="trainingSearchInput" placeholder="तालिम खोज्नुहोस्..." 
                               class="form-control ps-4" style="border-radius: 25px; padding-left: 40px;"
                               onkeyup="filterTrainingsRealtime()">
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="col-lg-2 col-md-6">
                    <select class="form-select" id="categoryFilter" onchange="filterTrainingsRealtime()" style="border-radius: 25px;">
                        <option value="">श्रेणी सबै</option>
                        @foreach($categories ?? [] as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name_np ?? '' }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Filter -->
                <div class="col-lg-2 col-md-6">
                    <select class="form-select" id="statusFilter" onchange="filterTrainingsRealtime()" style="border-radius: 25px;">
                        <option value="">स्थिति सबै</option>
                        <option value="upcoming">आगामी</option>
                        <option value="active">सक्रिय</option>
                        <option value="completed">सम्पन्न</option>
                    </select>
                </div>

                <!-- Date Filter -->
                <div class="col-lg-2 col-md-6">
                    <input type="date" id="dateFilter" class="form-control" onchange="filterTrainingsRealtime()" style="border-radius: 25px;">
                </div>

                <!-- Reset Button -->
                <div class="col-lg-2 col-md-6">
                    <button class="btn btn-outline-secondary w-100" onclick="resetFilters()" style="border-radius: 25px;">
                        <i class="fas fa-redo me-1"></i> रिसेट
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sorting Options -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex gap-2">
            <select class="form-select form-select-sm" id="sortBy" onchange="sortTrainings()" style="width: auto; border-radius: 25px;">
                <option value="latest">नवीनतम</option>
                <option value="upcoming">आगामी</option>
                <option value="popular">लोकप्रिय</option>
                <option value="deadline">अन्तिम मिति</option>
                <option value="seats">सिट उपलब्ध</option>
            </select>
        </div>
    </div>

    <!-- Filter Pills -->
    <div class="filter-pills mb-4" data-aos="fade-up">
        <button class="filter-pill active" onclick="quickFilter('all')">सबै</button>
        <button class="filter-pill" onclick="quickFilter('open')">खुला</button>
        <button class="filter-pill" onclick="quickFilter('upcoming')">आगामी</button>
        <button class="filter-pill" onclick="quickFilter('active')">चलिरहेको</button>
        <button class="filter-pill" onclick="quickFilter('completed')">सम्पन्न</button>
    </div>

    <!-- Results Count -->
    <div class="mb-3" id="resultsCount">
        <small class="text-muted">कुल {{ $trainings->count() }} तालिमहरू देखाइएको छ</small>
    </div>

    @if($trainings->count() > 0)
    <div class="row g-4" id="trainingsGrid">
        @foreach ($trainings as $training)
            @php
                // Calculate seat percentage
                $appliedCount = $training->training_applications_count ?? 0;
                $totalSeats = $training->available_seats ?? 1;
                $remainingSeats = $totalSeats - $appliedCount;
                $seatPercentage = ($appliedCount / $totalSeats) * 100;
                
                // Determine seat progress color
                if ($seatPercentage < 50) {
                    $seatProgressColor = '#28a745'; // Green - Many seats
                } elseif ($seatPercentage < 80) {
                    $seatProgressColor = '#ffc107'; // Orange - Few seats
                } else {
                    $seatProgressColor = '#dc3545'; // Red - Full
                }
                
                // Calculate remaining days
                $daysLeft = null;
                if($training->application_deadline) {
                    try {
                        $deadline = \Carbon\Carbon::parse($training->application_deadline);
                        $now = \Carbon\Carbon::now();
                        $daysLeft = $now->diffInDays($deadline, false);
                        if($daysLeft < 0) $daysLeft = 0;
                        $daysLeft = (int) $daysLeft;
                    } catch(\Exception $e) {
                        $daysLeft = null;
                    }
                }
                
                // Determine countdown color
                if ($daysLeft !== null) {
                    if ($daysLeft > 7) {
                        $countdownColor = '#28a745'; // Green
                    } elseif ($daysLeft > 3) {
                        $countdownColor = '#ffc107'; // Yellow
                    } else {
                        $countdownColor = '#dc3545'; // Red
                    }
                }
                
                // Determine status badge
                $statusBadge = '';
                $statusColor = '';
                if ($training->status == 'active') {
                    $statusBadge = '🟢 सक्रिय';
                    $statusColor = '#28a745';
                } elseif ($training->status == 'upcoming') {
                    $statusBadge = '🕒 आगामी आउन लागेको';
                    $statusColor = '#17a2b8';
                } elseif ($training->status == 'completed') {
                    $statusBadge = '✅ सम्पन्न';
                    $statusColor = '#6c757d';
                } elseif ($training->status == 'dismissed') {
                    $statusBadge = '🔴 आवेदन बन्द';
                    $statusColor = '#dc3545';
                } else {
                    $statusBadge = '🟢 आवेदन खुला';
                    $statusColor = '#28a745';
                }
                
                // Format duration
                $displayDate = 'N/A';
                if($training->start_miti_bs && $training->end_miti_bs) {
                    try {
                        $startDateParts = explode('-', $training->start_miti_bs);
                        $endDateParts = explode('-', $training->end_miti_bs);
                        $startDay = $startDateParts[2] ?? '';
                        $startMonth = $startDateParts[1] ?? '';
                        $endDay = $endDateParts[2] ?? '';
                        $endMonth = $endDateParts[1] ?? '';
                        $displayDate = \App\Helpers\NumberHelper::toNepaliNumber($startDay) . ' ' . \App\Helpers\NumberHelper::toNepaliMonth($startMonth) . ' – ' . \App\Helpers\NumberHelper::toNepaliNumber($endDay) . ' ' . \App\Helpers\NumberHelper::toNepaliMonth($endMonth);
                    } catch(\Exception $e) {
                        $displayDate = $training->start_miti_bs . ' – ' . $training->end_miti_bs;
                    }
                } elseif($training->start_miti_bs) {
                    $displayDate = $training->start_miti_bs;
                }
                
                // Check if application is open
                $applicationOpen = $training->status === 'upcoming' && $remainingSeats > 0;
            @endphp
            
            <div class="col-lg-4 col-md-6 col-sm-12 training-item" 
                 data-status="{{ $training->status }}" 
                 data-department="{{ $training->department_id ?? '' }}"
                 data-category="{{ $training->category_id ?? '' }}"
                 data-ward="{{ $training->ward_id ?? '' }}"
                 data-type="{{ $training->is_free ? 'free' : 'paid' }}"
                 data-start-date="{{ $training->start_date ?? '' }}"
                 data-title="{{ strtolower($training->name_np ?? '') }}"
                 data-aos="fade-up">
                <div class="card h-100 border-0 modern-training-card" 
                     style="border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    
                    <!-- Status Badge -->
                    <div class="position-absolute top-0 start-0 m-3">
                        <span class="badge rounded-pill px-3 py-2" style="background-color: {{ $statusColor }}; font-size: 0.8rem; font-weight: 600;">
                            {{ $statusBadge }}
                        </span>
                    </div>
                    
                    <div class="card-body p-4">
                        <!-- Training Title -->
                        <h5 class="fw-bold mb-3" style="font-size: 1.3rem; color: #0f61f0;">
                            <i class="fas fa-graduation-cap me-2"></i>
                            {{ $training->name_np ?? '' }}
                        </h5>
                        
                        <!-- Trainer Information -->
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">
                                <i class="fas fa-user me-1"></i> प्रशिक्षक
                            </small>
                            <div class="fw-bold">{{ $training->trainer_name_np ?? ($training->trainer_name_eng ?? 'N/A') }}</div>
                        </div>
                        
                        <!-- Organizer -->
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">
                                <i class="fas fa-building me-1"></i> आयोजक
                            </small>
                            <div class="fw-bold">{{ get_detail()->palika_name ?? 'सुनवल नगरपालिका' }}</div>
                        </div>
                        
                        <!-- Training Duration -->
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">
                                <i class="fas fa-calendar-alt me-1"></i> अवधि
                            </small>
                            <div class="fw-bold">{{ $displayDate }}</div>
                        </div>
                        
                        <!-- Venue -->
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">
                                <i class="fas fa-map-marker-alt me-1"></i> स्थान
                            </small>
                            <div class="fw-bold">{{ $training->training_location ?? 'N/A' }}</div>
                        </div>
                        
                        <!-- Seat Availability -->
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">
                                <i class="fas fa-chair me-1"></i> उपलब्ध सिट
                            </small>
                            <div class="d-flex align-items-center mb-2">
                                <span class="fw-bold me-2" style="color: #0f61f0;">
                                    {{ $remainingSeats }} / {{ $totalSeats }}
                                </span>
                            </div>
                            <div class="progress" style="height: 8px; border-radius: 4px;">
                                <div class="progress-bar" role="progressbar" 
                                     style="width: {{ $seatPercentage }}%; background-color: {{ $seatProgressColor }};"
                                     aria-valuenow="{{ $seatPercentage }}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                </div>
                            </div>
                        </div>

                        <!-- Countdown -->
                        @if($daysLeft !== null)
                        <div class="mb-3 p-3 rounded" style="background-color: #f8f9fa;">
                            <small class="text-muted d-block mb-1">
                                <i class="fas fa-clock me-1"></i> बाँकी दिन
                            </small>
                            <div class="fw-bold" style="color: {{ $countdownColor }}; font-size: 1.1rem;">
                                {{ $daysLeft }} दिन
                            </div>
                        </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('training.show', $training->id) }}" 
                               class="btn btn-outline-primary flex-grow-1 rounded-pill"
                               style="border-radius: 25px; padding: 10px 20px;">
                                <i class="fas fa-eye me-1"></i> विवरण
                            </a>
                            @if($applicationOpen)
                                <a href="{{ route('training-application.index', $training->id) }}" 
                                   class="btn btn-primary flex-grow-1 rounded-pill"
                                   style="border-radius: 25px; padding: 10px 20px; background: linear-gradient(135deg, #0f61f0 0%, #0a4bb5 100%);">
                                    <i class="fas fa-envelope me-1"></i> आवेदन
                                </a>
                            @else
                                <button class="btn btn-secondary flex-grow-1 rounded-pill" disabled
                                        style="border-radius: 25px; padding: 10px 20px;">
                                    <i class="fas fa-times-circle me-1"></i> आवेदन बन्द
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-5">
        <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
        <p class="text-muted">हाल कुनै तालिम उपलब्ध छैन।</p>
    </div>
    @endif

    <!-- No Results Message -->
    <div id="noResults" class="text-center py-5 d-none">
        <i class="fas fa-search fa-4x text-muted mb-3"></i>
        <p class="text-muted">कुनै तालिम फेला परेन। कृपया फिल्टर परिवर्तन गर्नुहोस्।</p>
    </div>
</div>

<script>
// Countdown Timer Function
function initCountdownTimers() {
    const timers = document.querySelectorAll('.countdown-timer');
    
    timers.forEach(timer => {
        const deadline = new Date(timer.getAttribute('data-deadline'));
        
        function updateTimer() {
            const now = new Date();
            const diff = deadline - now;
            
            if (diff <= 0) {
                timer.innerHTML = '<span class="text-center fw-bold">दर्ता बन्द भयो</span>';
                return;
            }
            
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);
            
            timer.querySelector('.days').textContent = String(days).padStart(2, '0');
            timer.querySelector('.hours').textContent = String(hours).padStart(2, '0');
            timer.querySelector('.minutes').textContent = String(minutes).padStart(2, '0');
            timer.querySelector('.seconds').textContent = String(seconds).padStart(2, '0');
        }
        
        updateTimer();
        setInterval(updateTimer, 1000);
    });
}

// Real-time Filter Function
function filterTrainingsRealtime() {
    const searchTerm = document.getElementById('trainingSearchInput').value.toLowerCase();
    const departmentFilter = document.getElementById('departmentFilter').value;
    const categoryFilter = document.getElementById('categoryFilter').value;
    const wardFilter = document.getElementById('wardFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;
    const typeFilter = document.getElementById('typeFilter').value;
    const dateFilter = document.getElementById('dateFilter').value;
    
    const items = document.querySelectorAll('.training-item');
    let visibleCount = 0;
    
    items.forEach(item => {
        const title = item.getAttribute('data-title').toLowerCase();
        const department = item.getAttribute('data-department');
        const category = item.getAttribute('data-category');
        const ward = item.getAttribute('data-ward');
        const status = item.getAttribute('data-status');
        const type = item.getAttribute('data-type');
        const startDate = item.getAttribute('data-start-date');
        
        let isVisible = true;
        
        // Search term filter
        if (searchTerm && !title.includes(searchTerm)) {
            isVisible = false;
        }
        
        // Department filter
        if (departmentFilter && department !== department) {
            isVisible = false;
        }
        
        // Category filter
        if (categoryFilter && category !== categoryFilter) {
            isVisible = false;
        }
        
        // Ward filter
        if (wardFilter && ward !== wardFilter) {
            isVisible = false;
        }
        
        // Status filter
        if (statusFilter && status !== statusFilter) {
            isVisible = false;
        }
        
        // Type filter
        if (typeFilter && type !== typeFilter) {
            isVisible = false;
        }
        
        // Date filter
        if (dateFilter && startDate) {
            const itemDate = new Date(startDate);
            const filterDate = new Date(dateFilter);
            if (itemDate < filterDate) {
                isVisible = false;
            }
        }
        
        if (isVisible) {
            item.style.display = 'block';
            visibleCount++;
        } else {
            item.style.display = 'none';
        }
    });
    
    // Update results count
    document.getElementById('resultsCount').innerHTML = 
        `<small class="text-muted">${visibleCount} तालिमहरू देखाइएको छ</small>>`;
    
    // Show/hide no results message
    document.getElementById('noResults').classList.toggle('d-none', visibleCount > 0);
}

// Quick Filter
function quickFilter(status) {
    const pills = document.querySelectorAll('.filter-pill');
    pills.forEach(pill => pill.classList.remove('active'));
    event.target.classList.add('active');
    
    document.getElementById('statusFilter').value = status === 'all' ? '' : status;
    filterTrainingsRealtime();
}

// Reset Filters
function resetFilters() {
    document.getElementById('trainingSearchInput').value = '';
    document.getElementById('categoryFilter').value = '';
    document.getElementById('statusFilter').value = '';
    document.getElementById('dateFilter').value = '';
    
    // Reset filter pills
    const pills = document.querySelectorAll('.filter-pill');
    pills.forEach(pill => pill.classList.remove('active'));
    pills[0].classList.add('active');
    
    filterTrainingsRealtime();
}

// Sort Trainings
function sortTrainings() {
    const sortBy = document.getElementById('sortBy').value;
    const grid = document.getElementById('trainingsGrid');
    const items = Array.from(grid.children);
    
    items.sort(function(a, b) {
        const aStatus = a.getAttribute('data-status');
        const bStatus = b.getAttribute('data-status');
        const aStartDate = a.getAttribute('data-start-date');
        const bStartDate = b.getAttribute('data-start-date');
        
        switch(sortBy) {
            case 'latest':
                // Sort by original order (reverse)
                return -1;
            case 'upcoming':
                // Upcoming first, then active, then completed
                const statusOrder = { 'upcoming': 1, 'active': 2, 'completed': 3 };
                return statusOrder[aStatus] - statusOrder[bStatus];
            case 'popular':
                // Sort by applications count (if available in data)
                return 0;
            case 'deadline':
                // Sort by start date
                if (!aStartDate) return 1;
                if (!bStartDate) return -1;
                return new Date(aStartDate) - new Date(bStartDate);
            case 'seats':
                // Sort by available seats (if available in data)
                return 0;
            default:
                return 0;
        }
    });
    
    items.forEach(function(item) {
        grid.appendChild(item);
    });
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    initCountdownTimers();
});
</script>
