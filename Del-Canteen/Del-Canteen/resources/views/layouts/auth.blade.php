
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7 ltie8 ltie9" lang="en-US"><![endif]-->
<!--[if IE 8]><html class="ie ie8 ltie9" lang="en-US"><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US">
<!--<![endif]-->


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="initial-scale=1.0" />

    <title>Del-Canteen</title>

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Courgette%3Aregular&amp;subset=latin%2Clatin-ext&amp;ver=b85dc0fb3d1e6e1da870c45887969c19' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans%3A300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic&amp;subset=greek%2Ccyrillic-ext%2Ccyrillic%2Clatin%2Clatin-ext%2Cvietnamese%2Cgreek-ext&amp;ver=b85dc0fb3d1e6e1da870c45887969c19' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Droid+Serif%3Aregular%2Citalic%2C700%2C700italic&amp;subset=latin&amp;ver=b85dc0fb3d1e6e1da870c45887969c19' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=ABeeZee%3Aregular%2Citalic&amp;subset=latin&amp;ver=b85dc0fb3d1e6e1da870c45887969c19' type='text/css' media='all' />

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Dancing+Script:regular|Courgette:regular' type='text/css' media='all' />


    <link rel='stylesheet' href='{{ asset('boostrap4/css/bootstrap.min.css') }}' type='text/css' media='all' />

    <link rel='stylesheet' href='{{ asset('css/style.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('plugins/superfish/css/superfish.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('plugins/dl-menu/component.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('plugins/font-awesome-new/css/font-awesome.min.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('plugins/fancybox/jquery.fancybox.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('plugins/flexslider/flexslider.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('css/style-responsive.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('css/style-custom.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('plugins/masterslider/public/assets/css/masterslider.main.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('css/master-custom.css') }}' type='text/css' media='all' />

    <style>
        .bg{
            background: url("{{ asset('images/bg.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>


</head>

<body class="home page-template-default page page-id-4474 _masterslider _msp_version_3.2.7 woocommerce-no-js tribe-no-js bg">

    <div class="" style="margin-top: 150px; opacity: 0.85">
        @yield('content')
    </div>
    <!-- body-wrapper -->

    <script type='text/javascript' src='{{ asset('js/jquery/jquery.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/jquery/jquery-migrate.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('plugins/superfish/js/superfish.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/hoverIntent.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('plugins/dl-menu/modernizr.custom.js') }}'></script>
    <script type='text/javascript' src='{{ asset('plugins/dl-menu/jquery.dlmenu.js') }}'></script>
    <script type='text/javascript' src='{{ asset('plugins/jquery.easing.js') }}'></script>
    <script type='text/javascript' src='{{ asset('plugins/fancybox/jquery.fancybox.pack.js') }}'></script>
    <script type='text/javascript' src='{{ asset('plugins/fancybox/helpers/jquery.fancybox-media.js') }}'></script>
    <script type='text/javascript' src='{{ asset('plugins/fancybox/helpers/jquery.fancybox-thumbs.js') }}'></script>
    <script type='text/javascript' src='{{ asset('plugins/flexslider/jquery.flexslider.js') }}'></script>
    <script type='text/javascript' src='{{ asset('plugins/jquery.isotope.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/plugins.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('plugins/masterslider/public/assets/js/masterslider.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('plugins/jquery.transit.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('plugins/gdlr-portfolio/gdlr-portfolio-script.js') }}'></script>

</body>


</html>
