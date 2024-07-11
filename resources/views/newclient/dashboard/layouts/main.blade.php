@extends('newclient.layouts_late.main')
@section('content')
 <!-- Page Wrapper -->
 <div class="page-content instructor-page-content">
    <div class="container">
        <div class="row">
            {{-- ---------------- Sidebar  ------------------- --}}
            @include('newclient.dashboard.layouts.sidebar')
            {{-- ---------------- Sidebar  ------------------- --}}

            <!-- ----------------------  Main Contents -------------------->
            <div class="col-xl-9 col-lg-8 col-md-12">
                @yield('content_dashboard')
            </div>
            <!-- ----------------------  Main Contents -------------------->
        </div>
    </div>
</div>
<!-- Page Wrapper -->
@endsection
