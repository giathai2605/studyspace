@extends('newclient.dashboard.layouts.main')
@section('content_dashboard')

    @include('newclient.dashboard.my_dashboard.analytics')
    @include('newclient.dashboard.my_dashboard.earnings')
    {{--  @include('newclient.dashboard.my_dashboard.order')
    @include('newclient.dashboard.my_dashboard.selling_courses')  --}}

@endsection
