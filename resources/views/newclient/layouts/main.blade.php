<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Study Space</title>
    @include('newclient.layouts.styles')

</head>
{{--<!--Start of Tawk.to Script-->--}}
{{--<script type="text/javascript">--}}
{{--    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();--}}
{{--    (function(){--}}
{{--        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];--}}
{{--        s1.async=true;--}}
{{--        s1.src='https://embed.tawk.to/65767a9207843602b8005808/1hhbctjha';--}}
{{--        s1.charset='UTF-8';--}}
{{--        s1.setAttribute('crossorigin','*');--}}
{{--        s0.parentNode.insertBefore(s1,s0);--}}
{{--    })();--}}
{{--</script>--}}
{{--<!--End of Tawk.to Script-->--}}
<body data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">
<script src="https://chat-plugin.pancake.vn/main/auto?page_id=web_StudySpaceCode&locale=vi"></script>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        {{-- ---------------- Header  ------------------- --}}
        @include('newclient.layouts.header')
        <!-- ----------------------  Main Contents -------------------->
        @yield('content')
        {{-- ---------------- Footer  ------------------- --}}
        @include('newclient.layouts.footer')
    </div>
{{--    @include('newclient.layouts.message')--}}
    {{-- ------------------- JS ------------------- --}}
    @include('newclient.layouts.scripts')
    @yield('script')
</body>

</html>
