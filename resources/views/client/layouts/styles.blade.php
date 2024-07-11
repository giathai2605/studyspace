<link rel="stylesheet" href="{{ asset('css/icons.css') }}" />
<link rel="stylesheet" href="{{ asset('css/uikit.css') }}" />
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/app.css') }}" />
<link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />

<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{ asset('css/client/plugins/fontawesome/css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/client/plugins/fontawesome/css/all.min.css')}}">

<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="{{ asset('css/client/owl.carousel.min.css') }}">
<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

<!-- Slick CSS -->
<link rel="stylesheet" href="assets/plugins/slick/slick.css">
<link rel="stylesheet" href="assets/plugins/slick/slick-theme.css">

<!-- Select2 CSS -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

<!-- Aos CSS -->
<link rel="stylesheet" href="assets/plugins/aos/aos.css">

<!-- Main CSS -->
<link rel="stylesheet" href="assets/css/style.css">

<style>
    aside .sidebar1 {
        display: flex;
        flex-direction: column;
        background-color: var(--color-dark);
        box-shadow: var(--box-shadow);
        border-radius: 15px;
        position: relative;
        top: 1.5rem;
        transition: all 0.3s ease;
        color: #000;
        height: 100%;
    }

    aside .sidebar1:hover {
        box-shadow: none;
    }

    aside .sidebar1 a {
        display: flex;
        align-items: center;
        color: var(--color-info-dark);
        height: 3.7rem;
        gap: 1rem;
        position: relative;
        margin-left: 2rem;
        transition: all 0.3s ease;
    }

    aside .sidebar1 a span {
        font-size: 2rem;
        transition: all 0.3s ease;
    }

    aside .sidebar1 a h3 {
        display: none;
    }

    aside .sidebar1 a:last-child {
        bottom: 2rem;
        width: 100%;
        position: absolute;
    }

    aside .sidebar1 a:active {
        width: 100%;
        color: var(--color-danger);
        background-color: var(--color-light);
        margin-left: 0;
    }

    aside .sidebar1 a:active::before {
        content: '';
        width: 6px;
        height: 18px;
        background-color: var(--color-danger);
        align-items: center;
    }

    aside .sidebar1 a:active span {
        background-color: var(--color-light);
        margin-left: calc(1rem - 3px);
    }

    aside .sidebar1 a:hover {
        color: rgb(225, 66, 66);
    }

    aside .sidebar1 a:hover span {
        margin-left: 0.6rem;
    }

    .w-full {
        width: 100%;
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        user-select: none;
        border: 1px solid transparent;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: all 0.3s ease;
    }

    .btn-primary {
        color: #fff;
        background-color: #005CAA;
        border-color: #005CAA;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #005CAA;
        border-color: #005CAA;
    }

    .rounded-md {
        border-radius: 0.375rem;
    }
</style>
