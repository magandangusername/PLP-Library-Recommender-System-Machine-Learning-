@extends('layouts.adminapp')

@section('admincontent')

            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Overview</h1>

                    <div class="row mt-5">

                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info text-dark mb-4">
                                <div class="card-body"><b>Total Registered student of PLP:</b> <?php //echo $totalstudent ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Accountancy Student:</b> <?php //echo $totalaccountancy ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Computer Science Student:</b> <?php //echo $totalcomputerscience ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Education Student:</b> <?php //echo $totaleducation?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Hotel Management Student:</b> <?php //echo $totalhotelmanagement ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Nursing Student:</b> <?php //echo $totalnursing ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-dark mb-4">
                                <div class="card-body "><b>Total of documents from all colleges:</b> <?php //echo $totalaccthesis + $totalcomputerthesis + $totaleducthesis + $totalhmthesis + $totalnursingthesis + $totalaccresearch + $totalcomputerresearch + $totaleducresearch + $totalhmresearch + $totalnursingresearch?></div>

                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-dark mb-4">
                                <div class="card-body "><b>Total of Thesis documents from all colleges:</b> <?php //echo $totalaccthesis + $totalcomputerthesis + $totaleducthesis + $totalhmthesis + $totalnursingthesis ?></div>

                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-dark mb-4">
                                <div class="card-body"><b>Total of Research documents from all colleges:</b> <?php //echo $totalaccresearch + $totalcomputerresearch + $totaleducresearch + $totalhmresearch + $totalnursingresearch ?></div>

                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                             <div class="card bg-info bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Accountancy Documents:</b> <?php //echo $totalaccdocument ?></div>
                             </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                             <div class="card bg-info bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Accountancy Thesis:</b> <?php //echo $totalaccthesis ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Accountancy research:</b> <?php //echo $totalaccresearch ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Computer Science Documents:</b> <?php //echo $totalcomsciedocument ?></div>        
                                </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Computer Science Thesis:</b> <?php //echo $totalcomputerthesis ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Computer Science Research:</b> <?php //echo $totalcomputerresearch ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Education Documents:</b> <?php //echo $totaleducdocument ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Education Thesis:</b> <?php //echo $totaleducthesis ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Education Research:</b> <?php //echo $totaleducresearch ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Hotel Management Documents:</b> <?php //echo $totalhmdocument ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Hotel Management Thesis:</b> <?php //echo $totalhmthesis ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Hotel Management Research:</b> <?php //echo $totalhmresearch?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Nursing Documents:</b> <?php //echo $totalnursdocument ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Nursing Thesis:</b> <?php //echo $totalnursingthesis ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning bg-outline-dark text-dark mb-4">
                                <div class="card-body"><b>Number of Nursing Research:</b> <?php //echo $totalnursingresearch ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                   

                    <h3 class="my-3"><u>Tables</u></h3>
                    <div class="card  my-5">
                        <div class="card-header">

                            <h3>Student Information</h3>
                        </div>
                        <div class="card-body">
                            <table id="datatablerr">
                                <thead>
                                    <thead>
                            <tr class="text-light bg-dark">
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
                                </thead>

                                <tbody>
                                        <?php 
                                        // $sql = $conn->query("SELECT user.studentnumber, user.password, profile.student_name, profile.course, profile.addbio, profile.contact_number, profile.profile_image FROM user LEFT JOIN profile on user.profile_id = profile.profile_id "); 
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
                                                </tr>
                                                <?php  
                                                //  }
                                                // }
                                                ?>
                                         

                                </tbody>

                            </table>


                        </div>

                    </div>


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
                                    <th>College</th>
                                    <th>Course</th>
                                    <th>1st Tag</th>
                                    <th>2nd Tag</th>
                                    <th>3rd Tag</th>
                                    <th>4th Tag</th>
                                    <th>Document Status</th>
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
                                                <tr>
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