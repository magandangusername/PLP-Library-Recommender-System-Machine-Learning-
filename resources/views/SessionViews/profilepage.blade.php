@extends('Layouts.app')
@section('content')
<main class="page blog-post-list">
    <section class="clean-block clean-blog-list dark" style="background-image: linear-gradient(to left, green,#fde8ec);">
        <div class="container" style="background-image: linear-gradient(to left, green,#fde8ec);">
            <div class="block-content" style="background-image: linear-gradient(to left, green,#fde8ec);">
                <div class="clean-blog-post">
                    <div class="row" style="border-style: inset;">
                        <!--<div class="col" style="width:300px;"><img src="assets/img/avatars/avatar1.jpg" style="width:300px;height:300px;"></div>-->
                        <div class="col" style="background: url(assets/img/tech/plp.jpg); background-repeat: no-repeat; background-size: cover;"><img src="data:image/jpg;charset=utf8;base64,<?php //echo base64_encode($profilepic); ?>" class="mx-auto my-auto" style="border-radius: 50%; display: block; width=300px; height: 300px; border-style: solid; object-fit: cover;"></div>
                        <div class="col" style="background-image: linear-gradient(to left, green,#fde8ec);">
                            <form method="post" enctype="multipart/form-data">
                                
                                <div class="row">
                                    <div class="col"><label style = "color:green" class="col-form-label"><?php //echo $statusMsg ?></label></div>
                                </div>
                                <div class="row">
                                    <div class="col"><label class="col-form-label">Change Profile</label></div>
                                </div>
                                <div class="row">
                                    <!--<div class="col"><button class="btn btn-dark" type="button">Change Profile</button></div>-->
                                    <div class="col w-auto"><input class="btn w-auto" type="file" name="image"></div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col"><label class="col-form-label">Student Name: <b><?php //echo $studentname ?></b></label></div>
                                </div>
                                <div class="row">
                                    <div class="col"><label class="col-form-label">Student Number: <b><?php //echo $studentnum ?></b></label></div>
                                </div>
                                <div class="row">
                                    <div class="col"><label class="col-form-label">Course: <b><?php //echo $course ?></b></label></div>
                                </div>
                            
                                <div class="row">
                                    <div class="col"><label class="col-form-label">Bio:</label></div>
                                </div>
                                <div class="row">
                                    <div class="col w-auto"><textarea class="w-auto" name="bio" rows="4" cols="30"><?php //echo $bio ?></textarea></div>
                                </div>
                                <div class="row">
                                    <div class="col"><label style = "color:green" class="col-form-label"><?php //echo $statusbio ?></label></div>
                                </div>
                                <div class="row">
                                    <div class="col" style="margin-bottom: 15px; margin-left: 418px"><input type="submit" name="saveprofile" value="Save"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clean-blog-post">
                    <div class="row">
                        <div class="col"><label class="col-form-label" style="font-size:40px;">Account</label></div>
                    </div>
                </div>
                <div class="clean-blog-post">
                    <div class="row">
                        <div class="col">
                        <?php
                            // if(isset($_POST['changecontact'])){
                            //     echo "<form method=\"post\" id=\"contactnum\" action=\"#contactnum\">
                            //         <div class=\"row\">
                            //             <div class=\"col\"><label class=\"col-form-label\">Contact Number:</label></div>
                            //         </div>
                            //         <div class=\"row\">
                            //         <div class=\"col\"><label>
                            //             <input type=\"text\" name=\"contact\">
                            //             <!--</label><button class=\"btn btn-dark\" type=\"button\">Change</button>-->
                            //             <input class=\"btn btn-dark\" type=\"submit\" name=\"savecontact\" value=\"Save\">
                            //         </div>
                            //         </div>

                            //     </form>";
                            // }
                            // else {
                            //     echo "<form method=\"post\" id=\"contactnum\" action=\"#contactnum\">
                            //     <div class=\"row\">
                            //         <div class=\"col\"><label class=\"col-form-label\">Contact Number:</label></div>
                            //     </div>
                            //     <div class=\"row\">
                            //         <div class=\"col\"><label>
                            //             $contact &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                            //             <!--</label><button class=\"btn btn-dark\" type=\"button\">Change</button>-->
                            //             <input class=\"btn btn-dark\" type=\"submit\" name=\"changecontact\" value=\"Change\">
                            //         </div>
                            //     </div>
                            // </form>";
                            // }
                        ?>
                            
                        </div>
                    </div>
                </div>
                <div class="clean-blog-post">
                <?php
                    // if(isset($_POST['changepass'])){
                    //     echo "<form method=\"post\" id=\"pass\">
                    //         <div class=\"row\">
                    //             <div class=\"col\"><label class=\"col-form-label\">Password:</label></div>
                    //         </div>
                    //         <div class=\"row\">
                    //             <div class=\"col\"><label>
                    //                 <input type=\"password\" id=\"password\" name=\"password\" required>
                    //             </div>
                                
                    //         </div>
                    //         <div class=\"row\">
                    //             <div class=\"col\"><label class=\"col-form-label\">Confirm Password:</label></div>
                    //         </div>
                    //         <div class=\"row\">
                    //             <div class=\"col\"><label>
                    //                 <input type=\"password\" id=\"confirm_password\" required>
                    //                 <input class=\"btn btn-dark\" type=\"submit\" name=\"savepass\" value=\"Save\">
                    //             </div>
                                
                    //         </div>
                    //     </form>";
                    // }
                    // else {
                    //     echo "<form method=\"post\" id=\"pass\" action=\"#pass\">
                    //         <div class=\"row\">
                    //             <div class=\"col\"><label class=\"col-form-label\">Password:</label></div>
                    //         </div>
                        
                    //         <div class=\"row\">
                    //             <div class=\"col\">
                    //                 <label>******************* &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label>
                    //                 <input class=\"btn btn-dark\" type=\"submit\" name=\"changepass\" value=\"Change\">
                    //             </div>
                    //         </div>
                    //     </form>";
                    // }
                ?>
                </div>
            </div>
        </div>
    </section>
</main>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.min.js"></script> --}}
@endsection