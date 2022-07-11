<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body style="background-color: #f3f3f3">
    <div id="app">
        <nav style="background-color: #333!important" class="bg-white shadow-md navbar navbar-expand-md navbar-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="ml-auto navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item font-weight-bold mt-3 mt-md-0 ml-0 ml-md-3">
                            <a class="nav-link text-white" href="/book">ΚΛΕΙΣΕ ΠΡΟΠΟΝΗΣΗ</a>
                        </li>
                        <li class="nav-item font-weight-bold mt-3 mt-md-0 ml-0 ml-md-3">
                            <a class="nav-link text-white" href="/profile">ΠΡΟΦΙΛ</a>
                        </li>
                        <!-- <li class="nav-item font-weight-bold mt-3 mt-md-0 ml-0 ml-md-3">
                            <a class="nav-link text-white" href="/privacy-policy">ΟΡΟΙ & ΠΡΟΥΠΟΘΕΣΕΙΣ</a>
                        </li> -->
                        @endguest
                        @auth 
                            <li class="nav-item ml-0 ml-md-3 mt-3 mt-md-0">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-light">
                                        Logout
                                    </button>
                                </form>
                            </li>                    
                        @endauth
                    </ul>
                </div>                
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    
    <script src="{{ asset('admin-assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>