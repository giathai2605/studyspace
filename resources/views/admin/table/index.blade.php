@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-10">
            <!-- ====== Table One Start -->
            @include('admin.table.top_channel')
            <!-- ====== Table One End -->

            <!-- ====== Table Two Start -->
            @include('admin.table.top_product')
            <!-- ====== Table Two End -->

            <!-- ====== Table Three Start -->
            @include('admin.table.package')
            <!-- ====== Table Three End -->

        </div>
    </div>
@endsection
