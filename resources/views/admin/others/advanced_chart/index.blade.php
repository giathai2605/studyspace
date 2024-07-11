@extends('admin.dashboard.layouts.master') @section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7.5">

            <!-- ====== Chart Four Start -->
            @include('admin.others.advanced_chart.visitor_analytic')
            <!-- ====== Chart Four End -->

            <!-- ====== Chart Seven Start -->
            @include('admin.others.advanced_chart.payment_overview')
            <!-- ====== Chart Seven End -->

            <!-- ====== Chart six Start -->
            @include('admin.others.advanced_chart.campaign_visitor')
            <!-- ====== Chart six End -->

            <!-- ====== Chart eight Start -->
            @include('admin.others.advanced_chart.used_devices')
            <!-- ====== Chart eight End -->

            <!-- ====== Chart nine Start -->
            @include('admin.others.advanced_chart.campaign')
            <!-- ====== Chart nine End -->

        </div>
    </div>
@endsection
