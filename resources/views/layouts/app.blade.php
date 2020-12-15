<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML Meta Tags -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description"
        content="Menjual berbagai macam varian makanan dan minuman untuk perorangan atau kelompok.">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Kiddos Catering">
    <meta itemprop="description"
        content="Menjual berbagai macam varian makanan dan minuman untuk perorangan atau kelompok.">
    <meta itemprop="image" content="http://kiddos-catering.herokuapp.com/icon/meta_image.jpg">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="http://kiddos-catering.herokuapp.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Kiddos Catering">
    <meta property="og:description"
        content="Menjual berbagai macam varian makanan dan minuman untuk perorangan atau kelompok.">
    <meta property="og:image" content="http://kiddos-catering.herokuapp.com/icon/meta_image.jpg">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Kiddos Catering">
    <meta name="twitter:description"
        content="Menjual berbagai macam varian makanan dan minuman untuk perorangan atau kelompok.">
    <meta name="twitter:image" content="http://kiddos-catering.herokuapp.com/icon/meta_image.jpg">

    <!-- Meta Tags Generated via http://heymeta.com -->




    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- icon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="manifest" href="icon/site.webmanifest">





    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- Font-awasome --}}
    <script src="https://kit.fontawesome.com/583cd20739.js" crossorigin="anonymous"></script>
    @livewireStyles()
    @stack('css')

</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top shadow">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <ul class="navbar-nav d-lg-none">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cart.index')}}">
                            <i class="fas fa-shopping-cart">
                            </i>
                            @auth
                            <span class="cart-info">{{Cart::session(Auth::user()->id)->getTotalQuantity()}}</span>
                            @endauth
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mx-auto ">
                        <li class="nav-item">
                            <a href="{{route('home.kiddos')}}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link disabled">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link disabled">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('calendar.index')}}" class="nav-link">Jadwal</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ">
                        <!-- Authentication Links -->
                        <li class="nav-item d-none d-lg-inline">
                            <a class="nav-link" href="{{route('cart.index')}}">
                                <i class="fas fa-shopping-cart">
                                </i>
                                @auth
                                <span class="cart-info">{{Cart::session(Auth::user()->id)->getTotalQuantity()}}</span>
                                @endauth
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('saran.create') }}">Saran</a>
                        </li>

                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @can('admin')
                                <a href="{{route('kategori.index')}}" class="dropdown-item">Kategori</a>
                                <a href="{{route('sub_kategori.index')}}" class="dropdown-item">Sub Kategori</a>
                                <a href="{{route('menu.index')}}" class="dropdown-item">Menu Makanan</a>
                                <a href="{{route('jadwal.index')}}" class="dropdown-item">Jadwal</a>
                                <a href="{{route('saran.index')}}" class="dropdown-item">Saran</a>
                                @endcan

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            @yield('content')

        </main>

    </div>






    @stack('before-scripts')
    @livewireScripts()
    @stack('after-scripts')
</body>

</html>