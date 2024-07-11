@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="mx-auto max-w-5xl">

            <!-- Task Header Start -->
            @include('admin.task.list.tasks')
            <!-- Task Header End -->
            <div class="mt-9 flex flex-col gap-9">

                <!-- Todo list Start-->
                @include('admin.task.list.to_do')
                <!-- Todo list End-->

                <!-- Progress list Start -->
                @include('admin.task.list.in_progress')
                <!-- Progress list End-->

                <!-- completed Start -->
                @include('admin.task.list.completed')
                <!-- completed End-->
            </div>
        </div>
    </div>
@endsection
