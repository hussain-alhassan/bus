<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Agency')</title>

    <meta name="description" content="Bus Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}">
    <link rel="shortcut icon" href="{{asset('images/logo2.png')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    @yield('styles')

</head>

<body class="open">
<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="font-weight-bold active">
                    <a href="{{ url('/agent/dashboard') }}"><i class="menu-icon fa fa-laptop fa-lg"></i>DASHBOARD </a>
                </li>
                <li class="font-weight-bold">
                    <a href="widgets.html"> <i class="menu-icon fa fa-user fa-lg"></i>ADD TRAVELER </a>
                </li>
                <li class="font-weight-bold">
                    <a href="{{ route('bookings.index') }}"> <i class="menu-icon fa fa-calendar fa-lg"></i>BOOKINGS </a>
                </li>
                <li class="font-weight-bold">
                    <a href="widgets.html"> <i class="menu-icon fa fa-suitcase fa-lg"></i>TRIPS </a>
                </li>
                <li class="font-weight-bold">
                    <a href="{{ url('/agent/profile') }}"> <i class="menu-icon fa fa-suitcase fa-lg"></i>PROFILE </a>
                </li>
                <li class="font-weight-bold">
                    <a href="widgets.html"> <i class="menu-icon fa fa-bus fa-lg"></i>BUSES </a>
                </li>
                <li class="font-weight-bold">
                    <a href="widgets.html"> <i class="menu-icon fa fa-building fa-lg"></i>OFFICES </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{asset('images/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="{{ route('home') }}"><img src="{{asset('images/logo2.png')}}" alt="Logo"></a>
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">
                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>
                </div>
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="{{asset('images/admin.jpg')}}" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="#"><i class="fa fa-user"></i>My Profile</a>

                        <a class="nav-link" href="#"><i class="fa fa-cog"></i>Settings</a>

                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i>
                            {{ __('texts.logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <!-- /#header -->
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        @yield('content')
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    <!-- Footer -->
    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-12">
                    Copyright &copy; 2020 Bus Project
                </div>
            </div>
        </div>
    </footer>
    <!-- /.site-footer -->
</div>
<!-- /#right-panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="{{asset('js/main.js')}}"></script>

@yield('scripts')

</body>
</html>
