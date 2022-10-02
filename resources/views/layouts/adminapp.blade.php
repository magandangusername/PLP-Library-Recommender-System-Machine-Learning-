<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- <style>
            .nav-link{
            background-color: #4c9922;
            border-radius: 25px;
        }
        </style> --}}
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="#overview">Admin Panel</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->

        <!-- Navbar-->
        {{-- <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown"> --}}

        <a class="nav-link dropdown-toggle position-absolute top-50 end-0 translate-middle-y" id="navbarDropdown"
            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#!">Profile</a></li>
            <li><a class="dropdown-item" href="#adminlogout">Logout</a></li>
        </ul>
        </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="../overview.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Overview
                        </a>
                        <div class="sb-sidenav-menu-heading">Manage Section</div>
                        <a class="nav-link" href="manageAccount.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Manage Accounts
                        </a>
                        <a class="nav-link" href="manageDocument.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-minus-circle"></i></div>
                            Manage Documents
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#roomcollapse" aria-expanded="false" aria-controls="collapseLayouts">

                            <div class="sb-nav-link-icon">
                                <i class="fas fa-bed"></i>
                            </div>

                            Create new data
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>

                        </a>
                        <div class="collapse" id="roomcollapse" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../addNew/addnewstudent.php">Create new Student Account</a>
                                <a class="nav-link" href="../addNew/addnewdocument.php">Add new Document</a>
                            </nav>
                        </div>

                        <div class="sb-sidenav-footer" style=" position: fixed; bottom: 0; width: 100%;">
                            <div class="small" style=" position: fixed; bottom: 0; width: 100%;">Logged in as: Admin
                                Name </div>
                        </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">

            {{-- <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid bg-dark">
                <a class="navbar-brand" href="#" style="color: white; "><img src="assets/img/tech/plplogo.png"
                        alt="PLP Logo" style="width: 50px; height: 50px; color: white">Thesis and Research</a>
                        <div class="d-flex">
                            <img class="rounded-circle"src="data:image/jpg;charset=utf8;base64,<?php //echo base64_encode($profilepic);
                            ?>"
                                style="width:40px;height:40px; border-style: solid; border-color: green; margin-right:10px;">
                            <div class="dropdown">
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
                            </div>
                        </div>
            </div>
            
        </nav>
        <nav class="navbar navbar-dark bg-dark position-sticky" style="margin:2px 0px 0px 0px;background-color:rgba(255,255,255,0);">
            <div class="container-fluid">
                <button type="button" class="btn btn-info rounded-pill"><a class="navbar-brand nav-link">Overview</a></button>
                <button type="button" class="btn btn-info rounded-pill"><a class="navbar-brand nav-link">Manage Accounts</a></button>
                <button type="button" class="btn btn-info rounded-pill"><a class="navbar-brand nav-link">Manage Documents</a></button>
                <button type="button" class="btn btn-info rounded-pill"><a class="navbar-brand nav-link">Add New Student Account</a></button>
                <button type="button" class="btn btn-info rounded-pill"><a class="navbar-brand nav-link">Add New Document</a></button>
                
          </nav> --}}





            @yield('admincontent')


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
            </script>
            <script>
                window.addEventListener('DOMContentLoaded', event => {

                    const datatabledatablerr = document.getElementById('datatablerr');
                    const datatabledatableru = document.getElementById('datatableru');
                    const datatabledatablerc = document.getElementById('datatablesrc');
                    const datatabledatableAcc = document.getElementById('datatableAcc');


                    new simpleDatatables.DataTable(datatablerr);
                    new simpleDatatables.DataTable(datatableru);
                    new simpleDatatables.DataTable(datatablerc);
                    new simpleDatatables.DataTable(datatabledatableAcc);

                });
            </script>
            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable();
                });


                window.addEventListener('DOMContentLoaded', event => {

                    // Toggle the side navigation
                    const sidebarToggle = document.body.querySelector('#sidebarToggle');
                    if (sidebarToggle) {

                        sidebarToggle.addEventListener('click', event => {
                            event.preventDefault();
                            document.body.classList.toggle('sb-sidenav-toggled');
                            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains(
                                'sb-sidenav-toggled'));
                        });
                    }

                });

                $(document).ready(function() {
                    $(document).on('change', '.btn-file :file', function() {
                        var input = $(this),
                            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                        input.trigger('fileselect', [label]);
                    });


                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('#img-upload').attr('src', e.target.result);
                            }

                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    $("#imgInp").change(function() {
                        readURL(this);
                    });
                });
            </script>

            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
            <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>
