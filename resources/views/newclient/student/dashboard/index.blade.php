@extends('newclient.student.layouts.main')
@section('content_student')
    <!-- Profile Details -->
    <div class="col-xl-12 col-md-12">
        @include('newclient.student.dashboard.top_widget')
        @include('newclient.student.dashboard.latest_transactions')
    </div>
@endsection
