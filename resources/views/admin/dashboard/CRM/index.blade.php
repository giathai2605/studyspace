@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- ===== Data Stats Start ===== -->
        @include('admin.dashboard.CRM.data_stats')
        <!-- ===== Data Stats End ===== -->

        <div class="mt-7.5 grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7.5">
            <!-- ===== Chart Seven Start ===== -->
            @include('admin.dashboard.CRM.payments_overview')
            <!-- ===== Chart Seven End ===== -->

            <!-- ===== Chart Seven Start ===== -->
            @include('admin.dashboard.CRM.user_device')
            <!-- ===== Chart Seven End ===== -->

            <!-- ===== Leads Report Start ===== -->
            @include('admin.dashboard.CRM.lead_report')
            <!-- ===== Leads Report End ===== -->

            <!-- ===== Leads Report Start ===== -->
            @include('admin.dashboard.CRM.campaign')
            <!-- ===== Leads Report end ===== -->

            <!-- ===== To Do List Start ===== -->
            @include('admin.dashboard.CRM.to_do_list')
            <!-- ===== To Do List End ===== -->
        </div>


    </div>
@endsection
