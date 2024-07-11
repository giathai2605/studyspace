@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- File Details List Start -->
        @include('admin.pages.file_manager.file_detail')
        <!-- File Details List End -->

        <div class="mt-7.5 grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7.5">
            <!-- ===== Chart Ten Start ===== -->
            @include('admin.pages.file_manager.activity_chart')
            <!-- ===== Chart Ten End ===== -->

            <div class="col-span-12 xl:col-span-4">
                <div class="flex flex-col gap-4 sm:flex-row md:gap-6 xl:flex-col xl:gap-7.5">
                    @include('admin.pages.file_manager.available_storage')
                    @include('admin.pages.file_manager.media_document')
                </div>
            </div>

            <!-- Download List Start -->
            @include('admin.pages.file_manager.dowload_list_start')
            <!-- Download List End -->

        </div>


    </div>
@endsection
