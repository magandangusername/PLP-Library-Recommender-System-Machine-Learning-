@extends('layouts.app')
@section('content')
    @if(Auth::check())
        <div>
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-button"
                style="background-image: linear-gradient(to left, green,#fde8ec);">
                <div class="container">
                    <div class="container-fluid">
                        <b>
                            <h4>Recommendation</h4>
                        </b>
                    </div>
                </div>
            </nav>
        </div>
        {{-- <section class="clean-block clean-blog-list dark" style="background-image: linear-gradient(to left, green,#fde8ec);">
        <div class="container">
            <img class="imghover" src="{{ asset('img/course/PLP_cover.jpg') }}" alt="PLP Cover" style="height:300px; width:100%; border-style: inset;" >
        </div>
        </section> --}}
        <br>
        <main class="page blog-post-list">
            <section class="clean-block clean-blog-list dark" style="background-image: linear-gradient(to left, green,#fde8ec);">
                <div class="container">
                    <div class="block-content" style="border-style: inset;">
                        <?php
                        // $per_page_record = 10;  // Number of entries to show in a page.
                        // // Look for a GET variable page if not found default is 1.
                        // if (isset($_GET["page"])) {
                        //     $page  = $_GET["page"];
                        // } else {
                        //     $page = 1;
                        // }
                        // $start_from = ($page - 1) * $per_page_record;
                        // if (!isset($_POST['search'])) {
                        //     $sql = $conn->query("SELECT * FROM tnr_dataset WHERE College = 'Accountancy' LIMIT $start_from, $per_page_record");
                        // }
                        // elseif ($resultcount == 0){
                        //     echo "No Results Found";
                        // }
                        // if ($sql) {
                        //     while ($row = $sql->fetch_assoc()) {
                        //         $ID = $row['ID'];
                        //         $title = $row['Title'];
                        //         $author = $row['Author'];
                        //         $year = $row['Year'];
                        //         $kind = $row['Kind_of_Paper'];
                        //         $college = $row['College'];
                        //         $content = $row['Content'];
                        //         $links = $row['Links'];

                        //         $ratings = $conn->query("SELECT * FROM ratings WHERE ID = '$ID'");
                        //         $i = 1;
                        //         $rate_sum = 0;
                        //         while ($rating = $ratings->fetch_assoc()) {
                        //             $rate_sum += $rating['rates'];

                        //             $i++;
                        //         }
                        //         $rate = number_format($rate_sum / $i, 1);
                        ?>

                        @include("layouts.documents")
                        <?php //}
                        //}
                        ?>
                        <br>
                        <div class="d-flex justify-content-center">
                            <?php
                            // $sql = "SELECT COUNT(*) FROM tnr_dataset WHERE College='Accountancy'";
                            // $rs_result = mysqli_query($conn, $sql);
                            // $row = mysqli_fetch_row($rs_result);
                            // $total_records = $row[0];

                            // echo "</br>";
                            // // Number of pages required.
                            // $total_pages = ceil($total_records / $per_page_record);
                            // $pagLink = "";

                            // if (isset($_POST['search'])) {
                            //     echo " ";
                            // } elseif ($page >= 2) {
                            //     echo "<button class='btn btn-dark' style='border: 2px solid #4CAF50;'><a href='accountancy.php?page=" . ($page - 1) . "'>  Prev </a></button>";
                            // }

                            // for ($i = 1; $i <= $total_pages; $i++) {
                            //     if (isset($_POST['search'])) {
                            //         $pagLink .= " ";
                            //     } elseif ($i == $page) {
                            //         $pagLink .= "<button class='btn btn-dark' style='border: 2px solid #4CAF50;'><a style='' class='active' href='accountancy.php?page="
                            //             . $i . "'><b>" . $i . " </b></a></button>";
                            //     } else {
                            //         $pagLink .= "<button class='btn btn-dark' style='border: 2px solid #4CAF50;'><a href='accountancy.php?page=" . $i . "'>
                            //                                         " . $i . " </a></button>";
                            //     }
                            // };

                            // if (!isset($_POST['search'])) {
                            //     echo $pagLink;
                            // } elseif (isset($_POST['search'])) {
                            //     echo " ";
                            // }

                            // if (isset($_POST['search'])) {
                            //     echo " ";
                            // } elseif ($page < $total_pages) {
                            //     echo "<button class='btn btn-dark' style='border: 2px solid #4CAF50;'><a href='accountancy.php?page=" . ($page + 1) . "'>  Next </a></button>";
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
    @else
        @include('GuestViews.guestaccountancy')
    @endif
@endsection
