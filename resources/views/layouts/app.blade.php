<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            background-image: url(images/4541.jpg) ;
            background-size:100%;
          
        }
        </style>
   

    @yield('styles')

    
</head>
<body >
    <div id="app">
        <nav class="navbar navbar-expand-md " style="background-color:teal">
            <div class="container">
                <img src="images/Logofix.png" width="10%" alt="">
                <a class="navbar-brand" href="{{ url('/') }}" style="font-family: laksaman">
                    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    

                    <!-- Side Kanan dari Navbarnya -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Auth Login Link DISINI -->
                        <li class="nav-item"><a class="nav-link" style="color:white" href="{{ route('outlet_map.index') }}">{{ __('Peta') }}</a></li>

                        
                    @yield('ifRestaurants')




                    
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color:white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:white" href="/outlets/create">Daftar Restoran</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" style="color:white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" style="color:white" href="/ahli-gizi">Ahli Gizi</a>
                            </li>
                            <li class="nav-item" style="display: {{Auth::user()->role == "ahli gizi" ? "block" : "none"}}">
                                <a class="nav-link" style="color:white" href="{{Auth::user()->role == "ahli gizi" ? "/tinjau-makanan" : ""}}">{{Auth::user()->role == "ahli gizi" ? "Tinjau" : ""}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:white" href="/artikel-dan-tips">Artikel & Tips</a>
                            </li>
                            <li class="nav-item" style=" display: {{Auth::user()->role == "customer" ? "block" : "none"}}">
                                <a class="nav-link" style="color:white" href="{{Auth::user()->role == "customer" ? "/hitung-kalori" : ""}}">{{Auth::user()->role == "customer" ? "Hitung Kalori" : ""}}</a>
                            </li>    
                            <li class="nav-item" style="display: {{Auth::user()->role == "restoran" ? "block" : "none"}}">
                                <a class="nav-link" style="color:white" href="{{Auth::user()->role == "restoran" ? "/menu-makanan" : ""}}">{{Auth::user()->role == "restoran" ? "Menu Makanan" : ""}}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" style="color:white" href="{{Auth::user()->role == "admin" ? "/list-warung" : ""}}{{Auth::user()->role == "restoran" ? "/outlets" : ""}}">{{Auth::user()->role == "admin" ? "List Restoran" : ""}}{{Auth::user()->role == "restoran" ? "Restoran Saya" : ""}}</a>
                            </li>
                           
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color:white" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Akun <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <a class="dropdown-item">
                                        {{ Auth::user()->role }}
                                    </a>
                                    @if (Auth::user()->role == 'ahli gizi')
                                    <a class="dropdown-item" href="{{ Auth::user()->role=="ahli gizi" ? "setting-profil-ahli-gizi" : "" }} {{ Auth::user()->role=="customer" ? "setting-profil-customer" : "" }} {{ Auth::user()->role=="restoran" ? "setting-profil-rumah-makan" : "" }}">
                                        Pengaturan
                                    </a>
                                    @else
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Keluar') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container" >

        
            @yield('content')
            
        </main>
        @include('layouts.partials.footer')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>