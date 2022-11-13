@extends('layouts.adminapp')

@section('admincontent')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Overview</h1>

            <div class="row mt-5">

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-dark mb-4">
                        <div class="card-body"><b>Total Registered student of PLP:</b> </div>
                        {{-- {{ $student_count }} --}}
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Accountancy Student:</b> </div>
                        {{-- {{ $accountancy_student_count }} --}}
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Computer Science Student:</b></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Education Student:</b> <?php //echo $totaleducation
                        ?></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Hotel Management Student:</b> <?php //echo $totalhotelmanagement
                        ?></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Nursing Student:</b> <?php //echo $totalnursing
                        ?></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-dark mb-4">
                        <div class="card-body "><b>Total of documents from all colleges:</b> {{ $document_count }}</div>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-dark mb-4">
                        <div class="card-body "><b>Total of Thesis documents from all colleges:</b> {{ $thesis_count }}
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-dark mb-4">
                        <div class="card-body"><b>Total of Research documents from all colleges:</b> {{ $research_count }}
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Accountancy Documents:</b> {{ $accountancy_docu_count }}</div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Accountancy Thesis:</b> {{ $accountancy_th_count }} </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Accountancy research:</b> {{ $accountancy_rs_count }} </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Arts and Science Documents:</b> {{ $artscie_docu_count }}</div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Arts and Science Thesis:</b> {{ $th_artscie }} </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Arts and Science research:</b> {{ $rs_artscie }} </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Computer Science Documents:</b> {{ $ccs_docu_count }} </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Computer Science Thesis:</b> {{ $ccs_th_count }} </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Computer Science Research:</b> {{ $ccs_rs_count }} </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Education Documents:</b> {{ $educ_docu_count }} </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Education Thesis:</b> {{ $educ_th_count }} </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Education Research:</b> {{ $educ_rs_count }} </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Engineering Documents:</b> {{ $eng_docu_count }} </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Engineering Thesis:</b> {{ $th_eng }} </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Engineering Research:</b> {{ $rs_eng }} </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Hotel Management Documents:</b> {{ $hm_docu_count }} </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Hotel Management Thesis:</b> {{ $th_hm }} </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Hotel Management Research:</b> {{ $rs_hm }} </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Nursing Documents:</b> {{ $nurs_docu_count }} </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Nursing Thesis:</b> {{ $th_nurs }} </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning bg-outline-dark text-dark mb-4">
                        <div class="card-body"><b>Number of Nursing Research:</b> {{ $rs_nurs }} </div>
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
                                        <th>Student Information Number</th>
                                        <th>Student Number</th>
                                        <th>Firstname</th>
                                        <th>Surname</th>
                                        <th>Year Level</th>
                                        <th>College</th>
                                        <th>Course</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Student Status</th>
                                        <th>Added By</th>
                                        <th>Date Added</th>
                                        <th>Updated On</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>
                            </thead>

                            <tbody>
                                @foreach ($student_info as $student_infos)
                                    <tr>
                                        <td>{{ $student_infos->student_info_ID }}</td>
                                        <td>{{ $student_infos->student_number }}</td>
                                        <td>{{ $student_infos->firstname }}</td>
                                        <td>{{ $student_infos->surname }}</td>
                                        <td>{{ $student_infos->year_level }}</td>
                                        <td>{{ $student_infos->college }}</td>
                                        <td>{{ $student_infos->course }}</td>
                                        <td>{{ $student_infos->email }}</td>
                                        <td>{{ $student_infos->contact_number }}</td>
                                        <td>{{ $student_infos->student_status }}</td>
                                        <td>{{ $student_infos->addedby }}</td>
                                        <td>{{ $student_infos->date_added }}</td>
                                        <td>{{ $student_infos->updated_on }}</td>
                                        <td>{{ $student_infos->password }}</td>
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




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
@endsection
