@extends('newclient.layouts.main')
@section('content')
    @if (session('message'))
        <script>
            swal({
                title: "Thành công!",
                text: "{{ session('message') }}",
                icon: "success",
                button: "OK",
            });
        </script>
    @endif

    @include('newclient.home.banner')
    {{-- @include('newclient.home.top_category') --}}
    @include('newclient.home.master_skill')
    @include('newclient.home.featured_courses')
    @include('newclient.home.leading')
    @include('newclient.home.share_knowledge')
    {{--@include('newclient.home.latest_blog')--}}
@endsection
