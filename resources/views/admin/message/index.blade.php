@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="h-[calc(100vh-186px)] overflow-hidden sm:h-[calc(100vh-174px)]">
            <div
                    class="h-full rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark xl:flex">

                <!-- active_conversation start -->
                @include('admin.message.active_conversation')
                <!-- active_conversation end -->


                <!-- chat start -->
                @include('admin.message.chat')
                <!-- chat end -->


            </div>
        </div>
    </div>
    </div>
@endsection

