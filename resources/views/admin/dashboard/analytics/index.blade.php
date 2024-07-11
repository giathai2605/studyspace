@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- ===== OVERVIEW ===== -->
        @include('admin.dashboard.layouts.overview')

        <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">
            <!-- ===== ANALYTIC ===== -->
            @include('admin.dashboard.layouts.analytic')
        </div>
    </div>
@endsection
