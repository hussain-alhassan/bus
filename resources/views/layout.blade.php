<!DOCTYPE html>
<html lang="{{app()->getlocale()}}">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="/">
            <img src="logo.jpg" alt="logo" style="width:40px;">
        </a>

        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/trips/{{'123'}}">{{__('messages.my_trips')}}</a>
                </li>
            </ul>
        </div>

        <div class="navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="navbar-nav ml-auto" style="color: #ffffff">
                        {{-- later will get the name from Auth --}}
                        {{ __('messages.welcome', ['name' => 'Ali'])}}
                    </span>
                </li>
            </ul>
            <a href="/logout" class="btn btn-info ml-2" role="button">{{__('messages.logout')}}</a>
        </div>
    </nav>

    <div class="container">
        @yield('body')
    </div>

</body>
</html>
