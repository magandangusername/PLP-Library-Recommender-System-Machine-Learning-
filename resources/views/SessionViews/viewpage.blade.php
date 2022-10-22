@extends('layouts.app')
@section('content')
    @if(Auth::check())
        <div>
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-button"
                style="background-image: linear-gradient(to left, green,#fde8ec);">
                <div class="container">
                    <div class="container-fluid">
                        <b>
                            <h4>Accountancy</h4>
                        </b>
                    </div>
                </div>
            </nav>
        </div>
        <section class="clean-block clean-blog-list dark" style="background-image: linear-gradient(to left, green,#fde8ec);">
            <div class="container">
                <img class="imghover" src="{{ asset('img/course/accountancy_cover.jpg') }}" alt="Accountancy Cover"
                    style="height:300px; width:100%; border-style: inset;">
            </div>
        </section>
        <br>
        <main class="page blog-post-list">
            <section class="clean-block clean-blog-list dark"
                style="background-image: linear-gradient(to left, green,#fde8ec);">
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

                        <div class="clean-blog-post" style="padding:20px; margin: 10px; border-style: inset;">
                            <div class="row">
                                @if ($document_studies == null)
                                    <p>WALANG NAKITA</p>
                                @endif
                                {{-- @foreach ($document_studies as $document_study) --}}
                                <div class="col-lg-5"><embed src="<?php //echo $links
                                ?>" width="100%" height="100%"
                                        style="border-style: solid;" /></div>
                                <div class="col-lg-7">
                                    <h3 style="color:black;">{{ $document_study->title }}</h3>
                                    <div class="info" style="color:black;"><span class="text-dark">Submitted on
                                        {{ $document_study->date_submitted }} by:</span></div>
                                    <div class="info" style="color:black;"><span
                                            class="text-dark">{{ $document_study->author }}</span></div>
                                    <div class="info" style="color:black;">(<span class="text-dark">Document
                                            Type: {{ $document_study->document_type }}&nbsp;- {{ $document_study->document_number }})</span></div>
                                    <div class="info" style="color:black;"><span class="text-dark">{{ $document_study->college }}
                                            &nbsp;- {{ $document_study->course }}</span></div>
                                    <div class="info" style="color:black;"><span class="text-dark">Added
                                            by {{ $document_study->addedby }}</span></div>
                                    <div class="info" style="color:black;"><span class="text-dark">
                                            <div class="d-inline bg-success text-white rounded-pill">{{ $document_study->tag1 }}
                                            </div>&nbsp;|&nbsp;<div class="d-inline bg-success text-white rounded-pill">
                                                {{ $document_study->tag2 }}</div>&nbsp;|&nbsp;<div
                                                class="d-inline bg-success text-white rounded-pill"> {{ $document_study->tag3 }}
                                            </div>&nbsp;|&nbsp;<div class="d-inline bg-success text-white rounded-pill"> {{ $document_study->tag4 }}</div>
                                        </span></div>
                                    <button
                                        class="btn btn-outline-primary btn-sm" type="button"><a
                                            href="<?php //echo $links
                                            ?>">Download PDF here</a></button>&nbsp;&nbsp;<button
                                        class="btn btn-outline-primary btn-sm" type="button"><a href="<?php ?>">Add
                                            to Favorites</a></button>&nbsp;<br><br>
                                    {{-- <label>Ratings: <?php //echo $rate;
                                    ?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                                    <br>
                                    <?php
                                    // $book_id = $ID;
                                    // $check_rate = $conn->query("SELECT COUNT(*) as is_rated FROM ratings WHERE user_id='$uid' AND ID='$book_id' ");
                                    // if ($check_rate) {
                                    //     $check_rate = $check_rate->fetch_assoc();
                                    //     $check_rate = $check_rate['is_rated'];
                                    // }
                                    ?>
                                    {{-- <form action="" method="post">
                                                <label>Rate: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input class="form-check-input" type="radio" name="rate" id="flexRadioDefault2" value="1" checked <?php //if ($check_rate > 0) {
                                                //echo 'disabled';
                                                //}
                                                ?>>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    1
                                                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input class="form-check-input" type="radio" name="rate" id="flexRadioDefault2" value="2" checked <?php //if ($check_rate > 0) {
                                                //echo 'disabled';
                                                //}
                                                ?>>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    2
                                                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input class="form-check-input" type="radio" name="rate" id="flexRadioDefault2" value="3" checked <?php //if ($check_rate > 0) {
                                                //echo 'disabled';
                                                //}
                                                ?>>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    3
                                                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input class="form-check-input" type="radio" name="rate" id="flexRadioDefault2" value="4" checked <?php //if ($check_rate > 0) {
                                                // echo 'disabled';
                                                //}
                                                ?>>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    4
                                                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input class="form-check-input" type="radio" name="rate" id="flexRadioDefault2" value="5" checked <?php //if ($check_rate > 0) {
                                                //echo 'disabled';
                                                //}
                                                ?>>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    5
                                                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <button class="btn btn-outline-primary btn-sm" type="submit" name="submitrate" <?php //if ($check_rate > 0) {
                                                //echo 'disabled';
                                                //}
                                                ?>>Rate</button>
                                                <input type="hidden" name="book" value="<?php //echo $book_id
                                                ?>">

                                            </form> --}}
                                </div>
                                {{-- @endforeach --}}
                            </div>
                        </div>
                        <?php //}
                        //}
                        ?>
                        <br>
                        <div class="d-flex justify-content-center">
                            <?php
                      
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        
    @else
        @include('GuestViews.guestaccountancy')
    @endif
@endsection