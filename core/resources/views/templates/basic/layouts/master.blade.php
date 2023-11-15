<!doctype html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ $general->siteName(__($pageTitle)) }}</title>

    <link rel="shortcut icon" type="image/png" href="{{getImage(getFilePath('logoIcon') .'/favicon.png')}}" alt="{{ __($general->site_name) }}">
   <!-- bootstrap 5  -->
   <link rel="stylesheet" href="{{ asset('assets/global/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/global/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/global/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue.'css/custom.css') }}">
   <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/slick.css') }}">
   <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/main.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/color.php') }}?color={{ $general->base_color }}">

</head>
</head>

<body>

    @include($activeTemplate . 'partials.preloader')

    <!--Main Content Section-->
    @yield('content')
    <!--End Main Content Section-->

    @include('partials.notify')

    @include('partials.plugins')


    <script src="{{asset('assets/global/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/slick.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/wow.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/main.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/bootstrap-fileinput.js') }}"></script>

    @stack('script-lib')

    @stack('script')

    <script>
        (function($) {
            "use strict";
            $('form').on('submit', function() {
                if ($(this).valid()) {
                    $(':submit', this).attr('disabled', 'disabled');
                }
            });
        })(jQuery);
    </script>
</body>

</html>
