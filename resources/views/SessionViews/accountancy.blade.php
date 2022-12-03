@extends('layouts.app')
@section('content')
        <div>
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
        </div>
        <section class="clean-block clean-blog-list dark" style="background-image: linear-gradient(to left, green,#fde8ec);">
            <div class="container">
                <img class="imghover" src="{{ asset('img/course/accountancy_cover.jpg') }}" alt="Accountancy Cover"
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
@endsection
