<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v2b4487d741ca48dcbadcaf954e159fc61680799950996"
        integrity="sha512-D/jdE0CypeVxFadTejKGTzmwyV10c1pxZk/AqjJuZbaJwGMyNHY3q/mTPWqMUnFACfCTunhZUVcd4cV78dK1pQ=="
        data-cf-beacon='{"rayId":"7b6d37836e8007a7","version":"2023.3.0","r":1,"b":1,"token":"67f7a278e3374824ae6dd92295d38f77","si":100}'
        crossorigin="anonymous">
</script>

<script src="https://www.google.com/recaptcha/api.js?render=6LeBGhEpAAAAAMsIqkTVwYDs-7tD--PaRcFDq-aq"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('js/new_client/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('js/new_client/ckeditor.js')}}"></script>
<script src="{{ asset('js/new_client/jquery.counterup.min.js')}}"></script>
<script src="{{ asset('js/new_client/jquery.waypoints.js')}}"></script>
<script src="{{ asset('js/new_client/owl.carousel.min.js')}}"></script>
<script src="{{ asset('js/new_client/script.js')}}"></script>
<script src="{{ asset('js/new_client/validation.js')}}"></script>
<script src="{{ asset('js/aiz-core.js')}}"></script>

<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>

<!-- Select2 JS -->
<script src="{{ asset('css/client/plugins/select2/js/select2.min.js') }}"></script>

<!-- Slick Slider -->
<script src="{{ asset('css/client/plugins/slick/slick.js') }}"></script>

<!-- Aos -->
<script src="{{ asset('css/client/plugins/aos/aos.js') }}"></script>
<!-- Messenger Plugin chat Code -->

<!-- Messenger Plugin chat Code -->

<script src="{{ asset('js/client/main.js')}}"></script>
<script src="{{ asset('js/client/rating.js')}}"></script>
<script src="{{ asset('js/new_client/main.js')}}"></script>
<!-- Aos -->

<script>
    const url = JSON.parse('@json(url('/'))');
    const urlClient = JSON.parse('@json(url('/client'))');
    const urlAdmin = JSON.parse('@json(url('/admin'))');
    const urlAsset = JSON.parse('@json(asset(''))');
    localStorage.setItem('urlAsset', urlAsset);
    const userData = @json(auth()->user());
    localStorage.setItem('userData', JSON.stringify(userData));
    const csrf = @json(csrf_token());
</script>
<!-- Sweetalert -->
