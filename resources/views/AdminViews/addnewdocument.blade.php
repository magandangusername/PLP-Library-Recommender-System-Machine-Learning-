@extends('layouts.adminapp')

@section('admincontent')

<main>
    <div class="container-fluid px-4">
        <div class="card my-5">
            <div class="card-header">
                <h2>Create New Document Record </h2>
            </div>
            {{-- <form class="p-5" method="post" action="addnewdocument.php" enctype="multipart/form-data"> --}}
                <form action="{{ route('adddocument') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="text" name="deletedocument"
                        value="{{ $document_study->document_id }}" hidden>
                    <button class="btn btn-outline-dark" type="submit"><i
                            class="fas fa-trash"></i></button> --}}
                
                <fieldset>
                    <div class="row my-2">
                        <div class="col-4">
                            <b>Document ID</b>
                            <input type="hidden" class="form-control" id="document_ID" name="document_ID" value='{{ $document_count }}'>
                            <input type="text" class="form-control" readonly value='{{ $document_count + 1}}'>
                        </div>

                    </div>
                    <div class="row my-2">
                        <div class="col-4">
                            <b>Document Number</b>
                            <input type="text" class="form-control" value='{{ $document_studies[0]->document_number}}'>
                        </div>

                    </div>
                    <div class="row my-2">
                        <div class="col-4">
                            <b>Title</b>
                            <input type="text" class="form-control" id="title" name="title" title="Title" required value="">
                        </div>

                    </div>
                    <div class="row my-2">
                        <div class="col-4">
                            <b>Author</b>
                            <input type="text" class="form-control" id="author" name="author" title="Author" required value="">
                        </div>

                    </div>
                    <div class="row my-2">
                        <div class="col-4">
                            <b>Month-Year</b>
                            <input type="text" class="form-control" id="year" name="year" title="Year" required value="">
                        </div>

                    </div>
                    <div class="row my-3">
                        <div class="col-4">
                            <b>College</b>
                            <select id="college" name="college" required>
                                <option selected="true" value="" disabled>College Selection</option>
                                @foreach ($college as $colleges)
                                            <option value="{{ $colleges->college }}">{{ $colleges->college }}
                                            </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="row my-3">
                        <div class="col-4">
                            <b>Document Type</b>
                            <select id="document_type" name="document_type" required>
                                <option selected="true" value="" disabled>Document Type Selection</option>
                                <option value="Thesis" >Thesis</option>
                                <option value="Research" >Research</option>
                            </select>
                        </div>

                    </div>
                    <div class="row my-3">
                        <div class="col-4">
                            <b>Document Status</b>
                            <select id="document_status" name="document_status" required>
                                <option selected="true" value="" disabled>Document Status Selection</option>
                                <option value="Unpublished Document">Unpublished Document</option>
                                <option value="Published Document">Published Document</option>
                            </select>
                        </div>

                    </div>
                     <input type="text" name="addnew" value="{{ $adddocument->compiled_tag_ID }}" hidden> 
                    <div class="row my-2">
                        <div class="col-4">
                            <b>Tag 1</b>
                            <input type="text" class="form-control" id="tag" name="tag" title="tag1" required value="">
                        </div>

                    </div>
                    <div class="row my-2">
                        <div class="col-4">
                            <b>Tag 2</b>
                            <input type="text" class="form-control" id="tag2" name="tag2" title="tag2" required value="">
                        </div>

                    </div>
                    <div class="row my-2">
                        <div class="col-4">
                            <b>Tag 3</b>
                            <input type="text" class="form-control" id="tag3" name="tag3" title="tag3" required value="">
                        </div>

                    </div>
                    <div class="row my-2">
                        <div class="col-4">
                            <b>Tag 4</b>
                            <input type="text" class="form-control" id="tag4" name="tag4" title="tag4" required value="">
                        </div>

                    </div>
                    <div class="row my-3">
                        <div class="col-4">
                            <?php
                            //$colleges = $conn->query("SELECT DISTINCT(College) FROM tnr_dataset");

                            ?>
                            <b>Added by</b>
                            <select id="addedby" name="addedby" required>
                                <option selected="true" value="" disabled>Added By Selection</option>
                                <option value="Librarian">Librarian</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                    </div>
                    <div class="row my-2">
                        <div class="col-4">
                            <b>Date Submitted</b>
                            <input type="date" class="form-control" id="date_submitted" name="date_submitted" title="Date Submitted" required>
                        </div>

                    </div>

                    {{-- <div class="row my-2">
                        <b>Content</b>
                        <div class="col">
                            <textarea rows="4" cols="60" name="content" id="content"></textarea>
                        </div>
                    </div> --}}
                    {{-- <div class="row my-2">
                        <b>Upload File (PDF Format Only)</b>
                        <div class="col">
                            <input type="file" name="pdffile" id="pdffile" accept=".pdf">
                        </div>
                    </div> --}}
                    <button type="submit" class="btn btn-dark mt-2" id="adddocument" name="adddocument">Create New Document Record</button>
                </fieldset>
            </form>

        </div>
        <?php
        

        
        ?>

<div class="card my-5">
    <div class="card-header">
        <h3>Document Information</h3>

    </div>
    <div class="card-body">
        <table id="datatableru">
            <thead>
                <tr class="text-light bg-dark">
                    <th>Document ID</th>
                    <th>Document Number</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date Submitted</th>
                    <th>Document Type</th>
                    <th>Added By</th>
                    <th>Document Status</th>
                    <th>College</th>
                    <th>Course</th>
                    <th>1st Tag</th>
                    <th>2nd Tag</th>
                    <th>3rd Tag</th>
                    <th>4th Tag</th>
                    <th>Views</th>
                    <th>Created At</th>
                    <th>Updated On</th>
                </tr>
            </thead>

            <tbody>
                <?php
                // $sql = $conn->query("SELECT * FROM tnr_dataset;");
                // if($sql){
                //     while($row = $sql->fetch_assoc()){
                //         $documentID = $row['documentID'];
                //         $title = $row['Title'];
                //         $author = $row['Author'];
                //         $year = $row['Year'];
                //         $kind = $row['Kind_of_Paper'];
                //         $college = $row['College'];
                //         $content = $row['Content'];
                //         $links = $row['Links'];
                ?>
                @foreach ($document_studies as $document_study)
                    <tr>
                        <td>{{ $document_study->document_id }}</td>
                        <td>{{ $document_study->document_number }}</td>
                        <td>{{ $document_study->title }}</td>
                        <td>{{ $document_study->author }}</td>
                        <td>{{ $document_study->date_submitted }}</td>
                        <td>{{ $document_study->document_type }}</td>
                        <td>{{ $document_study->addedby }}</td>
                        <td>{{ $document_study->document_status }}</td>
                        <td>{{ $document_study->college }}</td>
                        <td>{{ $document_study->course }}</td>
                        <td>{{ $document_study->tag1 }}</td>
                        <td>{{ $document_study->tag2 }}</td>
                        <td>{{ $document_study->tag3 }}</td>
                        <td>{{ $document_study->tag4 }}</td>
                        <td>{{ $document_study->views_count }}</td>
                        <td>{{ $document_study->created_at }}</td>
                        <td>{{ $document_study->updated_on }}</td>
                    </tr>
                @endforeach
                <?php
                //  }
                // }
                ?>


            </tbody>

        </table>

    </div>

</div>


    </div>

</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="../js/datatables-simple-demo.js"></script>




@endsection