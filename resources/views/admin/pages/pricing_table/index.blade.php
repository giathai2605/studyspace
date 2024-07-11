@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-5 md:gap-7 2xl:gap-10">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-3 2xl:gap-7.5">

                <!-- Pricing Item Start-->
                @include('admin.pages.pricing_table.starter')
                <!-- Pricing Item End-->

                <!-- Pricing Item Start-->
                @include('admin.pages.pricing_table.basic')
                <!-- Pricing Item End-->

                <!-- Pricing Item Start-->
                @include('admin.pages.pricing_table.premium')
                <!-- Pricing Item End-->
            </div>

            <!-- pricing_table_two-->
            @include('admin.pages.pricing_table.pricing_table_two')
            <!-- pricing_table_two-->

        </div>


    </div>
@endsection
