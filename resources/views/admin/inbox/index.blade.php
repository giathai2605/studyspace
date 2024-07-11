@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="h-[calc(100vh-186px)] overflow-hidden sm:h-[calc(100vh-174px)]">
            <div x-data="{ inboxSidebarToggle: false }"
                 class="h-full rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark lg:flex">
                <!-- Compose Start -->
                @include('admin.inbox.compose')
                <!-- Compose End -->

                <!-- Table Start -->
                @include('admin.inbox.table')
                <!-- Table End -->

            </div>


        </div>
    </div>
    </div>
@endsection
