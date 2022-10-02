<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- <style>
            .nav-link{
            background-color: #4c9922;
            border-radius: 25px;
        }
        </style> --}}
</head>
<body style="background-image: linear-gradient(to left, green,#fde8ec);">
<header>

    <?php
    // if (!isset($_SESSION)) {
    //     session_start();
    // }
    // if (isset($_SESSION['studentnumber']) && isset($_SESSION['password'])) {
    ?>


    <nav class="navbar navbar-light bg-light" style="background-image: linear-gradient(to left, green,#fde8ec);">
        <div class="container-fluid" style="background-image: linear-gradient(to left, green,#fde8ec);">
            <a class="navbar-brand text-dark    " href="#" style="color: white; "><img src="assets/img/tech/plplogo.png"
                    alt="PLP Logo" style="width: 50px; height: 50px;">Thesis and Research</a>
                    <div class="d-flex">
                        <img class="rounded-circle"src="data:image/jpg;charset=utf8;base64,<?php //echo base64_encode($profilepic);
                        ?>"
                            style="width:40px;height:40px; border-style: solid; border-color: green; margin-right:10px;">
                        {{-- <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php //echo $studentname
                                ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="profile.php">Profile</a>
                                <a class="dropdown-item" href="recommend_test.php">Recomendation</a>
                                <a class="dropdown-item" href="myfavorites.php">Your Favorites</a>
                                <a class="dropdown-item" target="_blank" href="ckeditor.php">Your Editor</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Log out</a>
                            </div>
                        </div> --}}
                        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                            class="fas fa-bars"></i></button>
                    <!-- Navbar Search-->
            
                    <!-- Navbar-->
                    {{-- <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                        <li class="nav-item dropdown"> --}}
            
                    <a class="nav-link dropdown-toggle position-absolute top-50 end-0 translate-middle-y rounded-3 bg-dark" id="navbarDropdown"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                            class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Profile</a></li>
                        <li><a class="dropdown-item" href="#adminlogout">Logout</a></li>
                    </ul>   
                        
                    </div>
        </div>
        
    </nav>
    



@yield('content2')
{{-- <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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
</body> --}}


</body>
</html>
