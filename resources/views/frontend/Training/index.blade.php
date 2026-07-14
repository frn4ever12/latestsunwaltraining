@extends('frontend.includes.main')

@section('content')
    <div aria-label="breadcrumb" style="border-bottom: 1px solid rgb(237, 237, 237);">
        <div class="container mb-0">
            <ol class="breadcrumb  p-2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-main"><i
                            class="bi bi-house-door me-2"></i>गृह पृष्ठ</a>
                </li>
                <li class="breadcrumb-item active">तालिमहरू</li>
            </ol>
        </div>
    </div>
    <div class="container py-4">
        <div class="card border-0 mb-3">
            <div class="card-body">
                <div class="mb-3">
                    <h5 class=" fw-bold">तालिम खोज्नुहोस्</h5>
                </div>
                <form method="GET" action="{{ route('training.index') }}">
                    <div class="row g-2">
                        <div class="col-md-4 col-sm-6">
                            <input type="text" name="training_name" class="form-control" placeholder="तालिम"
                                value="{{ request('training_name') }}">
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <select class="form-control" name="category" id="">
                                <option value="">क्याटेगोरी छान्नुहोस्</option>
                                @foreach (\App\Models\Category::select('id', 'name_np')->get() as $data)
                                    <option value="{{ $data->id }}" {{ request('category')==$data->id?'selected':'' }}>{{ $data->name_np }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <input type="text" name="entry_date" class="form-control nepali-datepicker"
                                placeholder="मिति देखि" value="{{ request('entry_date') }}">
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <input type="text" id="nepali-datepicker" name="end_date"
                                class="form-control nepali-datepicker" placeholder="मिति सम्म"
                                value="{{ request('end_date') }}">
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <button class="btn btn-main w-100"><i class="fa fa-search me-2"></i>खोज्नुहोस्</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body">
                <div class="mb-3">
                    <h5 class="fw-bold">तालिमहरू</h5>
                </div>

                <!-- Advanced Search & Filter -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Search Input -->
                            <div class="col-lg-4 col-md-6">
                                <div class="search-box">
                                    <i class="fas fa-search text-muted"></i>
                                    <input type="text" id="trainingSearchInput" placeholder="तालिम खोज्नुहोस्..." onkeyup="filterTrainingsRealtime()">
                                </div>
                            </div>

                            <!-- Department Filter -->
                            <div class="col-lg-2 col-md-6">
                                <select class="form-select" id="departmentFilter" onchange="filterTrainingsRealtime()">
                                    <option value="">विभाग सबै</option>
                                    @foreach($departments ?? [] as $dept)
                                        <option value="{{ $dept->id }}">{{ $dept->name_np ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Category Filter -->
                            <div class="col-lg-2 col-md-6">
                                <select class="form-select" id="categoryFilter" onchange="filterTrainingsRealtime()">
                                    <option value="">श्रेणी सबै</option>
                                    @foreach($categories ?? [] as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name_np ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Ward Filter -->
                            <div class="col-lg-2 col-md-6">
                                <select class="form-select" id="wardFilter" onchange="filterTrainingsRealtime()">
                                    <option value="">वार्ड सबै</option>
                                    @foreach($wards ?? [] as $ward)
                                        <option value="{{ $ward->id }}">वार्ड {{ $ward->id }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Status Filter -->
                            <div class="col-lg-2 col-md-6">
                                <select class="form-select" id="statusFilter" onchange="filterTrainingsRealtime()">
                                    <option value="">स्थिति सबै</option>
                                    <option value="active">सक्रिय</option>
                                    <option value="upcoming">आगामी</option>
                                    <option value="completed">सम्पन्न</option>
                                    <option value="dismissed">खारेज</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4" id="trainingCardsContainer">
                    @foreach ($trainings as $training)
                        <div class="col-lg-4 col-md-6 col-sm-12 training-item" 
                             data-title="{{ $training->name_np ?? '' }}"
                             data-department="{{ $training->department_id ?? '' }}"
                             data-category="{{ $training->category_id ?? '' }}"
                             data-ward="{{ $training->ward_id ?? '' }}"
                             data-status="{{ $training->status ?? '' }}"
                             data-start-date="{{ $training->start_date ?? '' }}">
                            <div class="training-card h-100 border-0 shadow-sm" 
                                 style="border-left: 4px solid 
                                    @if ($training->status == 'active') #28a745
                                    @elseif($training->status == 'upcoming') #17a2b8
                                    @elseif($training->status == 'completed') #6c757d
                                    @else #0f61f0 @endif;">
                                <!-- Card Header with Status -->
                                <div class="card-header bg-transparent border-0 pb-0">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <span class="badge 
                                            @if ($training->status == 'active') bg-success 
                                            @elseif($training->status == 'completed') bg-secondary 
                                            @elseif($training->status == 'upcoming') bg-info 
                                            @elseif($training->status == 'dismissed') bg-danger 
                                            @else bg-primary @endif rounded-pill px-3 py-2">
                                            <i class="fas 
                                                @if ($training->status == 'active') fa-play-circle
                                                @elseif($training->status == 'completed') fa-check-circle
                                                @elseif($training->status == 'upcoming') fa-clock
                                                @elseif($training->status == 'dismissed') fa-times-circle
                                                @else fa-info-circle @endif me-1"></i>
                                            {{ __('messages.' . $training->status) }}
                                        </span>
                                        @if($training->is_free == 'free')
                                            <span class="badge bg-success rounded-pill px-2 py-1">
                                                <i class="fas fa-gift me-1"></i> निःशुल्क
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="card-body">
                                    <!-- Training Title -->
                                    <h5 class="fw-bold mb-2">
                                        <i class="fas fa-graduation-cap me-2"></i>
                                        {{ $training->name_np ?? '' }}
                                    </h5>
                                    
                                    <!-- Info Grid -->
                                    <div class="info-grid mb-2">
                                        <div class="info-item">
                                            <i class="fas fa-user-tie"></i>
                                            <span>{{ $training->trainer_name_np ?? ($training->trainer_name_eng ?? 'N/A') }}</span>
                                        </div>
                                        <div class="info-item">
                                            <i class="fas fa-building"></i>
                                            <span>{{ $training->department?->name_np ?? 'N/A' }}</span>
                                        </div>
                                        <div class="info-item">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>
                                                @if($training->start_miti_bs && $training->end_miti_bs)
                                                    @php
                                                        try {
                                                            $startDateParts = explode('-', $training->start_miti_bs);
                                                            $endDateParts = explode('-', $training->end_miti_bs);
                                                            $startDay = $startDateParts[2] ?? '';
                                                            $startMonth = $startDateParts[1] ?? '';
                                                            $endDay = $endDateParts[2] ?? '';
                                                            $endMonth = $endDateParts[1] ?? '';
                                                            $displayDate = \App\Helpers\NumberHelper::toNepaliNumber($startDay) . ' ' . \App\Helpers\NumberHelper::toNepaliMonth($startMonth) . ' - ' . \App\Helpers\NumberHelper::toNepaliNumber($endDay) . ' ' . \App\Helpers\NumberHelper::toNepaliMonth($endMonth);
                                                        } catch(\Exception $e) {
                                                            $displayDate = $training->start_miti_bs . ' - ' . $training->end_miti_bs;
                                                        }
                                                    @endphp
                                                    {{ $displayDate }}
                                                @elseif($training->start_miti_bs)
                                                    {{ $training->start_miti_bs }}
                                                @else
                                                    N/A
                                                @endif
                                            </span>
                                        </div>
                                        <div class="info-item">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>{{ $training->training_location ?? 'N/A' }}</span>
                                        </div>
                                    </div>

                                    <!-- Seats Info -->
                                    <div class="seats-info mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-chair me-2" style="color: #0f61f0;"></i>
                                                <span class="text-muted small">उपलब्ध सिट</span>
                                            </div>
                                            <span class="fw-bold" style="color: #0f61f0;">
                                                {{ $training->available_seats - $training->training_applications_count }} / {{ $training->available_seats }}
                                            </span>
                                        </div>
                                        <div class="progress mt-2" style="height: 4px;">
                                            <div class="progress-bar bg-gradient" 
                                                 style="width: {{ (($training->available_seats - $training->training_applications_count) / $training->available_seats) * 100 }}%">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Remaining Days -->
                                    @if($training->application_deadline)
                                        @php
                                            try {
                                                $deadline = \Carbon\Carbon::parse($training->application_deadline);
                                                $now = \Carbon\Carbon::now();
                                                $daysLeft = $now->diffInDays($deadline, false);
                                                if($daysLeft < 0) $daysLeft = 0;
                                                $daysLeft = (int) $daysLeft;
                                            } catch(\Exception $e) {
                                                $daysLeft = null;
                                            }
                                        @endphp
                                        @if($daysLeft !== null)
                                        <div class="remaining-days text-center py-2" style="background: linear-gradient(135deg, #fff3cd 0%, #ffeeba 100%); border-radius: 8px; border-left: 3px solid #ffc107;">
                                            <small class="text-muted">
                                                <i class="fas fa-clock me-1" style="color: #ffc107;"></i>
                                                बाँकी दिन: <strong class="text-warning">{{ $daysLeft }} दिन</strong>
                                            </small>
                                        </div>
                                        @endif
                                    @endif

                                    <!-- Action Buttons -->
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('training.show', $training->id) }}" class="btn btn-outline-primary flex-grow-1 rounded-pill">
                                            <i class="fas fa-eye me-1"></i> विवरण
                                        </a>
                                        @if (auth()->check() && auth()->user()->hasAppliedToTraining($training->id))
                                            <a href="{{ route('admin.application.index') }}" class="btn btn-warning flex-grow-1 rounded-pill">
                                                <i class="fas fa-check me-1"></i> आवेदन गरिसक्नुभयो
                                            </a>
                                        @else
                                            @if ($training->status === 'upcoming' && $training->training_applications_count < $training->available_seats)
                                                <a href="{{ route('training-application.index', $training->id) }}" class="btn btn-primary flex-grow-1 rounded-pill">
                                                    <i class="fas fa-paper-plane me-1"></i> आवेदन
                                                </a>
                                            @else
                                                <button class="btn btn-secondary flex-grow-1 rounded-pill" disabled>
                                                    <i class="fas fa-times me-1"></i> सिट भरिएको
                                                </button>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $trainings->withQueryString()->links() }}
    </div>

    <!-- No Results Message -->
    <div id="noResults" class="text-center py-5 d-none">
        <i class="fas fa-search fa-4x text-muted mb-3"></i>
        <p class="text-muted">कुनै तालिम फेला परेन। कृपया फिल्टर परिवर्तन गर्नुहोस्।</p>
    </div>
@endsection
@section('scripts')
    <style>
        .search-box {
            position: relative;
        }
        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
        }
        .search-box input {
            padding-left: 40px;
        }
        .training-card {
            transition: all 0.3s ease;
        }
        .training-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
        }
        .info-grid {
            display: grid;
            gap: 8px;
        }
        .info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            color: #6c757d;
        }
        .info-item i {
            width: 16px;
            text-align: center;
            color: #0f61f0;
        }
    </style>
    <script>
        // Real-time Filter Function
        function filterTrainingsRealtime() {
            const searchTerm = document.getElementById('trainingSearchInput').value.toLowerCase();
            const departmentFilter = document.getElementById('departmentFilter').value;
            const categoryFilter = document.getElementById('categoryFilter').value;
            const wardFilter = document.getElementById('wardFilter').value;
            const statusFilter = document.getElementById('statusFilter').value;
            
            const items = document.querySelectorAll('.training-item');
            let visibleCount = 0;
            
            items.forEach(item => {
                const title = item.getAttribute('data-title').toLowerCase();
                const department = item.getAttribute('data-department');
                const category = item.getAttribute('data-category');
                const ward = item.getAttribute('data-ward');
                const status = item.getAttribute('data-status');
                
                let isVisible = true;
                
                // Search term filter
                if (searchTerm && !title.includes(searchTerm)) {
                    isVisible = false;
                }
                
                // Department filter
                if (departmentFilter && department !== departmentFilter) {
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
                
                if (isVisible) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Show/hide no results message
            document.getElementById('noResults').classList.toggle('d-none', visibleCount > 0);
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            filterTrainingsRealtime();
        });
    </script>
@endsection
