@extends('newclient.layouts_late.main')
@section('content')
{{--  @include('newclient.student.layouts.header')--}}
 <!-- Page Wrapper -->
 <div class="page-content instructor-page-content">
    <div class="container">
        <div class="row">
                @yield('content_student')
        </div>
    </div>
</div>
<!-- Page Wrapper -->
@endsection
