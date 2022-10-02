@extends('layouts.app2')

@section('content2')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Student Number:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('see password') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                
                            </div>
                        </div> --}}

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="background-image: linear-gradient(to left, green,#fde8ec);">
    <div class="container-fluid" style="background-image: linear-gradient(to left, green,#fde8ec);">
        <a class="navbar-brand logo" href="#"><img src="assets/img/tech/plplogo.png" alt="PLP Logo" style="width: 50px; height: 50px;">Thesis and Research</a>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item" role="presentation"><a class="nav-link" href="guestindex.php" style="color:#000000;">Go Back</a></li>
        </ul>
    </div>
</nav>
<main class="page login-page">
    <section class="clean-block clean-form dark" style="background-image: linear-gradient(to left, green,#fde8ec);">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-dark">Sign In</h2>
            </div>
            <form class="justify-content-center" action="login.php" method="POST">
                <?php //if (isset($_GET['error'])){ ?>
                    <p class="error" style="background: #F2DEDE; color:#A94442; padding:10px; width: 95%; border-radius: 5px; margin: 20px auto;"><?php echo $_GET['error'];?></p>
                <?php //} ?>
                <div class="form-group"><label for="email">Student Number:</label><input class="form-control item" type="text" id="email" name="studentnumber" placeholder="Student Number"></div>
                <div class="form-group"><label for="password">Password:</label><input class="form-control" type="password" id="password" name="password" placeholder="Password"></div>
                <div class="form-group"><input type="checkbox" onclick="seepassword()"> Show Password </div>
                <button class="btn btn-primary btn-block" type="submit" style="background-color:rgb(255,255,255);color:rgb(0,0,0);">Sign In</button>
            </form>
        </div>
    </section>
</main>
<script>
    function seepassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "passwodr";
    }
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.min.js"></script> --}}
@endsection
