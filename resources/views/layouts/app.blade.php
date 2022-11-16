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


        <nav class="navbar navbar-light bg-light" style="background-image: linear-gradient(to left, black,green);">
            <div class="container-fluid" style="background-image: linear-gradient(to left, black,green);">
                <a class="navbar-brand" href="#" style="color: white; "><img
                        src="{{ asset('img/tech/plplogo.png') }}" alt="PLP Logo" style="width: 50px; height: 50px;">PLP
                    Thesis and Research Recommender System</a>
                <div class="d-flex">
                    @guest
                        <a href="{{ route('login') }}"><button>Login</button></a>
                    @endguest
                    @auth


                        <img class="rounded-circle"src="{{ asset('img/avatars/profiles.png') }}<?php //echo base64_encode($profilepic);
                        ?>"
                            {{-- data:image/jpg;charset=utf8;base64, --}}
                            style="width:40px;height:40px; border-style: solid; border-color: green; margin-right:10px;">
                        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"
                            href="#!"><i class="fas fa-bars"></i></button>
                        <!-- Navbar Search-->

                        <!-- Navbar-->
                        {{-- <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                            <li class="nav-item dropdown"> --}}

                        <a class="nav-link dropdown-toggle position-absolute top-50 end-0 translate-middle-y rounded-3 bg-dark"
                            id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            {{-- @foreach ( as  ) --}}

                            <li><p class="dropdown-item">
                                {{ $name }}
                            </p></li>

                            {{-- @endforeach --}}
                            {{-- <li><a class="dropdown-item"
                                    href="{{ url('/SessionViews/recommendationpage') }}">Recommendations</a></li>
                            <li><a class="dropdown-item" href="{{ url('/SessionViews/savedpage') }}">Saved</a></li> --}}
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>








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
                            </div> --}}
                    </div>
                @endauth
            </div>
            </div>

        </nav>
        <nav class="navbar navbar-light"
            style="margin:2px 0px 0px 0px;background-color:rgba(255,255,255,0); background-image: linear-gradient(to left, black,green);">
            <div class="container-fluid">
                @auth
                <button type="button"
                    class="border border-dark border border-1 btn btn-info rounded-pill text-center"><a
                        class="navbar-brand nav-link" href="{{ route('home') }}">Home</a></button>@endauth
                <button type="button"
                    class="border border-dark border border-1 btn btn-info rounded-pill text-center"><a
                        class="navbar-brand nav-link"
                        href="{{ route('accountancy') }}">Accountancy</a></button>
                <button type="button"
                    class="border border-dark border border-1 btn btn-info rounded-pill text-center"><a
                        class="navbar-brand nav-link" href="{{ route('artsandscience') }}">Arts and
                        Science</a></button>
                <button type="button"
                    class="border border-dark border border-1 btn btn-info rounded-pill text-center"><a
                        class="navbar-brand nav-link"
                        href="{{ route('education') }}">Education</a></button>
                <button type="button"
                    class="border border-dark border border-1 btn btn-info rounded-pill text-center"><a
                        class="navbar-brand nav-link"
                        href="{{ route('engineering') }}">Engineering</a></button>
                <button type="button"
                    class="border border-dark border border-1 btn btn-info rounded-pill text-center"><a
                        class="navbar-brand nav-link" href="{{ route('computerstudies') }}">Computer
                        Studies</a></button>
                <button type="button"
                    class="border border-dark border border-1 btn btn-info rounded-pill text-center"><a
                        class="navbar-brand nav-link" href="{{ url('nursing') }}">Nursing</a></button>
                <button type="button"
                    class="border border-dark border border-1 btn btn-info rounded-pill text-center"><a
                        class="navbar-brand nav-link" href="{{ url('hotelmanagement') }}">Hotel
                        Management</a></button>
            </div>
        </nav>

        </ul><span class="navbar-text actions"> </span>
        </div>
        </div>

        <script>
        </script>
        </nav>
        @if (Request::url() != route('home'))
            <form class="" method="GET">

                <div class="container my-3">
                    <div class="input-group mb-3">

                            @if (isset($search))
                                <input type="search" class="form-control" placeholder="Search" aria-label="Search" name="search"
                                aria-describedby="basic-addon2" value="@php
                                    echo $search
                                @endphp">
                            @else
                                <input type="search" class="form-control" placeholder="Search" aria-label="Search" name="search"
                                aria-describedby="basic-addon2">
                            @endif

                        <span class="input-group-text" id="basic-addon2"><button
                                class="btn btn-primary">Search</button></span>
                    </div>
                </div>
            </form>
        @endif
        </div>



    </header>


    @yield('content')

    <footer class="my-3">
        <div class="row align-items-center"
            style="background-image: linear-gradient(to left, green,black); padding: 2%;">
            <div class="col-4">
                <div class="librMisandVis">
                    <center>
                        <h3>Mission</h3>
                    </center>
                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;As
                        the source of knowledge in the university, the library strives to acquire substantial
                        collections,
                        and render services that meet standards of excellence to support quality education, research
                        productivity and the extension programs of the institution thru dissemination.</h5>
                </div>
            </div>
            <div class="col-4">
                <div class="librMisandVis">
                    <center>
                        <h3>Vision</h3>
                    </center>
                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The
                        Library envisions to evolve as the best intellectual resource of the academic community through
                        an
                        automated library system that will contribute sustantially in the education of Pasigueños to
                        become
                        a world-class citizen in the global information network. </h5>
                </div>
            </div>
            <div class="col-4">
                <h3>contact us</h3>
                <li style="color: black;"><strong>PHONE: 628 – 1013, 628 – 1014, 643 – 9558 </strong></li>
                <li style="color: black;"><strong>EMAIL: plpasigpresidentsoffice@gmail.com </strong></li>
                <li><a href="https://www.facebook.com/PLPasig-102897094582245/">Pamantasan ng Lungsod ng Pasig Official
                        FB
                        Page</a></li>

                <h3>downloads</h3>
                <li><a href="assets/docs/STUDENT-PRIMER-2020-2021.pdf">Student Handbook Version 2020-2021</a></li>

                <h3>archives</h3>
                <li style="color: black;"><strong>Archives from 2017 - 2021</strong></li>
                {{-- <li style="color: black;"><strong>Archive 2020</strong></li>
            <li style="color: black;"><strong>Archive 2019</strong></li>
            <li style="color: black;"><strong>Archive 2018</strong></li>
            <li style="color: black;"><strong>Archive 2017</strong></li> --}}
            </div>
        </div>
        <div class="row align-items-center"
            style="background-image: linear-gradient(to left, green,black); padding: 2%;">
            <div class="col-4">
                <div class="librMisandVis">
                    <p class="right">All Rights Reserved.</p>
                    <p class="right"><a href="terms-and-conditions.php">
                            Terms and Conditions</a></p>
                    <p class="right"><a href="privacy-policy.php">Privacy
                            Policy</a></p>
                </div>
            </div>
            <div class="col-4">
                <div class="librMisandVis">
                    <h3>Republic of the Philippines</h3>
                    <p>All content is in the public domain unless otherwise stated</p>
                    <h3>Privacy Statement</h3>
                </div>
            </div>
            <div class="col-4">
                <h3>Government Links</h3>
                <li><a href="http://op-proper.gov.ph/">Office of the President</a></li>
                <li><a href="http://www.ovp.gov.ph/">Office of the Vice President</a></li>
                <li><a href="https://www.senate.gov.ph/">Senate of the Philippines</a></li>
                <li><a href="http://www.congress.gov.ph/">House of the Representatives</a></li>
                <li><a href="http://sc.judiciary.gov.ph/">Supreme Court</a></li>
                <li><a href="https://ca2.judiciary.gov.ph/caws-war/">Court of Appeals</a></li>
                <li><a href="http://sb.judiciary.gov.ph/">Sandiganbayan</a></li>

            </div>
        </div>
    </footer>
    <script>
        function showhistory() {
          document.getElementById("history").innerHTML;
        }
    </script>
</body>

</html>
