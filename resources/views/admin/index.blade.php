@extends('admin.dashboard.layouts.master')
@section('content')

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5 p-5">
        <!-- Card Item Start -->
        <div
            class="rounded-md border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>
                </svg>

            </div>

            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h4 class="text-title-md font-bold text-black dark:text-white">
                        {{ $rating_count }}
                    </h4>
                    <span class="text-sm font-medium">Đánh giá</span>
                </div>

                <span class="flex items-center gap-1 text-sm font-medium text-meta-3">
                {{ $new_rating_count }}
                Đánh giá mới
            </span>
            </div>
        </div>
        <!-- Card Item End -->

        <!-- Card Item Start -->
        <div
            class="rounded-md border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"/>
                </svg>
            </div>

            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h4 class="text-title-md font-bold text-black dark:text-white white-space:nowrap">
                        {{ number_format($total_amount, 0, ',', '.') }} <span class="text-base font-normal">VND</span>
                    </h4>
                    <span class="text-sm font-medium">Doanh thu</span>
                </div>


            </div>
        </div>
        <!-- Card Item End -->

        <!-- Card Item Start -->
        <div
            class="rounded-md border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                </svg>

            </div>

            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h4 class="text-title-md font-bold text-black dark:text-white">
                        {{ $courses_count }}
                    </h4>
                    <span class="text-sm font-medium">Tổng số khóa học</span>
                </div>

                <span class="flex items-center gap-1 text-sm font-medium text-meta-3">
               {{ $new_courses_count }}
                    khóa học mới
            </span>
            </div>
        </div>
        <!-- Card Item End -->

        <!-- Card Item Start -->
        <div
            class="rounded-md border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                </svg>

            </div>

            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h4 class="text-title-md font-bold text-black dark:text-white">
                        {{ $users_count }}
                    </h4>
                    <span class="text-sm font-medium">Tổng số người dùng</span>
                </div>

                <span class="flex items-center gap-1 text-sm font-medium text-meta-5">
               {{$new_users_count  }}
               người dùng mới
            </span>
            </div>
        </div>
        <!-- Card Item End -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
    <div style="width:100%; margin:auto;">
        <form style="margin-left:80px;" method="post" action="{{ route('admin.index') }}" class="form-horizontal">  
            @csrf
            <input type="date" name="revenueDay" class=" bg-white rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" >
            <button type="submit" class="px-6 py-3 text-white bg-primary rounded-md hover:bg-opacity-90 transition">
                Lọc
            </button>
        </form>
        <canvas id="dayRevenueChart"
                class="bg-white rounded-md shadow-1 dark:text-white dark:border-strokedark dark:bg-boxdark"
                style="width:90%;height:400px;margin:20px auto;padding:20px;"></canvas>
    </div>

   
    <div style="width:100%; margin:auto;">
        <form style="margin-left:80px;" method="post" action="{{ route('admin.index') }}" class="form-horizontal">  
        @csrf
        <input type="month" name="startMonth" class=" bg-white rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" >
        <input type="month" name="endMonth" class=" bg-white rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
        <button type="submit" class="px-6 py-3 text-white bg-primary rounded-md hover:bg-opacity-90 transition">
            Lọc
        </button>
    </form>
        <canvas id="revenueChart"
                class="bg-white rounded-md shadow-1 dark:text-white dark:border-strokedark dark:bg-boxdark"
                style="width:90%;height:400px;margin:20px auto;padding:20px;"></canvas>
    </div>
 
    <script>
        var revenueData = [
            {month: 'Tháng 1', monthly_revenue: +'{{ $monthlyStatisticsTotal[1]['total'] }}'},
            {month: 'Tháng 2', monthly_revenue: +'{{ $monthlyStatisticsTotal[2]['total'] }}'},
            {month: 'Tháng 3', monthly_revenue: +'{{ $monthlyStatisticsTotal[3]['total'] }}'},
            {month: 'Tháng 4', monthly_revenue: +'{{ $monthlyStatisticsTotal[4]['total'] }}'},
            {month: 'Tháng 5', monthly_revenue: +'{{ $monthlyStatisticsTotal[5]['total'] }}'},
            {month: 'Tháng 6', monthly_revenue: +'{{ $monthlyStatisticsTotal[6]['total'] }}'},
            {month: 'Tháng 7', monthly_revenue: +'{{ $monthlyStatisticsTotal[7]['total'] }}'},
            {month: 'Tháng 8', monthly_revenue: +'{{ $monthlyStatisticsTotal[8]['total'] }}'},
            {month: 'Tháng 9', monthly_revenue: +'{{ $monthlyStatisticsTotal[9]['total'] }}'},
            {month: 'Tháng 10', monthly_revenue: +'{{ $monthlyStatisticsTotal[10]['total'] }}'},
            {month: 'Tháng 11', monthly_revenue: +'{{ $monthlyStatisticsTotal[11]['total'] }}'},
            {month: 'Tháng 12', monthly_revenue: +'{{ $monthlyStatisticsTotal[12]['total'] }}'},
        ];

        var ctx = document.getElementById('revenueChart').getContext('2d');
        var months = revenueData.map(item => item.month);
        var monthlyRevenue = revenueData.map(item => item.monthly_revenue);

        var revenueChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Doanh thu hàng tháng',
                    data: monthlyRevenue,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var dayRevenueChart = document.getElementById('dayRevenueChart').getContext('2d');
        var chartData = {
            labels: [ '{{ $todayRevenue[0]['date'] }}',],
            datasets: [{
                'label': 'Doanh thu theo ngày',
                'data': [{{ $todayRevenue[0]['total'] }}],
                'backgroundColor': [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                ],
                'borderColor': [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)'
                ],
                'borderWidth': 1
            }]
        };
        var dayRevenueChart = new Chart(dayRevenueChart, {
            type: 'bar',
            data: chartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>

@endsection
