<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.tailadmin.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Apr 2023 17:33:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8"/><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Study Space | Manager</title>
    <link rel="icon" href="favicon.ico">
    <link href="" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    @include('admin.dashboard.layouts.styles')

</head>

<body
    x-data="{ page: 'analytics', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">
<div x-show="loaded"
     x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 200) })"
     class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black">
    <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-primary border-t-transparent">
    </div>
</div>
<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
    <!-- ===== Sidebar Start ===== -->
    @include('admin.dashboard.layouts.sidebar')
    <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden ">

        <!-- ===== Header Start ===== -->
        @include('admin.dashboard.layouts.header')
        <main>
            @yield('content')

        </main>

    </div>

</div>

@include('admin.dashboard.layouts.scripts')
<script>
    function update_user_status(el) {
        let userStatusID = el.checked ? 1 : 0;

        $.post('{{ route('users.status') }}', {
            _token: '{{ csrf_token() }}',
            id: el.value,
            userStatusID: userStatusID
        }, function (data) {
            if (data) {
                Swal.fire({
                    title: "Thành công!",
                    text: "Cập nhật trạng thái thành công!",
                    icon: "success",
                    button: "OK",
                });
            } else {
                Swal.fire({
                    title: "Thất bại!",
                    text: "Có lỗi xảy ra!",
                    icon: "error",
                    button: "OK",
                });
            }
        });
    }

    function update_course_status(el) {
        let CourseStatus = el.checked ? 1 : 0;

        $.post('{{ route('courses.status') }}', {
            _token: '{{ csrf_token() }}',
            id: el.value,
            CourseStatus: CourseStatus
        }, function (data) {
            if (data) {
                Swal.fire({
                    title: "Thành công!",
                    text: "Cập nhật trạng thái thành công!",
                    icon: "success",
                    button: "OK",
                });
            } else {
                Swal.fire({
                    title: "Thất bại!",
                    text: "Có lỗi xảy ra!",
                    icon: "error",
                    button: "OK",
                });
            }
        });
    }

    function update_status(el) {
        let status = el.checked ? 1 : 0;
        let typeUpdate = el.getAttribute('data-type');
        let url = el.getAttribute('data-asset');
        let urlUpdate = typeUpdate === 'documents' ? '{{ route('documents.approved') }}' : '{{ route('certificates.approved') }}';
        $.post(urlUpdate, {
            _token: '{{ csrf_token() }}',
            id: el.value,
            status: status
        }, function (data) {
            if (data) {
                Swal.fire({
                    title: "Thành công!",
                    text: "Cập nhật trạng thái thành công!",
                    icon: "success",
                    button: "OK",
                });
            } else {
                Swal.fire({
                    title: "Thất bại!",
                    text: "Có lỗi xảy ra!",
                    icon: "error",
                    button: "OK",
                });
            }
        });
    }

    function update_featured(el) {
        let is_featured = el.checked ? 1 : 0;

        $.post('{{ route('documents.featured') }}', {
            _token: '{{ csrf_token() }}',
            id: el.value,
            is_featured: is_featured
        }, function (data) {
            if (data) {
                Swal.fire({
                    title: "Thành công!",
                    text: "Cập nhật trạng thái thành công!",
                    icon: "success",
                    button: "OK",
                });
            } else {
                Swal.fire({
                    title: "Thất bại!",
                    text: "Có lỗi xảy ra!",
                    icon: "error",
                    button: "OK",
                });
            }
        });
    }
</script>
</body>
