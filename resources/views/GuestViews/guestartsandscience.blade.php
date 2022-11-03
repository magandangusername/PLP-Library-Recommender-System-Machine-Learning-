<div>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button"
        style="background-image: linear-gradient(to left, green,#fde8ec);">
        <div class="container">
            <div class="container-fluid">
                <b>
                    <h4>Arts and Science</h4>
                </b>
            </div>
        </div>
    </nav>
</div>
<section class="clean-block clean-blog-list dark" style="background-image: linear-gradient(to left, green,#fde8ec);">
    <div class="container">
        <img class="imghover" src="{{ asset('img/course/accountancy_banner1.jpg') }}" alt="Arts and Science Cover"
            style="height:300px; width:100%; border-style: inset;">
    </div>
</section>
<br>
<main class="page blog-post-list">
    <section class="clean-block clean-blog-list dark"
        style="background-image: linear-gradient(to left, green,#fde8ec);">
        <div class="container">
            <div class="clean-blog-post" style="padding:20px; margin: 10px; border-style: inset;">
                <div class="row">
                    @if ($document_studies == null)
                        <div class="alert alert-info" role="alert">
                            Sorry, no documents found.
                        </div>
                    @endif
                    @foreach ($document_studies as $document_study)
                        {{-- <div class="col-lg-5"><embed src="<?php //echo $links
                        ?>" width="100%" height="100%"
                                style="border-style: solid;" /></div> --}}
                        <div class="col-lg-7">
                            <ul>
                                <li><h3 style="color:black;"><a class="text-decoration-none text-dark" href="">{{ $document_study->title }}</a></h3>
                                    <div class="info" style="color:black;"><span class="text-dark">
                                        <h6>TAGS: </h6>
                                        <div class="d-inline bg-success text-white rounded-pill">{{ $document_study->tag1 }}
                                        </div>&nbsp;|&nbsp;<div class="d-inline bg-success text-white rounded-pill">
                                            {{ $document_study->tag2 }}</div>&nbsp;|&nbsp;<div
                                            class="d-inline bg-success text-white rounded-pill"> {{ $document_study->tag3 }}
                                        </div>&nbsp;|&nbsp;<div class="d-inline bg-success text-white rounded-pill">
                                            {{ $document_study->tag4 }}</div>
                                    </span></div>
                                </li>
                                
                            </ul>
                            {{-- <div class="info" style="color:black;"><span class="text-dark">Submitted on
                                    {{ $document_study->date_submitted }} by:</span></div>
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
                            <br><br>
                        </div>
                    @endforeach
                </div>
            </div>
            
        </div>
    </section>
</main>

