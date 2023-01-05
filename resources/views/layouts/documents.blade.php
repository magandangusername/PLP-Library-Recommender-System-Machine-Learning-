<div class="clean-blog-post" style="padding:20px; margin: 10px; border-style: inset;">
    <div class="row">
        @if ($document_studies == null)
            <div class="alert alert-info" role="alert">
                Sorry, no documents found.
            </div>
        @endif
        <div class="container">
            <div class="row">
              <div class="col-12 d-flex justify-content-center mb-4"><h3 style="color:black;">{{ $document_studies->title }}</h3> </div>
              <div class="col-6"><div class="info" style="color:black;"><span class="text-dark">Submitted on
                <b>20{{ $document_studies->date_submitted }}</b></span></div>
        <div class="info" style="color:black;"><span class="text-dark">by:&nbsp;<b>{{ $document_studies->author }}</b></span>
        </div>
        <div class="info" style="color:black;">(<span class="text-dark">Document
                Type: <b>{{ $document_studies->document_type }})</b> <br>
                (Document ID:&nbsp; <b>{{ $document_studies->document_number }}</b>)</span>
        </div>
        <div class="info" style="color:black;">(<span class="text-dark">Document
            Status: <b>{{ $document_studies->document_status }}</b>)</span>
        </div>
        <div class="info" style="color:black;"><span class="text-dark"><b>{{ $document_studies->college }}</b>
                &nbsp; <br><b>{{ $document_studies->course }}</b></span></div>
        <div class="info" style="color:black;"><span class="text-dark">Added
                by <b>{{ $document_studies->addedby }}</b></span></div>
        <div class="info text-dark">
            @if ($document_studies->availability == "Available")
                            <b class=" text-success">{{ $document_studies->availability }}</b>
                        @else
                            <b class=" text-danger">{{ $document_studies->availability }}</b>
                        @endif
        </div>
        <br>
        <b>Tags:</b>
        <div class="info" style="color:black;"><span class="text-dark">
                <div class="d-inline bg-success text-white rounded-pill">{{ $document_studies->tag1 }}
                </div>&nbsp;|&nbsp;<div class="d-inline bg-success text-white rounded-pill">
                    {{ $document_studies->tag2 }}</div>&nbsp;|&nbsp;<div
                    class="d-inline bg-success text-white rounded-pill"> {{ $document_studies->tag3 }}
                </div>&nbsp;|&nbsp;<div class="d-inline bg-success text-white rounded-pill">
                    {{ $document_studies->tag4 }}</div>
            </span></div></div>
              <div class="col info text-dark" style="text-align: justify;" ><b>Abstract: </b>
                <p style="text-indent: 50px;">{{ $document_studies->abstract }}</p>
              </div>
            </div>
          </div>
            {{-- <div class="col-lg-7">
                <h3 style="color:black;">{{ $document_studies->title }}</h3>
                <div class="info" style="color:black;"><span class="text-dark">Submitted on
                        {{ $document_studies->date_submitted }} by:</span></div>
                <div class="info" style="color:black;"><span class="text-dark">{{ $document_studies->author }}</span>
                </div>
                <div class="info" style="color:black;">(<span class="text-dark">Document
                        Type: {{ $document_studies->document_type }}&nbsp;- {{ $document_studies->document_number }})</span>
                </div>
                <div class="info" style="color:black;"><span class="text-dark">{{ $document_studies->college }}
                        &nbsp;- {{ $document_studies->course }}</span></div>
                <div class="info" style="color:black;"><span class="text-dark">Added
                        by {{ $document_studies->addedby }}</span></div>
                <div class="info text-dark">Availability: {{ $document_studies->availability }}</div>
                <br>
                <div class="info" style="color:black;"><span class="text-dark">
                        <div class="d-inline bg-success text-white rounded-pill">{{ $document_studies->tag1 }}
                        </div>&nbsp;|&nbsp;<div class="d-inline bg-success text-white rounded-pill">
                            {{ $document_studies->tag2 }}</div>&nbsp;|&nbsp;<div
                            class="d-inline bg-success text-white rounded-pill"> {{ $document_studies->tag3 }}
                        </div>&nbsp;|&nbsp;<div class="d-inline bg-success text-white rounded-pill">
                            {{ $document_studies->tag4 }}</div>
                    </span></div>
                <br> <br>
            </div> --}}
    </div>
</div>
