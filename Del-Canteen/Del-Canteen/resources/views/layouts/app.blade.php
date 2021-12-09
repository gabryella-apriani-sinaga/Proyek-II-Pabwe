<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="initial-scale=1.0" />

    <title>Del-Canteen</title>

    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Courgette%3Aregular&amp;subset=latin%2Clatin-ext&amp;ver=b85dc0fb3d1e6e1da870c45887969c19' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans%3A300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic&amp;subset=greek%2Ccyrillic-ext%2Ccyrillic%2Clatin%2Clatin-ext%2Cvietnamese%2Cgreek-ext&amp;ver=b85dc0fb3d1e6e1da870c45887969c19' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Droid+Serif%3Aregular%2Citalic%2C700%2C700italic&amp;subset=latin&amp;ver=b85dc0fb3d1e6e1da870c45887969c19' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=ABeeZee%3Aregular%2Citalic&amp;subset=latin&amp;ver=b85dc0fb3d1e6e1da870c45887969c19' type='text/css' media='all' />

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Dancing+Script:regular|Courgette:regular' type='text/css' media='all' />


    <link rel='stylesheet' href='{{ asset('css/style.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('boostrap4/css/bootstrap.min.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('plugins/superfish/css/superfish.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('plugins/dl-menu/component.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('plugins/font-awesome-new/css/font-awesome.min.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('plugins/fancybox/jquery.fancybox.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('plugins/flexslider/flexslider.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('css/style-responsive.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('css/style-custom.css') }}' type='text/css' media='all' />

    <link rel='stylesheet' href='{{ asset('css/master-custom.css') }}' type='text/css' media='all' />



</head>

<body data-rsssl=1 class="home page-template-default">
    <div class="body-wrapper  header-style-1" data-home="index-2.html">
        <header class="gdlr-header-wrapper" id="gdlr-header-wrapper">
            <div class="gdlr-header-inner mt-5">
                <div class="gdlr-header-container container">
                    <div class="gdlr-header-container-overlay"></div>
                    <div class="gdlr-header-container-inner">

                        <!-- logo -->
                        <div class="gdlr-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('images/logo.png') }}" alt="" />
                            </a>
                            <div class="gdlr-responsive-navigation dl-menuwrapper" id="gdlr-responsive-navigation">
                                <button class="dl-trigger">Open Menu</button>
                                <ul id="menu-main-menu" class="dl-menu gdlr-main-mobile-menu">

                                    <li class="menu-item menu-item-home  gdlr-normal-menu {{ Route::is('home') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('home') }}">Beranda</a>
                                    </li>

                                    <li class="menu-item menu-item-home  gdlr-normal-menu {{ Route::is('piket/list') ? 'current-menu-item' : '' }}" >
                                        <a href="{{ route('piket/list') }}">Jadwal Piket</a>
                                    </li>

                                    @if(in_array($user->role, [1,2]))
                                    <li class="menu-item menu-item-home  gdlr-normal-menu {{ Route::is('alergi/pengguna/list') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('alergi/pengguna/list') }}">Alergi</a>
                                    </li>
                                    @endif

                                    {{-- <li class="menu-item menu-item-home  gdlr-normal-menu">
                                        <a href="#">Feedback</a>
                                    </li> --}}

                                    @if(in_array($user->role, [3, 4, 5]))
                                    <li class="menu-item menu-item-has-children gdlr-normal-menu {{ Route::is('makanan/list') || Route::is('makanan/list') ? 'current-menu-item' : '' }}">
                                        <a href="#" class="sf-with-ul-pre sf-with-ul">Kelola</a>
                                        <ul class="sub-menu" style="display: none;">

                                            @if(in_array($user->role, [5]))
                                                <li class="menu-item">
                                                    <a href="{{ route('pengguna/list') }}">Kelola Pengguna</a>
                                                </li>
                                            @endif

                                            @if(in_array($user->role, [4, 5]))
                                            <li class="menu-item">
                                                <a href="{{ route('makanan/list') }}">Kelola Makanan</a>
                                            </li>
                                            @endif

                                            @if(in_array($user->role, [3, 4, 5]))
                                            <li class="menu-item">
                                                <a href="{{ route('alergi/list') }}">Data Alergi</a>
                                            </li>
                                            @endif

                                        </ul>
                                    </li>
                                    @endif

                                    <li class="menu-item menu-item-home  gdlr-normal-menu {{ Route::is('tentang') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('tentang') }}">Tentang</a>
                                    </li>

                                    <li class="menu-item menu-item-home  gdlr-normal-menu">
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                         Keluar
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <!-- navigation -->
                        <div class="gdlr-navigation-wrapper">
                            <nav class="gdlr-navigation" id="gdlr-main-navigation" role="navigation">
                                <ul id="menu-main-menu-1" class="sf-menu gdlr-main-menu">
                                    <li class="menu-item menu-item-home  gdlr-normal-menu {{ Route::is('home') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('home') }}">Beranda</a>
                                    </li>

                                    <li class="menu-item menu-item-home  gdlr-normal-menu {{ Route::is('piket/list') ? 'current-menu-item' : '' }}" >
                                        <a href="{{ route('piket/list') }}">Jadwal Piket</a>
                                    </li>

                                    @if(in_array($user->role, [1,2]))
                                    <li class="menu-item menu-item-home  gdlr-normal-menu {{ Route::is('alergi/pengguna/list') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('alergi/pengguna/list') }}">Alergi</a>
                                    </li>
                                    @endif

                                    {{-- <li class="menu-item menu-item-home  gdlr-normal-menu">
                                        <a href="#">Feedback</a>
                                    </li> --}}

                                    @if(in_array($user->role, [3, 4, 5]))
                                    <li class="menu-item menu-item-has-children gdlr-normal-menu {{ Route::is('makanan/list') || Route::is('makanan/list') ? 'current-menu-item' : '' }}">
                                        <a href="#" class="sf-with-ul-pre sf-with-ul">Kelola</a>
                                        <ul class="sub-menu" style="display: none;">

                                            @if(in_array($user->role, [5]))
                                                <li class="menu-item">
                                                    <a href="{{ route('pengguna/list') }}">Kelola Pengguna</a>
                                                </li>
                                            @endif

                                            @if(in_array($user->role, [4, 5]))
                                            <li class="menu-item">
                                                <a href="{{ route('makanan/list') }}">Kelola Makanan</a>
                                            </li>
                                            @endif

                                            @if(in_array($user->role, [3, 4, 5]))
                                            <li class="menu-item">
                                                <a href="{{ route('alergi/list') }}">Data Alergi</a>
                                            </li>
                                            @endif

                                        </ul>
                                    </li>
                                    @endif

                                    <li class="menu-item menu-item-home  gdlr-normal-menu {{ Route::is('tentang') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('tentang') }}">Tentang</a>
                                    </li>

                                    <li class="menu-item menu-item-home  gdlr-normal-menu">
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                         Keluar
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>

                                </ul>


                            </nav>
                            <div class="gdlr-navigation-gimmick" id="gdlr-navigation-gimmick"></div>
                            <div class="clear"></div>
                        </div>


                        <div class="clear"></div>
                    </div>
                </div>
            </div>


        </header>


        @yield('header')

        <div class="content-wrapper">
            <div class="gdlr-content">
                <!-- Above Sidebar Section-->

                <!-- Sidebar With Content Section-->
                @yield('content')
                <!-- Below Sidebar Section-->

            </div>
            <!-- gdlr-content -->
            <div class="clear"></div>
        </div>
        <!-- content wrapper -->


        <footer class="footer-wrapper">
            <div class="copyright-wrapper">
                <div class="copyright-container container">
                    <div class="copyright-left">
                    </div>
                    <div class="copyright-right">
                        Copyright 2021 Del-Canteen. All Right Revered.
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </footer>
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

    <script type='text/javascript' src='{{ asset('plugins/jquery.transit.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('plugins/gdlr-portfolio/gdlr-portfolio-script.js') }}'></script>

</body>


</html>
