@extends('layouts.adminapp')

@section('admincontent')

<main>
    <div class="container-fluid px-4">

    <div class="card my-5">
    <div class="card-header">

    <h2>Document Information Table</h2>
    </div>
    <div class="card-body">
    <table id="datatablerr">
    <thead>
    <tr class="text-light bg-dark">
    <th>Update/Delete</th>
    <th>Document ID</th>
    <th>Document Number</th>
    <th>Title</th>
    <th>Author</th>
    <th>Date Submitted</th>
    <th>Document Type</th>
    <th>College</th>
    <th>Course</th>
    <th>1st Tag</th>
    <th>2nd Tag</th>
    <th>3rd Tag</th>
    <th>4th Tag</th>
    <th>Document Status</th>
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
    <tr>
    <td>
    <form action="#editdocument" method="post">
    <input type="hidden" name="documentID" value="<?php //echo $row['ID']; ?>">
    <button class="btn btn-outline-dark" name="delete" type="submit"><i class="fas fa-trash"></i></button>
    <button class="btn btn-outline-dark" name="edit" type="submit"><i class="fas fa-pen"></i></button>
    </form>
    </td>
    <td><?php //echo $documentID; ?></td>
    <td><?php //echo $title; ?></td>
    <td><?php //echo $author; ?></td>
    <td><?php //echo $year; ?></td>
    <td><?php //echo $kind; ?></td>
    <td><?php //echo $college; ?></td>
    <td><?php //echo $content; ?></td>
    <td><?php //echo $links; ?></td>
    <td><?php //echo $links; ?></td>
    <td><?php //echo $links; ?></td>
    <td><?php //echo $links; ?></td>
    <td><?php //echo $links; ?></td>
    <td><?php //echo $links; ?></td>
    <td><?php //echo $links; ?></td>
    <td><?php //echo $links; ?></td>
    </tr>
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
    <div class="card my-5">
    <div class="card-header">
    <h2 id="editdocument">Update Document Information Record </h2>
    </div>
    <form class="p-5" method="post" enctype="multipart/form-data">
    <fieldset>
    <div class="row my-2">
        <div class="col-4">
        <b>Document Number</b>
        <input type="text" class="form-control" id="documentID" name="documentID" value="<?php //echo $edit['ID'] ?>" disabled>
        </div>
    </div>

    <div class="row my-2">
        <div class="col-4">
        <b>Title</b>
        <input type="text" class="form-control" id="title" name="title" value="<?php //echo $edit['Title'] ?>">
        </div>
    </div>
    <div class="row my-2">
        <div class="col-4">
        <b>Author</b>
        <input type="text" class="form-control" id="author" name="author" value="<?php //echo $edit['Author'] ?>">
        </div>
    </div>
    <div class="row my-2">
        <div class="col-4">
        <b>Date Submitted</b>
        <input type="date" class="form-control" id="year" name="year" value="<?php //echo $edit['Year'] ?>">
        </div>
    </div>

    <div class="row my-3">
        <div class="col-4">
            <?php
            //$courses = $conn->query("SELECT DISTINCT(College) FROM tnr_dataset");
            ?>
            <b>Document Type</b>
            <select id="document_type" name="document_type" required>
                <option selected="true" disabled="disabled" value="">Document Type</option>
                <?php
                //while($course = $courses->fetch_assoc()){
                ?>
                <option value="<?php //echo $course['College']
                ?>" {{-- <?php
                // if($edit['course'] == $course['College']){
                // echo "selected";
                // }
                ?> --}} <?php //echo $course['College']
                ?>>
                </option>
                <?php
                //}
                ?>
            </select>
        </div>

    </div>

    <div class="row my-3">
        <div class="col-4">
            <?php
            //$courses = $conn->query("SELECT DISTINCT(College) FROM tnr_dataset");
            ?>
            <b>College</b>
            <select id="documenty_college" name="document_college" required>
                <option selected="true" disabled="disabled" value="">College Selection</option>
                <?php
                //while($course = $courses->fetch_assoc()){
                ?>
                <option value="<?php //echo $course['College']
                ?>" {{-- <?php
                // if($edit['course'] == $course['College']){
                // echo "selected";
                // }
                ?> --}} <?php //echo $course['College']
                ?>>
                </option>
                <?php
                //}
                ?>
            </select>
        </div>

    </div>

    <div class="row my-3">
        <div class="col-4">
            <?php
            //$courses = $conn->query("SELECT DISTINCT(College) FROM tnr_dataset");
            ?>
            <b>Course</b>
            <select id="document_course" name="document_course" required>
                <option selected="true" disabled="disabled" value="">Course Selection</option>
                <?php
                //while($course = $courses->fetch_assoc()){
                ?>
                <option value="<?php //echo $course['College']
                ?>" {{-- <?php
                // if($edit['course'] == $course['College']){
                // echo "selected";
                // }
                ?> --}} <?php //echo $course['College']
                ?>>
                </option>
                <?php
                //}
                ?>
            </select>
        </div>

    </div>

    {{-- <div class="row my-3">
        <div class="col-4">
        <?php
        //$kinds = $conn->query("SELECT DISTINCT(Kind_of_Paper) FROM tnr_dataset");

        ?>
        <b>Kind of Paper</b>
            <select id="kind" name="kind" required>
            <option selected="true" disabled="disabled" value="">Kind of paper</option>
            <?php
            //while($kind = $kinds->fetch_assoc()){

            ?>
            <option value="<?php //echo $kind['Kind_of_Paper'] ?>" 
            <?php 
            //if($edit['Kind_of_Paper'] == $kind['Kind_of_Paper']){
            //echo "selected";
            //}
            ?>
            ><?php //echo $kind['Kind_of_Paper'] ?></option>
            <?php 
            //}
            ?>
            </select>
        </div>
    </div> --}}
    
    <div class="row my-2">
        <div class="col-4">
            <b>Tag 1</b>
            <input type="text" class="form-control" id="tag1" name="tag1"
                value="<?php //echo $edit['student_name']
                ?>">
        </div>
        <div class="col-4">
            <b>Tag 2</b>
            <input type="text" class="form-control" id="tag2" name="tag2"
                value="<?php //echo $edit['student_name']
                ?>">
        </div>
        <div class="col-4">
            <b>Tag 3</b>
            <input type="text" class="form-control" id="tag3" name="tag3"
                value="<?php //echo $edit['student_name']
                ?>">
        </div>
        <div class="col-4">
            <b>Tag 4</b>
            <input type="text" class="form-control" id="tag4" name="tag4"
                value="<?php //echo $edit['student_name']
                ?>">
        </div>
    </div>

    <div class="row my-3">
        <div class="col-4">
            <?php
            //$courses = $conn->query("SELECT DISTINCT(College) FROM tnr_dataset");
            ?>
            <b>Document Status</b>
            <select id="document_course" name="document_course" required>
                <option selected="true" disabled="disabled" value="">Document Status</option>
                <?php
                //while($course = $courses->fetch_assoc()){
                ?>
                <option value="<?php //echo $course['College']
                ?>" {{-- <?php
                // if($edit['course'] == $course['College']){
                // echo "selected";
                // }
                ?> --}} <?php //echo $course['College']
                ?>>
                </option>
                <?php
                //}
                ?>
            </select>
        </div>

    </div>

    
    <!-- <input type="hidden" name="ID" value="<?php //echo $edit['profile_id'] ?>"> -->
    <button type="submit" name="submitedit" class="btn btn-dark mt-2">Update Record</button>
    </fieldset>
    </form>

    </div>
    <?php
    //}
    ?>
    </div>
    </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="../js/datatables-simple-demo.js"></script>




@endsection