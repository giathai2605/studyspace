@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="grid grid-cols-1 gap-9 sm:grid-cols-2">
            <div class="flex flex-col gap-9">
                <!-- Contact Form -->
                @include('admin.forms.form_layout.contact_form')
            </div>
            <div class="flex flex-col gap-9">
                <!-- Sign In Form -->
                @include('admin.forms.form_layout.sign_in_form')

                <!-- Sign Up Form -->
                @include('admin.forms.form_layout.sign_up_form')

            </div>
        </div>
    </div>
@endsection
