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
    <th>Title</th>
    <th>Author</th>
    <th>Year</th>
    <th>Kind of Paper</th>
    <th>College</th>
    <th>Content</th>
    <th>Links</th>
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
        <b>Year</b>
        <input type="text" class="form-control" id="year" name="year" value="<?php //echo $edit['Year'] ?>">
        </div>
    </div>

    <div class="row my-3">
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
    </div>
    
    <div class="row my-3">
        <div class="col-4">
        <?php
        //$courses = $conn->query("SELECT DISTINCT(College) FROM tnr_dataset");

        ?>
        <b>College</b>
            <select id="course" name="college" required>
            <option selected="true" disabled="disabled" value="">Course Selection</option>
            <?php
            //while($course = $courses->fetch_assoc()){

            ?>
            <option value="<?php //echo $course['College'] ?>" 
            <?php 
            //if($edit['College'] == $course['College']){
            //echo "selected";
            //}
            ?>
            ><?php //echo $course['College'] ?></option>
            <?php 
            //}
            ?>
            </select>
        </div>
    </div>

    <div class="row my-2">
    <b>Content</b>
    <div class="col">
    <textarea rows="4" cols="60" name="content" ><?php //echo $edit['Content'] ?></textarea>
    </div>
    </div>
    <div class="row my-2">
        <div class="col-4">
            <b>Links</b>
            <input type="text" class="form-control" id="links" name="links" value="<?php //echo $edit['Links'] ?>">
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