@extends('layouts.app')
@section('content')
    @if(Auth::check())
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
            <div class="clean-blog-post" style="padding:20px; margin: 10px; border-style: inset;">
                <div class="row">
                    @if ($document_studies == null)
                        <div class="alert alert-info" role="alert">
                            Sorry, no documents found.
                        </div>
                    @endif
                    {{-- @foreach ($document_studies as $document_study) --}}
                      
                        <div class="col-lg-7">
                            <h3 style="color:black;">{{ $document_studies->$title }}</h3>
                            <div class="info" style="color:black;"><span class="text-dark">Submitted on
                                    {{ $document_studies[0]->date_submitted }} by:</span></div>
                            <div class="info" style="color:black;"><span class="text-dark">{{ $document_study->author }}</span>
                            </div>
                            <div class="info" style="color:black;">(<span class="text-dark">Document
                                    Type: {{ $document_study->document_type }}&nbsp;- {{ $document_study->document_number }})</span>
                            </div>
                            <div class="info" style="color:black;"><span class="text-dark">{{ $document_study->college }}
                                    &nbsp;- {{ $document_study->course }}</span></div>
                            <div class="info" style="color:black;"><span class="text-dark">Added
                                    by {{ $document_study->addedby }}</span></div>
                            <div class="info" style="color:black;"><span class="text-dark">
                                    <div class="d-inline bg-success text-white rounded-pill">{{ $document_study->tag1 }}
                                    </div>&nbsp;|&nbsp;<div class="d-inline bg-success text-white rounded-pill">
                                        {{ $document_study->tag2 }}</div>&nbsp;|&nbsp;<div
                                        class="d-inline bg-success text-white rounded-pill"> {{ $document_study->tag3 }}
                                    </div>&nbsp;|&nbsp;<div class="d-inline bg-success text-white rounded-pill">
                                        {{ $document_study->tag4 }}</div>
                                </span></div>
                            {{-- <button class="btn btn-outline-primary btn-sm" type="button"><a href="<?php //echo $links
                            ?>">Download PDF
                                    here</a></button>&nbsp;&nbsp;<button class="btn btn-outline-primary btn-sm" type="button"><a
                                    href="<?php ?>">Add
                                    to Favorites</a></button>&nbsp;<br><br> --}}
                            <br> <br>
                        </div>
                    {{-- @endforeach --}}
                </div>
            </div>
            
        </main>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/script.min.js"></script> --}}
    @else
        @include('GuestViews.guestaccountancy')
    @endif
@endsection
