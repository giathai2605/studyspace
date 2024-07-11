<!DOCTYPE html>
<html lang="en">

<head>
    <title>StudySpace</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="StudySpace"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.svg')}}">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    @include('client.layouts.styles')
</head>

<body>
<div id="wrapper" class="is-verticle">
    <!-------------------------  Header ------------------------- -->
{{--    @include('client.layouts.header')--}}
    <!-- ----------------------  Main Contents -------------------->
    @yield('content')
    <!-------------------------  Sidebar ------------------------- -->
    @include('client.layouts.sidebar')
    <!-------------------------  Footer ------------------------- -->
{{--    @include('client.layouts.footer')--}}
</div>
<!-------------------------  Js ------------------------- -->
@include('client.layouts.scripts')
</body>

</html>
