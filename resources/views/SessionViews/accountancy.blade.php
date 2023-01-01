@extends('layouts.app')
@section('content')
        {{-- <div>
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-button"
                style="background-image: linear-gradient(to left, green,#fde8ec);">
                <div class="container">
                    <div class="container-fluid">
                        <b>
                            <h4>Accountancy</h4>
                        </b>
                    </div>
                </div>
            </nav>
        </div> --}}
        <section class="clean-block clean-blog-list dark" style="background-image: linear-gradient(to left, green,#fde8ec);">
            <div class="container d-flex justify-content-center">
                <img class="imghover" src="{{ asset('img/course/accountancy.jfif') }}" alt="Accountancy Logo"
                    style="height:300px; width:300px; border-style: inset;">
            </div>
            <b>
                <h4 class="d-block d-flex justify-content-center">College of Accountancy</h4>
            </b>
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
@endsection
