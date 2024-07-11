@extends('admin.dashboard.layouts.master') @section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">

        <div class="flex flex-col gap-7.5">
            @include('admin.ui_element.button_group.button_group')

            @include('admin.ui_element.button_group.button_with_icon')
        </div>
    </div>
@endsection
