@extends('layouts.adminapp')

@section('admincontent')
    <main>
        <div class="container-fluid px-4">

            <div class="card my-5">
                <div class="card-header">

                    <h2>Student Information Table</h2>
                </div>
                <div class="card-body">
                    <table id="datatablerr">
                        <thead>
                            <tr class="text-light bg-dark">
                                <th>Update/Delete</th>
                                <th>Student Number</th>
                                <th>Firstname</th>
                                <th>Surname</th>
                                <th>Year Level</th>
                                <th>College</th>
                                <th>Course</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Student Status</th>
                                <th>Date Added</th>
                                <th>Updated On</th>
                                <th>Password</th>
                                <th>Profile</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            // $sql = $conn->query("SELECT user.user_id, user.studentnumber, user.password, profile.profile_id, profile.student_name, profile.course, profile.addbio, profile.contact_number, profile.profile_image FROM user LEFT JOIN profile on user.profile_id = profile.profile_id ");
                            // if($sql){
                            // while($row = $sql->fetch_assoc()){
                            // $studentnumber = $row['studentnumber'];
                            // $studentname = $row['student_name'];
                            // $course = $row['course'];
                            // $bio = $row['addbio'];
                            // $contact = $row['contact_number'];
                            // $password = $row['password'];
                            // $profilepic = $row['profile_image'];
                            ?>
                            <tr>
                                <td>
                                    <form action="#editaccount" method="post">
                                        <input type="hidden" name="user_id" value="<?php// echo $row['user_id']; ?> ?> ?>">
                                        <input type="hidden" name="profile_id" value="<?php// echo $row['profile_id']; ?> ?> ?>">
                                        <button class="btn btn-outline-dark" name="delete" type="submit"><i
                                                class="fas fa-trash"></i></button>
                                        <button class="btn btn-outline-dark" name="edit" type="submit"><i
                                                class="fas fa-pen"></i></button>
                                    </form>
                                </td>
                                <td><?php //echo $studentnumber;
                                ?></td>
                                <td><?php //echo $studentname;
                                ?></td>
                                <td><?php //echo $course;
                                ?></td>
                                <td><?php //echo $bio;
                                ?></td>
                                <td><?php //echo $contact;
                                ?></td>
                                <td><?php //echo $password;
                                ?></td>
                                <td><?php //echo $studentnumber;
                                ?></td>
                                <td><?php //echo $studentnumber;
                                ?></td>
                                <td><?php //echo $studentnumber;
                                ?></td>
                                <td><?php //echo $studentnumber;
                                ?></td>
                                <td><?php //echo $studentnumber;
                                ?></td>
                                <td><?php //echo $studentnumber;
                                ?></td>
                                <?php //echo $studentnumber;
                                ?></td>

                                <td><img class="img-fluid" src="data:image;base64,<?php// echo base64_encode($profilepic); ?> ?> ?>"
                                        alt="Profile Picture"></td>

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
            // $user_id = $_POST['user_id'];
            // $edit = $conn->query("SELECT * FROM user LEFT JOIN profile on user.profile_id = profile.profile_id WHERE user.user_id = '$user_id'");
            // $edit = $edit->fetch_assoc();
            ?>
            <div class="card my-5">
                <div class="card-header">
                    <h2 id="editaccount">Update Student Information Record </h2>
                </div>
                <form class="p-5" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="row my-2">
                            <div class="col-4">
                                <img src="<?php //echo base64_encode($profilepic); ?>" class="mx-auto my-auto" alt="Student Picture">
                            </div>

                        </div>
                        <div class="row my-3">
                            <div class="col-4">
                                <b>Profile</b>
                                <input type="file" name="profile" accept="image/png, image/gif, image/jpeg, image/jpg" />
                            </div>

                        </div>
                        <div class="row my-2">
                            <div class="col-4">
                                <b>Student Number</b>
                                <input type="text" class="form-control" id="studentnumber" name="studentnumber"
                                    value="<?php //echo $edit['studentnumber']
                                    ?>" disabled>
                            </div>

                        </div>
                        <div class="row my-2">
                            <div class="col-4">
                                <b>Student Firstname</b>
                                <input type="text" class="form-control" id="student_name" name="student_name"
                                    value="<?php //echo $edit['student_name']
                                    ?>">
                            </div>
                            <div class="col-4">
                                <b>Student Surname</b>
                                <input type="text" class="form-control" id="student_name" name="student_name"
                                    value="<?php //echo $edit['student_name']
                                    ?>">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-4">
                                <?php
                                //$courses = $conn->query("SELECT DISTINCT(College) FROM tnr_dataset");
                                ?>
                                <b>Year Level</b>
                                <select id="year_level" name="year_level" required>
                                    <option selected="true" disabled="disabled" value="">Year Level Selection</option>
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
                                <select id="student_college" name="student_college" required>
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
                                <select id="student_course" name="student_course" required>
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

                        <div class="row my-2">
                            <div class="col-4">
                                <b>Contact Number</b>
                                <input type="text" class="form-control" id="contact" name="contact_number"
                                    value="<?php //echo $edit['contact_number']
                                    ?>">
                            </div>

                        </div>

                        <div class="row my-2">
                            <div class="col-4">
                                <b>Email</b>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php //echo $edit['studentnumber']
                                    ?>" disabled>
                            </div>

                        </div>


                        <input type="hidden" name="profile_id" value="<?php //echo $edit['profile_id']
                        ?>">
                        <button type="submit" name="submitedit" class="btn btn-dark mt-2">Update Record</button>
                    </fieldset>
                </form>

            </div>
            <?php
            //}
            ?>
        </div>
    </main>

    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
@endsection
