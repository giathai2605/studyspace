@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="mx-auto max-w-5xl">

            <!-- Task Header Start -->
            @include('admin.task.list.tasks')
            <!-- Task Header End -->
            <div class="mt-9 grid grid-cols-1 gap-7.5 sm:grid-cols-2 xl:grid-cols-3">

                <!-- Todo list -->
                @include('admin.task.list.to_do')
                <!-- Todo list -->

                <!-- Progress list -->
                @include('admin.task.list.in_progress')
                <!-- Progress list -->

                <!-- Completed list -->
                @include('admin.task.list.in_progress')
                <!-- Completed list -->

            </div>
        </div>
    </div>
@endsection
