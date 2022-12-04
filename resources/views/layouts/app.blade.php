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
    <header>
        <nav class="navbar navbar-light bg-light" style="background-image: linear-gradient(to left, black,green);">
            <div class="container-fluid" style="background-image: linear-gradient(to left, black,green);">
                <a class="navbar-brand" href="{{ route('home') }}" style="color: white; "><img
                        src="{{ asset('img/tech/plplogo.png') }}" alt="PLP Logo" style="width: 50px; height: 50px;">PLP
                    Thesis and Research Recommender System</a>

                <div class="d-flex">
                    <div class="dropdown mx-5">
                        {{-- <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Colleges
                        </a> --}}
                        <button class="btn btn-secondary dropdown-toggle bg-success" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Colleges
                          </button>

                        <ul class="dropdown-menu dropdown-menu-dark">
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
                            class="navbar-brand nav-link dropdown-item text-light" href="{{ url('hotelmanagement') }}">Hotel
                            Management</a></li>
                          <li><a
                            class="navbar-brand nav-link dropdown-item text-light" href="{{ url('nursing') }}">Nursing</a></li>
                        </ul>
                      </div>
                    @guest
                        <a class="text-light" href="{{ route('login') }}"><button class="bg-success">Login</button></a>
                    @endguest
                    @auth


                        <img class="rounded-circle"src="{{ asset('img/avatars/profiles.png') }}<?php //echo base64_encode($profilepic);
                        ?>"
                            {{-- data:image/jpg;charset=utf8;base64, --}}
                            style="width:40px;height:40px; border-style: solid; border-color: green; margin-right:10px;">
                        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 bg-success" id="sidebarToggle"
                            href="#!"><i class="fas fa-bars"></i></button>
                        <!-- Navbar Search-->

                        <!-- Navbar-->
                        {{-- <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                            <li class="nav-item dropdown"> --}}

                        <a class="nav-link dropdown-toggle position-absolute top-50 end-0 translate-middle-y rounded-3 bg-success"
                            id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            {{-- @foreach ( as  ) --}}

                            <li><p class="dropdown-item">
                                <b>{{ $name }}</b>
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
                        {{-- <div class="form-popup" id="myForm">
                            <form action="{{ route('updatepass') }}" method="POST" class="form-container">
                            @csrf
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                              <h4>Change Password</h4>
                              <label class="form-label" for="old_password"><b>Old Password</b></label>
                              <input class="form-control @error('old_password') is-invalid @enderror" type="password" placeholder="Enter Old Password" name="old_password" id="old_password" required>
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                              <label class="form-label" for="new_password"><b>New Password</b></label>
                              <input class="form-control @error('new_password') is-invalid @enderror" type="password" placeholder="Enter New Password" name="new_password" id="new_password" required>
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                              <label class="form-label" for="confirm_password"><b>Confirm New Password</b></label>
                              <input class="form-control" type="password" placeholder="Re-enter New Password" name="confirm_password" id="confirm_password" required>

                              <button type="submit" class="btn">Submit</button>
                              <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                            </form>
                          </div> --}}


                    </div>
                @endauth
            </div>
            </div>

        </nav>
        <nav class="navbar navbar-light"
            style="margin:2px 0px 0px 0px;background-color:rgba(255,255,255,0); background-image: linear-gradient(to left, black,green);">
             <div class="container">
                {{-- @auth
                <button type="button"
                    class="border border-dark border border-1 btn btn-info rounded-pill text-center"><a
                        class="navbar-brand nav-link" href="{{ route('home') }}">Home</a></button>@endauth --}}
                {{--<button type="button"
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
                        Management</a></button> --}}
            </div>
        </nav>

        </ul><span class="navbar-text actions"> </span>
        </div>
        </div>

        <script>
        </script>
        </nav>
        {{-- @if (Request::url() != route('home')) --}}
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
        {{-- @endif --}}
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
        function openForm() {
        document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
        document.getElementById("myForm").style.display = "none";
        }
    </script>
</body>

</html>
