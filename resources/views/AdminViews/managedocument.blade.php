@extends('layouts.adminapp')

@section('admincontent')
    <main>
        @if (isset($_GET['success']))
            <div class="alert alert-success" role="alert">
                {{ $_GET['success'] }}
            </div>
        @endif
        @if (isset($_GET['error']))
            <div class="alert alert-danger" role="alert">
                {{ $_GET['error'] }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </div>
        @endif
        <div class="container-fluid px-4">

            <div class="card my-5">
                <div class="card-header">

                    <h2>Document Information Table</h2>
                </div>
                <div class="card-body">
                    <table id="datatablerr">
                        <thead>
                            <tr class="text-light bg-dark">
                                <th></th>
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
                            // $sql = $conn->query("SELECT * from tnr_dataset");
                            // if($sql){
                            // while($row = $sql->fetch_assoc()){
                            //     $documentID = $row['ID'];
                            //     $title = $row['Title'];
                            //     $author = $row['Author'];
                            //     $year = $row['Year'];
                            //     $kind = $row['Kind_of_Paper'];
                            //     $college = $row['College'];
                            //     $content = $row['Content'];
                            //     $links = $row['Links'];
                            ?>
                            @foreach ($document_studies as $document_study)
                                <tr>
                                    <td>
                                        <form action="{{ route('modifydocument') }}" method="post">
                                            @csrf
                                            <input type="text" name="deletedocument"
                                                value="{{ $document_study->document_id }}" hidden>
                                            <button class="btn btn-outline-dark" type="submit"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                        <form action="{{ route('modifydocument') . '#update' }}" method="post">
                                            @csrf
                                            <input type="text" name="editdocument"
                                                value="{{ $document_study->document_id }}" hidden>
                                            <button class="btn btn-outline-dark" type="submit"><i
                                                    class="fas fa-pen"></i></button>
                                        </form>
                                    </td>
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
                            //}
                            //}
                            ?>

                        </tbody>

                    </table>

                </div>

            </div>

            <?php //if (isset($_POST['edit'])) {
            // $documentID = $_POST['documentID'];
            // $edit = $conn->query("SELECT * FROM tnr_dataset WHERE ID = '$documentID'");
            // $edit = $edit->fetch_assoc();
            ?>
            @if (isset($edit))
                <div class="card my-5" id="update">
                    <div class="card-header">
                        <h2 id="editdocument">Update Document Information Record </h2>
                    </div>
                    <form class="p-5" action="{{ route('modifydocument') }}" method="post">
                        @csrf
                        <fieldset>
                            <div class="row my-2">
                                <div class="col-4">
                                    <b>Document Number</b>
                                    <input type="text" class="form-control" id="documentID" name="document_ID"
                                        value="{{ $editdocument->document_id }}" readonly>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-4">
                                    <b>Title</b>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $editdocument->title }}">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-4">
                                    <b>Author</b>
                                    <input type="text" class="form-control" id="author" name="author"
                                        value="{{ $editdocument->author }}">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-4">
                                    <b>Date Submitted</b>
                                    <input type="date" class="form-control" id="year" name="date_submitted"
                                        value="{{ $editdocument->date_submitted }}">
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-4">
                                    <?php
                                    //$courses = $conn->query("SELECT DISTINCT(College) FROM tnr_dataset");
                                    ?>
                                    <b>Document Type</b>
                                    <select id="document_type" name="document_type" required>
                                        @foreach ($document_types as $document_type)
                                            <option selected="true" value="{{ $document_type->document_type }}">
                                                {{ $document_type->document_type }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="row my-3">
                                <div class="col-4">
                                    {{-- <b>College</b>
                                    <select id="documenty_college" name="document_college" required>
                                        <option selected="true" disabled="disabled" value="">College Selection
                                        </option>
                                    </select> --}}
                                </div>

                            </div>

                            <div class="row my-3">
                                <div class="col-4">
                                    <?php
                                    //$courses = $conn->query("SELECT DISTINCT(College) FROM tnr_dataset");
                                    ?>
                                    <b>Course</b>
                                    <select id="document_course" name="course_id" required>
                                        @foreach ($courses as $course)
                                            <option selected="true" value="{{ $course->course_ID }}">{{ $course->course }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <input type="text" name="submitedit" value="{{ $editdocument->compiled_tag_ID }}" hidden>

                            <div class="row my-2">
                                <div class="col-4">
                                    <b>Tag 1</b>
                                    <input type="text" class="form-control" id="tag1" name="tag1"
                                        value="{{ $editdocument->tag1 }}">
                                </div>
                                <div class="col-4">
                                    <b>Tag 2</b>
                                    <input type="text" class="form-control" id="tag2" name="tag2"
                                        value="{{ $editdocument->tag2 }}">
                                </div>
                                <div class="col-4">
                                    <b>Tag 3</b>
                                    <input type="text" class="form-control" id="tag3" name="tag3"
                                        value="{{ $editdocument->tag3 }}">
                                </div>
                                <div class="col-4">
                                    <b>Tag 4</b>
                                    <input type="text" class="form-control" id="tag4" name="tag4"
                                        value="{{ $editdocument->tag4 }}">
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-4">
                                    <?php
                                    //$courses = $conn->query("SELECT DISTINCT(College) FROM tnr_dataset");
                                    ?>
                                    <b>Document Status</b>
                                    <select id="document_course" name="document_status" required>
                                        <option @if ($editdocument->document_status == 'Unpublished Document') selected="true" @endif
                                            value="Unpublished Document">Unpublished Document</option>
                                        <option @if ($editdocument->document_status == 'Published Document') selected="true" @endif
                                            value="Published Document">Published Document</option>
                                    </select>
                                </div>

                            </div>


                            <!-- <input type="hidden" name="ID" value="<?php //echo $edit['profile_id']
                            ?>"> -->
                            <button type="submit" name="submit" class="btn btn-dark mt-2">Update
                                Record</button>
                        </fieldset>
                    </form>

                </div>
            @endif
            <?php
            //}
            ?>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
@endsection
