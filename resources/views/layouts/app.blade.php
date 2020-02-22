<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

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

</head>

<body>
<!-- middle -->
<div id="right-panel" class="right-panel full">
    <!-- Header-->
    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{asset('images/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="{{ route('home') }}"><img src="{{asset('images/logo2.png')}}" alt="Logo"></a>
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
                @guest
                    <div style="align-self: center">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="margin: 0px 10px;font-weight: bold;color: #99abb4;">Register</a>
                        @endif
                        <a href="{{ route('login') }}" style="margin: 0px 10px;font-weight: bold;color: #99abb4;">Login</a>
                        <a href="{{ route('about_us') }}" style="margin: 0px 10px;font-weight: bold;color: #99abb4;">About Us</a>
                    </div>
                @else
                    <div style="align-self: center">
                        <a href="{{ url('/trips') }}" style="margin: 0px 10px;font-weight: bold;color: #99abb4;">My Trips</a>
                        @if(Auth::check() && ( Auth::user()->role === 'a'))
                            <a href="{{ url('/agent/dashboard') }}" style="margin: 0px 10px;font-weight: bold;color: #99abb4;">Dashboard</a>
                        @elseif(Auth::check() && ( Auth::user()->role === 's'))
                            <a href="{{ url('/admin/dashboard') }}" style="margin: 0px 10px;font-weight: bold;color: #99abb4;">Dashboard</a>
                        @endif
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

                @endguest

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
<!-- middle -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="{{asset('js/main.js')}}"></script>

@yield('scripts')

</body>
</html>
