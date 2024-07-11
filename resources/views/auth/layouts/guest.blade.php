<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.tailadmin.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Apr 2023 17:33:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Study Space</title>
    <link rel="icon" href="favicon.ico">
    <link href="" rel="stylesheet">

    @include('admin.dashboard.layouts.styles')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body x-data="{ page: 'analytics', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">
<div x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 200) })"
     class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black">
    <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-primary border-t-transparent">
    </div>
</div>
<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
    <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">

        <main>
            @yield('content')
        </main>

    </div>

</div>

@include('admin.dashboard.layouts.scripts')

</body>
