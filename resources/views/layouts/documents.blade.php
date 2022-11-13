<div class="clean-blog-post" style="padding:20px; margin: 10px; border-style: inset;">
    <div class="row">
        @if ($document_studies == null)
            <div class="alert alert-info" role="alert">
                Sorry, no documents found.
            </div>
        @endif
            <div class="col-lg-7">
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
                <div class="info" style="color:black;"><span class="text-dark">
                        <div class="d-inline bg-success text-white rounded-pill">{{ $document_studies->tag1 }}
                        </div>&nbsp;|&nbsp;<div class="d-inline bg-success text-white rounded-pill">
                            {{ $document_studies->tag2 }}</div>&nbsp;|&nbsp;<div
                            class="d-inline bg-success text-white rounded-pill"> {{ $document_studies->tag3 }}
                        </div>&nbsp;|&nbsp;<div class="d-inline bg-success text-white rounded-pill">
                            {{ $document_studies->tag4 }}</div>
                    </span></div>
                <br> <br>
            </div>
    </div>
</div>