@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- ===== Data Stats Start ===== -->
        @include('admin.dashboard.marketing.data_stats')
        <!-- ===== Data Stats End ===== -->

        <div class="mt-7.5 grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7.5">
            <!-- ====== Table One Start -->
            @include('admin.dashboard.marketing.top_channel')
            <!-- ====== Table One End -->

            <!-- ====== Table One Start -->
            @include('admin.dashboard.marketing.campaign_visitor')
            <!-- ====== Table One End -->


            <!-- ===== External Links Start ===== -->
            @include('admin.dashboard.marketing.external_link')
            <!-- ===== External Links End ===== -->

            <!-- ===== Chart Six Start ===== -->
            @include('admin.dashboard.marketing.campaigns_visitors')
            <!-- ===== Chart Six End ===== -->

            <!-- ===== Featured Campaigns Start ===== -->
            @include('admin.dashboard.marketing.featured_campaign')
            <!-- ===== Featured Campaigns End ===== -->

            <!-- ===== Feedback Start ===== -->
            @include('admin.dashboard.marketing.feedback')
            <!-- ===== Feedback End ===== -->
        </div>
    </div>
@endsection
