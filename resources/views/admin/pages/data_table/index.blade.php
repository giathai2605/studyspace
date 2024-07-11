@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-5 md:gap-7 2xl:gap-10">
            <!-- ====== Data Table One Start -->
            @include('admin.pages.data_table.table1')
            <!-- ====== Data Table One End -->

            <!-- ====== Data Table TWO Start -->
            @include('admin.pages.data_table.table2')
            <!-- ====== Data Table TWO End -->

        </div>


    </div>
@endsection
