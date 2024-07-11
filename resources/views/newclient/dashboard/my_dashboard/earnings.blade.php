<div class="row">
    <div class="col-md-12">
        <div class="card instructor-card">
            <div class="card-header">
                <h4>Quá trình học</h4>
            </div>
            <div class="card-body">
                <canvas id="donePercentChart" class="bg-white rounded-md shadow-1 mt-5 dark:text-white dark:border-strokedark dark:bg-boxdark" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById('donePercentChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            @foreach ($donePercent as $item)
                '{{ $item->CourseName }}',
            @endforeach
        ],
        datasets: [{
            label: 'Tỉ lệ hoàn thành khóa học',
            data: [
                @foreach ($donePercent as $item)
                    '{{ $item->DonePercent }}',
                @endforeach
            ],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 99, 132, 0.2)'
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
        scales: {
            y: {
                beginAtZero: true,
                max: 100, // Đặt giới hạn tối đa là 100%
                ticks: {
                    callback: function(value, index, values) {
                        return value + '%'; // Thêm ký tự '%' sau mỗi giá trị
                    }
                }
            }
        }
    }
});

</script>
