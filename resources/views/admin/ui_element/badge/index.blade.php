@extends('admin.dashboard.layouts.master') @section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-7.5">
            @include('admin.ui_element.badge.badge_style1')
            @include('admin.ui_element.badge.badge_style2')
            @include('admin.ui_element.badge.badge_style3')
            @include('admin.ui_element.badge.badge_style4')
        </div>
    </div>
@endsection
