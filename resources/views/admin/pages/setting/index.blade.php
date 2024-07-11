@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="mx-auto max-w-270">
            <div class="grid grid-cols-5 gap-8">

                @include('admin.pages.setting.personal_information')

                @include('admin.pages.setting.your_photo')
            </div>
        </div>

    </div>
@endsection
