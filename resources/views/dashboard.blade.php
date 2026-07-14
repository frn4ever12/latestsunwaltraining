@extends('admin.includes.main')
@section('title', 'Admin Dashboard - Municipality Training Portal')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v10.1.0/ol.css">
    <script src="https://cdn.jsdelivr.net/npm/ol@v10.1.0/dist/ol.js"></script>
    <style>
        /* Hide automatic page header from Kaiadmin theme for dashboard only */
        .page-header {
            display: none !important;
        }

        /* Dashboard Cards Styling */
        .stats-card {
            height: 140px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .stats-card .background-icon {
            opacity: 0.3;
        }

        .stats-card h3 {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1.2;
        }

        .stats-card p {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0;
        }

        /* Chart and Map Card Styling */
        .card.shadow-none {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }

        .card-header.bg-main {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: white;
            border-radius: 12px 12px 0 0;
            padding: 16px 20px;
        }

        .card-body.border {
            border: none;
            padding: 20px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .stats-card {
                height: auto;
                min-height: 120px;
            }

            .stats-card h3 {
                font-size: 1.5rem;
            }

            .stats-card p {
                font-size: 0.9rem;
            }
        }
    </style>
@endsection

@section('content')
    <section>
        <div class="row g-3">
                <!-- कुल तालिम -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card stats-card flex-row align-items-center text-white border-0"
                        style="background: linear-gradient(135deg, #f85008, #f42f2f);">
                        <div class="p-4 d-flex align-items-center justify-content-center" style="flex: 0 0 100px;">
                            <i class="fa fa-users fa-3x background-icon"></i>
                        </div>
                        <div class="flex-grow-1 py-3 px-4">
                            <h3 class="fw-bold mb-1 npNum">{{ \App\Models\Training::count() ?? 0 }}</h3>
                            <p class="mb-1 fs-5 fw-bold">कुल तालिम</p>
                        </div>
                    </div>
                </div>

                <!-- कुल आवेदन -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card stats-card flex-row align-items-center text-white border-0"
                        style="background: linear-gradient(135deg, #fad70b, #fdc305);">
                        <div class="p-4 d-flex align-items-center justify-content-center" style="flex: 0 0 100px;">
                            <i class="fa fa-file-alt fa-3x background-icon"></i>
                        </div>
                        <div class="flex-grow-1 py-3 px-4">
                            <h3 class="fw-bold mb-1 npNum">{{ \App\Models\TrainingApplication::count() ?? 0 }}</h3>
                            <p class="mb-1 fs-5 fw-bold">कुल आवेदन</p>
                        </div>
                    </div>
                </div>

                <!-- स्वीकृत आवेदन -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card stats-card flex-row align-items-center text-white border-0"
                        style="background: linear-gradient(135deg, #059e7a, #28cba7);">
                        <div class="p-4 d-flex align-items-center justify-content-center" style="flex: 0 0 100px;">
                            <i class="fa fa-file-alt fa-3x background-icon"></i>
                        </div>
                        <div class="flex-grow-1 py-3 px-4">
                            <h3 class="fw-bold mb-1 npNum">{{ \App\Models\TrainingApplication::where('status','approved')->count() ?? 0 }}</h3>
                            <p class="mb-1 fs-5 fw-bold">स्वीकृत आवेदन</p>
                        </div>
                    </div>
                </div>

                <!-- आगामी आउन लागेको तालिम -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card stats-card flex-row align-items-center text-white border-0"
                        style="background: linear-gradient(135deg, #06b865, rgb(6, 195, 154));">
                        <div class="p-4 d-flex align-items-center justify-content-center" style="flex: 0 0 100px;">
                            <i class="fa fa-clock fa-3x background-icon"></i>
                        </div>
                        <div class="flex-grow-1 py-3 px-4">
                            <h3 class="fw-bold mb-1 npNum">
                                {{ \App\Models\Training::where('status', 'upcoming')->count() ?? 0 }}
                            </h3>
                            <p class="mb-1 fs-5 fw-bold">आगामी आउन लागेको तालिम</p>
                        </div>
                    </div>
                </div>

                <!-- सम्पन्न तालिम -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card stats-card flex-row align-items-center text-white border-0"
                        style="background: linear-gradient(135deg, #2569f1, #0e4ecf);">
                        <div class="p-4 d-flex align-items-center justify-content-center" style="flex: 0 0 100px;">
                            <i class="fa fa-check-circle fa-3x background-icon"></i>
                        </div>
                        <div class="flex-grow-1 py-3 px-4">
                            <h3 class="fw-bold mb-1 npNum">
                                {{ \App\Models\Training::where('status', 'completed')->count() ?? 0 }}
                            </h3>
                            <p class="mb-1 fs-5 fw-bold">सम्पन्न तालिम</p>
                        </div>
                    </div>
                </div>

                <!-- चलीरहेको तालिम -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card stats-card flex-row align-items-center text-white border-0"
                        style="background: linear-gradient(135deg, #f94144, #f3722c);">
                        <div class="p-4 d-flex align-items-center justify-content-center" style="flex: 0 0 100px;">
                            <i class="fa fa-calendar-alt fa-3x background-icon"></i>
                        </div>
                        <div class="flex-grow-1 py-3 px-4">
                            <h3 class="fw-bold mb-1 npNum">{{ \App\Models\Training::where('status', 'active')->count() ?? 0 }}</h3>
                            <p class="mb-1 fs-5 fw-bold">चलीरहेको तालिम</p>
                        </div>
                    </div>
                </div>
                <!-- Chart Section -->
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card shadow-none">
                        <div class="card-header bg-main text-center">
                            <h6 class="mb-0 fw-bold">पुरुष/महिला आवेदन संख्या विवरण</h6>
                        </div>
                        <div class="card-body border">
                            <div style="height: 400px;">
                                <canvas id="genderChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map Section -->
                <div class="col-lg-6 col-md-12 col-sm-12">
                    @include('welcome.partials.ward-map')
                </div>
            </div>
        </section>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('genderChart').getContext('2d');

                // Data from Laravel
                const maleCount = {{ $countData['male_count'] }};
                const femaleCount = {{ $countData['female_count'] }};
                const total = maleCount + femaleCount;

                const malePercentage = total > 0 ? Math.round((maleCount / total) * 100) : 0;
                const femalePercentage = total > 0 ? Math.round((femaleCount / total) * 100) : 0;

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['पुरुष', 'महिला'],
                        datasets: [{
                            label: 'Gender Distribution',
                            data: [maleCount, femaleCount],
                            backgroundColor: [
                                'rgba(54, 162, 235)',
                                'rgba(255, 99, 132)'
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const value = context.raw || 0;
                                        const percentage = total > 0 ? Math.round((value / total) * 100) :
                                        0;
                                        return `${context.label}: ${value} (${percentage}%)`;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    precision: 0
                                }
                            }
                        }
                    }
                });

                // Create legend
                const legendContainer = document.createElement('div');
                legendContainer.style.display = 'flex';
                legendContainer.style.justifyContent = 'center';
                legendContainer.style.marginTop = '20px';

                const maleLegend = document.createElement('div');
                maleLegend.style.display = 'flex';
                maleLegend.style.alignItems = 'center';
                maleLegend.style.marginRight = '20px';
                maleLegend.innerHTML = `
                <div style="width:15px; height:15px; background-color:rgba(54, 162, 235); margin-right:5px;"></div>
                <span>पुरुष: ${maleCount} (${malePercentage}%)</span>
            `;

                const femaleLegend = document.createElement('div');
                femaleLegend.style.display = 'flex';
                femaleLegend.style.alignItems = 'center';
                femaleLegend.innerHTML = `
                <div style="width:15px; height:15px; background-color:rgba(255, 99, 132); margin-right:5px;"></div>
                <span>महिला: ${femaleCount} (${femalePercentage}%)</span>
            `;

                legendContainer.appendChild(maleLegend);
                legendContainer.appendChild(femaleLegend);

                document.querySelector('.card-body').appendChild(legendContainer);
            });
        </script>
        <script>
            window.wardGenderData = {};
            @foreach ($wards as $ward)
                window.wardGenderData["{{ $ward->id }}"] = {
                    male_count: {{ $ward->male_count }},
                    female_count: {{ $ward->female_count }},
                    total_count: {{ $ward->total_count }}
                };
            @endforeach
        </script>
        <script src="{{ asset('dist/map/map.js') }}"></script>
        <script>
            initiateMap('{{ asset('dist/map/sunwal-wards.geojson') }}')
        </script>
@endsection
