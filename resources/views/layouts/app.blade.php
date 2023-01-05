<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head id="headcss">
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

     <style>
            /* .nav-link{
            background-color: #4c9922;
            border-radius: 25px;
        } */
        body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover {
  opacity: 1;
}
        </style>
</head>

<body style="background-image: linear-gradient(to left, green,#fde8ec);">
    <header class="container-fluid" style="background-image: linear-gradient(to left, black,green);">
        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight"><img class="d-inline" src="{{ asset('img/tech/plplogo.png') }}" alt="PLP Logo" style="width: 50px; height: 50px;">
                <a href="{{ route('home') }}" class="stretched-link text-light text-decoration-none d-inline" style="position: relative;">PLP
                    Thesis and Research Recommender System</a>
            </div>
            <div class="p-2 bd-highlight">
                <button class="btn btn-secondary dropdown-toggle bg-success mt-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Colleges
                  </button>

                <ul class="dropdown-menu dropdown-menu-dark" >
                  @auth
                  <li><a
                    class="navbar-brand nav-link dropdown-item text-light"
                    href="{{ route('home') }}">Homepage</a></li>
                  @endauth
                  <li><a
                    class="navbar-brand nav-link dropdown-item text-light"
                    href="{{ route('accountancy') }}">Accountancy</a></li>
                  <li><a
                    class="navbar-brand nav-link dropdown-item text-light" href="{{ route('artsandscience') }}">Arts and
                    Science</a></li>
                  <li><a
                    class="navbar-brand nav-link dropdown-item text-light" href="{{ route('computerstudies') }}">Computer
                    Studies</a></li>
                  <li><a
                    class="navbar-brand nav-link dropdown-item text-light"
                    href="{{ route('education') }}">Education</a></li>
                  <li><a
                    class="navbar-brand nav-link dropdown-item text-light"
                    href="{{ route('engineering') }}">Engineering</a></li>
                  <li><a
                    class="navbar-brand nav-link dropdown-item text-light" href="{{ url('hotelmanagement') }}">Hospitality
                    Management</a></li>
                  <li><a
                    class="navbar-brand nav-link dropdown-item text-light" href="{{ url('nursing') }}">Nursing</a></li>
                </ul>   
            </div>
            <div class="p-2 bd-highlight">
                @guest
                    <a class="text-light" href="{{ route('login') }}"><button class="bg-success mt-2 rounded">Login</button></a>
                @endguest
                @auth
                    <a class="nav-link dropdown-toggle rounded-3 bg-success me-2"
                        id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"><img class="rounded-circle" src="{{ asset('img/avatars/profiles.png') }}" style="width:40px;height:40px; border-style: solid; border-color: green;">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        {{-- @foreach ( as  ) --}}

                        <li><p class="dropdown-item">
                            <b>{{ $name }}</b><br />{{ $college }}
                        </p></li>

                        <li><p><a class="text-decoration-none dropdown-item" href="{{ route('changepass') }}">Change Password</a></p></li>

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
                @endauth
            </div>
          </div>
          <form method="GET">

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
        <br>


    </header>
    <br>


    @yield('content')

    <footer class="my-3">
        
        <div style="background-image: linear-gradient(to left, green,black); padding: 2%;">
            <div>
                        <center>
                            <h3>Mission</h3>
                        </center>
                        <h5 style="text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;As
                            the source of knowledge in the university, the library strives to acquire substantial
                            collections,
                            and render services that meet standards of excellence to support quality education, research
                            productivity and the extension programs of the institution thru dissemination.</h5>
                        <center>
                            <h3>Vision</h3>
                        </center>
                        <h5 style="text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The
                            Library envisions to evolve as the best intellectual resource of the academic community through
                            an
                            automated library system that will contribute sustantially in the education of Pasigueños to
                            become
                            a world-class citizen in the global information network. </h5>
            </div>
            <br><br>
            <div class="row">
            <div class="col">
                    <h3>Republic of the Philippines</h3>
                    <p>All content is in the public domain unless otherwise stated</p>
                    <br>
                    <h3>Government Links</h3>
                    <li><a class="text-decoration-none" href="http://op-proper.gov.ph/">Office of the President</a></li>
                    <li><a class="text-decoration-none" href="http://www.ovp.gov.ph/">Office of the Vice President</a></li>
                    <li><a class="text-decoration-none" href="https://www.senate.gov.ph/">Senate of the Philippines</a></li>
                    <li><a class="text-decoration-none" href="http://www.congress.gov.ph/">House of the Representatives</a></li>
                    <li><a class="text-decoration-none" href="http://sc.judiciary.gov.ph/">Supreme Court</a></li>
                    <li><a class="text-decoration-none" href="https://ca2.judiciary.gov.ph/caws-war/">Court of Appeals</a></li>
                    <li><a class="text-decoration-none" href="http://sb.judiciary.gov.ph/">Sandiganbayan</a></li>
            </div>
            <div class="col">
                <h3>contact us</h3>
                <li>PHONE: 628 – 1013, 628 – 1014, 643 – 9558</li>
                <li>EMAIL: plpasigpresidentsoffice@gmail.com</li>
                <li><a class="text-decoration-none" href="https://www.facebook.com/PLPasig-102897094582245/">Pamantasan ng Lungsod ng Pasig Official
                        FB
                        Page</a></li>

                <h3>downloads</h3>
                <li><a class="text-decoration-none" href="assets/docs/STUDENT-PRIMER-2020-2021.pdf">Student Handbook Version 2020-2021</a></li>

                <h3>archives</h3>
                <li>Archives from 2017 - 2021</li>
            </div>
        </div>
        </div>
    </footer>
    <script>
        function showhistory() {
          document.getElementById("history").innerHTML;
        }
        function openForm() {
        document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
        document.getElementById("myForm").style.display = "none";
        }
    </script>
</body>

</html>
