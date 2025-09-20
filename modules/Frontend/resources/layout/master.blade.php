<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>{{ config('app.name', 'RealEstate') }}</title>
    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="{{ asset('logos/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset('frontend/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-5-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/search-form.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/aos2.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/lightcase.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/maps.css') }}">
    <link rel="stylesheet" id="color" href="{{ asset('frontend/css/colors/pink.css') }}">
</head>

<body class="{{ $class ?? '' }}">
    <!-- Wrapper -->
    <div id="wrapper">

        @include('frontend::includes.header')
        @yield('content')

        @include('frontend::includes.footer')
        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        @include('frontend::includes.preloader')

        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->

        <!-- ARCHIVES JS -->
        <script src="{{ asset('frontend/js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('frontend/js/rangeSlider.js') }}"></script>
        <script src="{{ asset('frontend/js/tether.min.js') }}"></script>
        <script src="{{ asset('frontend/js/moment.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/js/mmenu.min.js') }}"></script>
        <script src="{{ asset('frontend/js/mmenu.js') }}"></script>
        <script src="{{ asset('frontend/js/aos.js') }}"></script>
        <script src="{{ asset('frontend/js/aos2.js') }}"></script>
        <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
        <script src="{{ asset('frontend/js/fitvids.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/js/smooth-scroll.min.js') }}"></script>
        <script src="{{ asset('frontend/js/lightcase.js') }}"></script>
        <script src="{{ asset('frontend/js/search.js') }}"></script>
        <script src="{{ asset('frontend/js/owl.carousel.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('frontend/js/ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('frontend/js/newsletter.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('frontend/js/searched.js') }}"></script>
        <script src="{{ asset('frontend/js/forms-2.js') }}"></script>
        <script src="{{ asset('frontend/js/range.js') }}"></script>
        <script src="{{ asset('frontend/js/color-switcher.js') }}"></script>

        @if (!isset($lancer))
            <script>
                $('.slick-lancers').slick({
                    infinite: false,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    dots: true,
                    arrows: false,
                    adaptiveHeight: true,
                    responsive: [{
                        breakpoint: 1292,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            dots: true,
                            arrows: false
                        }
                    }, {
                        breakpoint: 993,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true,
                            arrows: false
                        }
                    }, {
                        breakpoint: 769,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true,
                            arrows: false
                        }
                    }]
                });
            </script>
        @endif

        <script>
            $(".dropdown-filter").on('click', function() {

                $(".explore__form-checkbox-list").toggleClass("filter-block");

            });
        </script>

        <!-- Slider Revolution scripts -->
        <script src="{{ asset('frontend/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('frontend/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

        <!-- MAIN JS -->
        <script src="{{ asset('frontend/js/script.js') }}"></script>

        @stack('scripts')
    </div>
    <!-- Wrapper / End -->

</body>

</html>
