@extends('layouts.app')
@section('content')
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
    {{-- <section class="clean-block clean-blog-list dark" style="background-image: linear-gradient(to left, green,#fde8ec);">
        <div class="container">
            <img class="imghover" src="{{ asset('img/course/PLP_cover.jpg') }}" alt="PLP Cover" style="height:300px; width:100%; border-style: inset;" >
        </div>
        </section> --}}
    <br>
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

    <script>
        function toPrint() {

            var cssLinkTag = document.getElementById("headcss");
            var prtContent = document.getElementById("toPrint");

            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.write(cssLinkTag.innerHTML)
            WinPrint.document.close();
            sleep(80).then(() => {
                WinPrint.focus();
                WinPrint.print();
                WinPrint.close();

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
