@extends('layouts.adminapp')

@section('admincontent')

<main>
    <div class="container-fluid px-4">
    <div class="card my-5">
        <div class="card-header">
            <h2>Create New Student Record </h2>
        </div>
            <form class="p-5" method="post" action="addnewstudent.php" enctype="multipart/form-data">
            <fieldset>
                <div class="row my-2">
                    <div class="col-4">
                            <b>Student Number</b>
                            <?php // $totalstudent = $totalstudent + 1?>
                            <input type="hidden" class="form-control" id="studentnumber" name="studentnumber" value= "18000<?php //echo $totalstudent;?>">
                            <input type="text" class="form-control"  disabled value= "18000<?php //echo $totalstudent;?>"> 
                    </div>

                </div>
                <div class="row my-2">
                    <div class="col-4">
                            <b>Student Name</b>
                            <input type="text" class="form-control" id="studentname" name="studentname" title="Fullname" required value=<?php //echo $studentname;?>>
                    </div>

                </div>
                <div class="row my-3">
                    <div class="col-4">
                    <?php
                                //$courses = $conn->query("SELECT DISTINCT(College) FROM tnr_dataset");

                                ?>
                                <b>Course</b>
                                <select id="course" name="course" required>
                                    <option selected="true" disabled="disabled" value="">Course Selection</option>
                                    <?php
                                    //while($course = $courses->fetch_assoc()){
                                    
                                    ?>
                                    <option value="<?php //echo $course['College'] ?>" 
                                    ><?php //echo $course['College'] ?></option>
                                    <?php 
                                    //}
                                    ?>
                                </select>
                    </div>

                </div>

                <div class="row my-2">
                     <b>Bio</b>
                     <div class="col">
                        <textarea rows="4" cols="60" name = "bio" id = "bio"></textarea>
                     </div>
                </div>
                <div class="row my-2">
                    <div class="col-4">
                            <b>Contact Number</b>
                            <input type="text" class="form-control" id="contact" name = "contact" placeholder="0999-999-9999"
                            pattern="09[0-9]{2}[0-9]{3}[0-9]{4}"
                            value=<?php //echo $contact; ?>>
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
                            <b>Password</b>
                            <input type="password" class="form-control" id="password1" name="password1" required value=<?php //$password1; ?> >
                    </div>

                </div>
                <div class="row my-2">
                    <div class="col-4">
                            <b>Confirm Password</b>
                            <input type="password" class="form-control" id="password2" name="password2" onkeyup='check_pass();' required value=<?php //$password2; ?>><span id='message'></span>
                    </div>

                </div>
                <button type="submit" class="btn btn-dark mt-2" id="submit" name="submit">Create New Student Record</button>
            </fieldset>
            </form>

        </div>

        <div class="card my-5">
            <div class="card-header">

               <h2>Student Information Table</h2>
            </div>
            <div class="card-body">
                <table id="datatablerr">
                    <thead>
                        <tr class="text-light bg-dark">
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Course</th>
                            <th>Bio</th>
                            <th>Contact Number</th>
                            <th>Password</th>
                            <th>Profile</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php 
                        //$sql = $conn->query("SELECT user.studentnumber, user.password, profile.student_name, profile.course, profile.addbio, profile.contact_number, profile.profile_image FROM user LEFT JOIN profile on user.profile_id = profile.profile_id "); 
                        // if($sql){   
                        //     while($row = $sql->fetch_assoc()){
                        //         $studentnumber = $row['studentnumber'];
                        //         $studentname = $row['student_name'];
                        //         $course = $row['course'];
                        //         $bio = $row['addbio'];
                        //         $contact = $row['contact_number'];
                        //         $password = $row['password'];
                        //         $profilepic = $row['profile_image']; 
                           
                        
                                ?>
                                <tr>
                                <td><?php //echo $studentnumber; ?></td>
                                <td><?php //echo $studentname; ?></td>
                                <td><?php //echo $course; ?></td>
                                <td><?php //echo $bio; ?></td>
                                <td><?php //echo $contact; ?></td>
                                <td><?php //echo $password; ?></td>
                                <td><img class = "img-fluid" src="data:image;base64,<?php //echo base64_encode($profilepic); ?>" alt="Profile Picture"></td>
                                
                                </tr>
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