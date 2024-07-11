@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7.5">

            @include('admin.dashboard.ecommerce.visitors_analytics')

            <!-- ====== Data Stats Start -->
            @include('admin.dashboard.ecommerce.data_stats')
            <!-- ====== Data Stats End -->

            <!-- ====== Map Two Start -->
            @include('admin.dashboard.ecommerce.sessions_by_country')
            <!-- ====== Map Two End -->
            <div class="col-span-12 xl:col-span-6">
                <!-- ====== Top Content Start -->
                @include('admin.dashboard.ecommerce.top_content')
                <!-- ====== Top Content End -->

                <!-- ====== Top Channels Start -->
                @include('admin.dashboard.ecommerce.top_channel')
                <!-- ====== Top Channels End -->
            </div>
            <!-- ====== Chart Three Start -->
            @include('admin.dashboard.ecommerce.visitor_analytic')
            <!-- ====== Chart Three End -->

            <!-- ====== Table Two Start -->
            @include('admin.dashboard.ecommerce.top_product')
            <!-- ====== Table Two End -->

        </div>
    </div>
@endsection
