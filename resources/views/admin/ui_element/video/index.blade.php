@extends('admin.dashboard.layouts.master') @section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-7.5">
            @include('admin.ui_element.video.video1')
            @include('admin.ui_element.video.video2')
            @include('admin.ui_element.video.video3')
            @include('admin.ui_element.video.video4')
        </div>
    </div>
@endsection
