<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Study Space</title>
    @include('newclient.layouts_late.styles')

</head>

<body data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        {{-- ---------------- Header  ------------------- --}}
        @include('newclient.layouts_late.header')
        <!-- ----------------------  Main Contents -------------------->
        @yield('content')
        {{-- ---------------- Footer  ------------------- --}}
        @include('newclient.layouts_late.footer')
    </div>
    {{-- ------------------- JS ------------------- --}}
    @include('newclient.layouts_late.scripts')

</body>

</html>
