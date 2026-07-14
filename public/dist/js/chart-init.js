document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('trainingChart').getContext('2d');

    const trainingChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['पूरा गरिएको प्रशिक्षण', 'बाँकी प्रशिक्षण'],
            datasets: [{
                data: [65, 35],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 99, 132, 0.8)'
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
            cutout: '65%',
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.parsed}%`;
                        }
                    }
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });

    Chart.register({
        id: 'centerTextPlugin',
        beforeDraw: function(chart) {
            const width = chart.width;
            const height = chart.height;
            const ctx = chart.ctx;

            ctx.restore();
            const fontSize = (height / 114).toFixed(2);
            ctx.font = fontSize + 'em sans-serif';
            ctx.textBaseline = 'middle';

            const text = '65%';
            const textX = Math.round((width - ctx.measureText(text).width) / 2);
            const textY = height / 2;

            ctx.fillText(text, textX, textY);
            ctx.save();
        }
    });

    trainingChart.update();
});