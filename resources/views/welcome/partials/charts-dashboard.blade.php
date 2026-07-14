<!-- Interactive Charts Dashboard -->
<section class="mb-5">
    <div class="container">
        <h2 class="fw-bold mb-4">
            <i class="fas fa-chart-bar text-primary me-2"></i>
            तालिम विश्लेषण
        </h2>

        <div class="row g-4">
            <!-- Gender-wise Applications -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white">
                        <h6 class="mb-0 fw-bold">
                            <i class="fas fa-venus-mars text-primary me-2"></i>
                            लिङ्ग अनुसार आवेदन
                        </h6>
                    </div>
                    <div class="card-body">
                        <canvas id="genderChart" height="250"></canvas>
                    </div>
                </div>
            </div>

            <!-- Ward-wise Applications -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white">
                        <h6 class="mb-0 fw-bold">
                            <i class="fas fa-map-marked-alt text-primary me-2"></i>
                            वार्ड अनुसार आवेदन
                        </h6>
                    </div>
                    <div class="card-body">
                        <canvas id="wardChart" height="250"></canvas>
                    </div>
                </div>
            </div>

            <!-- Category-wise Training -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white">
                        <h6 class="mb-0 fw-bold">
                            <i class="fas fa-tags text-primary me-2"></i>
                            श्रेणी अनुसार तालिम
                        </h6>
                    </div>
                    <div class="card-body">
                        <canvas id="categoryChart" height="250"></canvas>
                    </div>
                </div>
            </div>

            <!-- Monthly Applications -->
            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white">
                        <h6 class="mb-0 fw-bold">
                            <i class="fas fa-calendar-week text-primary me-2"></i>
                            मासिक आवेदन प्रवृत्ति
                        </h6>
                    </div>
                    <div class="card-body">
                        <canvas id="monthlyChart" height="200"></canvas>
                    </div>
                </div>
            </div>

            <!-- Age-wise Participation -->
            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white">
                        <h6 class="mb-0 fw-bold">
                            <i class="fas fa-users text-primary me-2"></i>
                            उमेर समूह अनुसार सहभागी
                        </h6>
                    </div>
                    <div class="card-body">
                        <canvas id="ageChart" height="200"></canvas>
                    </div>
                </div>
            </div>

            <!-- Training Status Overview -->
            <div class="col-12" data-aos="fade-up" data-aos-delay="600">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h6 class="mb-0 fw-bold">
                            <i class="fas fa-tasks text-primary me-2"></i>
                            तालिम स्थिति विवरण
                        </h6>
                    </div>
                    <div class="card-body">
                        <canvas id="statusChart" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gender-wise Applications Chart
    const genderCtx = document.getElementById('genderChart').getContext('2d');
    new Chart(genderCtx, {
        type: 'doughnut',
        data: {
            labels: ['पुरुष', 'महिला', 'अन्य'],
            datasets: [{
                data: [
                    {{ $countData['male_count'] ?? 0 }},
                    {{ $countData['female_count'] ?? 0 }},
                    {{ $countData['other_count'] ?? 0 }}
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(153, 102, 255, 0.8)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Ward-wise Applications Chart
    const wardCtx = document.getElementById('wardChart').getContext('2d');
    const wardLabels = {{ json_encode($wards->pluck('id')->toArray()) ?? [] }};
    const wardData = {{ json_encode($wards->pluck('total_count')->toArray()) ?? [] }};
    
    new Chart(wardCtx, {
        type: 'bar',
        data: {
            labels: wardLabels.map(w => 'वार्ड ' + w),
            datasets: [{
                label: 'आवेदन संख्या',
                data: wardData,
                backgroundColor: 'rgba(102, 126, 234, 0.8)',
                borderColor: 'rgba(102, 126, 234, 1)',
                borderWidth: 2,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Category-wise Training Chart
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    const categoryData = {{ json_encode($categoryData ?? []) }};
    
    new Chart(categoryCtx, {
        type: 'pie',
        data: {
            labels: categoryData.map(c => c.category_name ?? 'अन्य'),
            datasets: [{
                data: categoryData.map(c => c.count ?? 0),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(153, 102, 255, 0.8)',
                    'rgba(255, 159, 64, 0.8)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 12
                    }
                }
            }
        }
    });

    // Monthly Applications Chart
    const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
    const monthlyData = {{ json_encode($monthlyData ?? []) }};
    
    new Chart(monthlyCtx, {
        type: 'line',
        data: {
            labels: monthlyData.map(m => m.month ?? ''),
            datasets: [{
                label: 'आवेदन संख्या',
                data: monthlyData.map(m => m.count ?? 0),
                borderColor: 'rgba(102, 126, 234, 1)',
                backgroundColor: 'rgba(102, 126, 234, 0.1)',
                fill: true,
                tension: 0.4,
                borderWidth: 3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Age-wise Participation Chart
    const ageCtx = document.getElementById('ageChart').getContext('2d');
    const ageData = {{ json_encode($ageData ?? []) }};
    
    new Chart(ageCtx, {
        type: 'radar',
        data: {
            labels: ageData.map(a => a.age_group ?? ''),
            datasets: [{
                label: 'सहभागी संख्या',
                data: ageData.map(a => a.count ?? 0),
                backgroundColor: 'rgba(102, 126, 234, 0.2)',
                borderColor: 'rgba(102, 126, 234, 1)',
                borderWidth: 2,
                pointBackgroundColor: 'rgba(102, 126, 234, 1)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                r: {
                    beginAtZero: true
                }
            }
        }
    });

    // Training Status Overview Chart
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    
    new Chart(statusCtx, {
        type: 'bar',
        data: {
            labels: ['खुला', 'आगामी', 'चलिरहेको', 'सम्पन्न', 'बन्द'],
            datasets: [{
                label: 'तालिम संख्या',
                data: [
                    {{ \App\Models\Training::where('status', 'open')->count() ?? 0 }},
                    {{ \App\Models\Training::where('status', 'upcoming')->count() ?? 0 }},
                    {{ \App\Models\Training::where('status', 'active')->count() ?? 0 }},
                    {{ \App\Models\Training::where('status', 'completed')->count() ?? 0 }},
                    {{ \App\Models\Training::where('status', 'dismissed')->count() ?? 0 }}
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(102, 126, 234, 0.8)',
                    'rgba(255, 99, 132, 0.8)'
                ],
                borderWidth: 2,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
