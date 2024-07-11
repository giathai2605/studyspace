@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="grid grid-cols-1 gap-9 sm:grid-cols-2">
            <div class="flex flex-col gap-9">

                <!-- input_field -->
                @include('admin.forms.form_elementor.input_field')
                <!-- input_field -->

                <!-- Toggle switch input -->
                @include('admin.forms.form_elementor.toggle_switch_input')

                <!-- Time and date -->
                @include('admin.forms.form_elementor.time_and _date')

                <!-- File upload -->
                @include('admin.forms.form_elementor.file_upload')
            </div>
            <div class="flex flex-col gap-9">
                <!-- Textarea Fields -->
                @include('admin.forms.form_elementor.input_field')

                <!-- Checkbox and radio -->
                @include('admin.forms.form_elementor.checkbox_radio')

                <!-- Select input -->
                @include('admin.forms.form_elementor.select_input')

            </div>
        </div>
    </div>
@endsection
