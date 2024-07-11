@extends('admin.dashboard.layouts.master') @section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-7.5">
            @include('admin.ui_element.pagination.pagination_style1')
            @include('admin.ui_element.pagination.pagination_style2')
            @include('admin.ui_element.pagination.pagination_style3')
        </div>
    </div>
@endsection
