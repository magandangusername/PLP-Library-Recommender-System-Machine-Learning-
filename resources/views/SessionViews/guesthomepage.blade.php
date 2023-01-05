@extends('layouts.app4')
@section('content4')
    <br>
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
                    <b>
                        @if (isset($search))
                            <h4 class="d-inline">Search Results</h4>
                            @include('layouts.documenttitles')
                        @endif

                    </b>
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
