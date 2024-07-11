@extends('admin.dashboard.layouts.master') @section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="grid grid-cols-1 gap-7.5 sm:grid-cols-2 xl:grid-cols-3">
            @include('admin.ui_element.card.nav1')
        </div>

        <div class="grid grid-cols-1 gap-7.5 sm:grid-cols-2 xl:grid-cols-3">
            @include('admin.ui_element.card.nav2')

        </div>
    </div>
@endsection
