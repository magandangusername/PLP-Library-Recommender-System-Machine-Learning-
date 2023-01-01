<div class="clean-blog-post" style="padding:20px; margin: 10px; border-style: inset;">
    <div class="row">
        @if (isset($document_studies))
        @foreach ($document_studies as $document_study)
            {{-- <div class="col-lg-5"><embed src="<?php //echo $links
            ?>" width="100%" height="100%"
                    style="border-style: solid;" /></div> --}}
            <div class="col-lg-7">
                <ul>
                    <li><h3 style="color:black;"><a class="text-decoration-none text-dark" href="{{ route("viewpage",$document_study->document_id) }}">{{ $document_study->title }}</a></h3>
                        <div class="info" style="color:black;"><b>(<span class="text-dark">{{ $document_study->college }} :
                        {{ $document_study->document_type }}&nbsp;- {{ $document_study->document_number }})</b></span>
                        </div>
                        <div class="info text-dark">
                        @if ($document_study->availability == "Available")
                            <b class=" text-success">{{ $document_study->availability }}</b>
                        @else
                            <b class=" text-danger">{{ $document_study->availability }}</b>
                        @endif
                         </div>
                        {{-- <div class="info" style="color:black;"><b>{{ $document_study->availability }}</b>
                            </div> --}}
                        <div class="info" style="color:black;"><span class="text-dark"><h6>TAGS: </h6>
                            <div class="d-inline bg-success text-white rounded-pill">{{ $document_study->tag1 }}
                            </div>&nbsp;|&nbsp;<div class="d-inline bg-success text-white rounded-pill">
                                {{ $document_study->tag2 }}</div>&nbsp;|&nbsp;<div
                                class="d-inline bg-success text-white rounded-pill"> {{ $document_study->tag3 }}
                            </div>&nbsp;|&nbsp;<div class="d-inline bg-success text-white rounded-pill">
                                {{ $document_study->tag4 }}</div>
                        </span></div>
                    </li>

                </ul>

                <br>
            </div>
        @endforeach
        @endif
        @if ($document_studies == null)
        <div class="alert alert-info" role="alert">
            Sorry, no documents found.
        </div>
        @endif
    </div>
</div>
