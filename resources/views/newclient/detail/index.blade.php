@extends('newclient.dashboard.layouts.main')
@section('content_dashboard')
    <!-- Breadcrumb -->
    @include('newclient.detail.breadcrumb')
    <!-- Breadcrumb -->

    <!-- Inner Banner -->
    @include('newclient.detail.inner-banner')
    <!-- Inner Banner -->
    <section class="page-content course-sec">
        <div class="container">
            <div class="row">
                @include('newclient.detail.overview')
                @include('newclient.detail.includes')
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        function flashErr() {
            alert('Vui lòng mua khóa học để tiếp tục!');
            AIZ.plugins.notify('warning', 'Vui lòng mua khóa học để tiếp tục!');
        }
    </script>
@endsection
