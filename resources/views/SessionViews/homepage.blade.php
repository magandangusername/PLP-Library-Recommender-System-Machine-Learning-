@extends('layouts.homeapp')
@section('homecontent')
    @auth
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button"
            style="background-image: linear-gradient(to left, green,#fde8ec);">
            <div class="container">
                <div>
                    <b>
                        @if (isset($search))
                            <h4 class="d-inline">Search Results</h4>
                        @else
                            <h4 class="d-inline">Recommendation</h4>
                        @endif

                    </b>
                </div>
                {{-- <button class="btn btn-primary d-inline marg" onClick="window.print()">Print Result</button> --}}
                <a class="text-light text-decoration-none" href="" onClick="toPrint()"><button
                        class="btn btn-primary d-inline marg">Print / Save</button></a>
            </div>
        </nav>
    </div>
    @endauth
    {{-- <section class="clean-block clean-blog-list dark" style="background-image: linear-gradient(to left, green,#fde8ec);">
        <div class="container">
            <img class="imghover" src="{{ asset('img/course/PLP_cover.jpg') }}" alt="PLP Cover" style="height:300px; width:100%; border-style: inset;" >
        </div>
        </section> --}}
    <br>
    @guest
    <main class="page blog-post-list" id="toPrint">
        <section class="clean-block clean-blog-list dark"
            style="background-image: linear-gradient(to left, green,#fde8ec);">
            <div class="container">
                <div class="block-content">
                    @if (!isset($search))
                    <br><br><br><br>
                        @endif

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
                    @if (!isset($search))
                    <br><br><br><br>
                        @endif

                        @if (isset($search))
                            <h4 class="d-inline">Search Results</h4>
                            @include('layouts.documenttitles')
                        @endif


                </div>
            </div>
        </section>
    </main>
    @endguest
    @auth
    <main class="page blog-post-list" id="toPrint">
        <section class="clean-block clean-blog-list dark"
            style="background-image: linear-gradient(to left, green,#fde8ec);">
            <div class="container">
                <div class="block-content" style="border-style: inset;">


                    @include('layouts.documenttitles')

                    <br>
                    <div class="d-flex justify-content-center">

                    </div>
                </div>
            </div>
        </section>
    </main>
    @endauth

    <script>
        function toPrint() {

            var cssLinkTag = document.getElementById("headcss");
            var prtContent = document.getElementById("toPrint");
            var elements = document.querySelectorAll("#tags");

            for (var i = 0; i < elements.length; i++) {
                elements[i].style.display = "none";
            }


            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');

            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.write(cssLinkTag.innerHTML);
            WinPrint.document.close();
            sleep(80).then(() => {
                WinPrint.focus();
                WinPrint.print();
                WinPrint.close();
                //tags.style.display === "block";
            });


        }

        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }
    </script>


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/script.min.js"></script> --}}
@endsection
