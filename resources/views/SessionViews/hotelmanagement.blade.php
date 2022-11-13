@extends('layouts.app')
@section('content')
    @if(Auth::check())
        <div>
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-button"
                style="background-image: linear-gradient(to left, green,#fde8ec);">
                <div class="container">
                    <div class="container-fluid">
                        <b>
                            <h4>Hotel Management</h4>
                        </b>
                    </div>
                </div>
            </nav>
        </div>
        <section class="clean-block clean-blog-list dark" style="background-image: linear-gradient(to left, green,#fde8ec);">
            <div class="container">
                <img class="imghover" src="{{ asset('img/course/hotel_management_cover.jpg') }}" alt="Hotel Management Cover"
                    style="height:300px; width:100%; border-style: inset;">
            </div>
        </section>
        <br>
        <main class="page blog-post-list">
            <section class="clean-block clean-blog-list dark"
                style="background-image: linear-gradient(to left, green,#fde8ec);">
                <div class="container">
                    <div class="block-content" style="border-style: inset;">


                        @include("layouts.documenttitles")

                        <br>
                        <div class="d-flex justify-content-center">

                        </div>
                    </div>
                </div>
            </section>
        </main>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/script.min.js"></script> --}}
    @else
        @include('GuestViews.guesthotelmanagement')
    @endif
@endsection
