<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use PhpParser\Node\Expr\AssignOp\ShiftLeft;
use Symfony\Component\Mime\RawMessage;

class SessionViewsController extends Controller
{
    public function accountancy(Request $request)
    {
        $document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
            FROM document_studies
            LEFT JOIN course ON document_studies.course_ID = course.course_ID
            LEFT JOIN college ON course.college_ID = college.college_ID
            LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
            LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
            LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
            LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
            LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
            WHERE course.college_ID = 2
            ");
        $allParameters = $request->query();
        if (isset($allParameters['search'])) {
            $search = $allParameters['search'];


            $uid = Auth::user()->id;
            $compiled_backtrack_id = Auth::user()->compiled_backtrack_id;
            if ($compiled_backtrack_id != null) {
                $is_existing = false;
                //gets the backtrack record
                $backtrack_record = DB::select("SELECT * from backtrack
                    where compiled_backtrack_ID = $compiled_backtrack_id
                ");
                $backtrack1 = $backtrack_record[0]->backtrack1;
                $backtrack2 = $backtrack_record[0]->backtrack2;
                $backtrack3 = $backtrack_record[0]->backtrack3;
                //compares if the search has been done before and update it
                if ($backtrack2 == $search) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $backtrack2,
                            'backtrack2' => $backtrack1
                        ]);
                    $is_existing = true;
                }
                if ($backtrack3 == $search) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $backtrack3,
                            'backtrack2' => $backtrack1,
                            'backtrack2' => $backtrack2
                        ]);
                    $is_existing = true;
                }
                if ($backtrack1 == $search) {
                    $is_existing = true;
                }

                //creates new record if the search is new
                if (!$is_existing) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $search,
                            'backtrack2' => $backtrack1,
                            'backtrack3' => $backtrack2
                        ]);
                }
            } else { //creates new record of backtrack if user is first time searching
                DB::table('backtrack')
                    ->insert([
                        'backtrack1' => $search,
                    ]);
                $compiled_backtrack_ID = DB::select("SELECT compiled_backtrack_ID
                from backtrack
                ORDER BY compiled_backtrack_ID DESC LIMIT 1
                ");
                DB::table('users')
                    ->where('id', $uid)
                    ->update([
                        'compiled_backtrack_id' => $compiled_backtrack_ID[0]->compiled_backtrack_ID
                    ]);
            }




            $document_studies = $this->Search('accountancy', $search)[0];
            $search = $this->Search('accountancy', $search)[1];

            return view('SessionViews.accountancy')->with(compact('document_studies', 'search'));
        } else {
            return view('SessionViews.accountancy', ['document_studies' => $document_studies]);
        }
    }

    public function artsandscience(Request $request)
    {
        $document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
            FROM document_studies
            LEFT JOIN course ON document_studies.course_ID = course.course_ID
            LEFT JOIN college ON course.college_ID = college.college_ID
            LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
            LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
            LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
            LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
            LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
            WHERE course.college_ID = 1
            ");
        $allParameters = $request->query();
        if (isset($allParameters['search'])) {
            $search = $allParameters['search'];


            $uid = Auth::user()->id;
            $compiled_backtrack_id = Auth::user()->compiled_backtrack_id;
            if ($compiled_backtrack_id != null) {
                $is_existing = false;
                //gets the backtrack record
                $backtrack_record = DB::select("SELECT * from backtrack
                    where compiled_backtrack_ID = $compiled_backtrack_id
                ");
                $backtrack1 = $backtrack_record[0]->backtrack1;
                $backtrack2 = $backtrack_record[0]->backtrack2;
                $backtrack3 = $backtrack_record[0]->backtrack3;
                //compares if the search has been done before and update it
                if ($backtrack2 == $search) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $backtrack2,
                            'backtrack2' => $backtrack1
                        ]);
                    $is_existing = true;
                }
                if ($backtrack3 == $search) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $backtrack3,
                            'backtrack2' => $backtrack1,
                            'backtrack2' => $backtrack2
                        ]);
                    $is_existing = true;
                }
                if ($backtrack1 == $search) {
                    $is_existing = true;
                }

                //creates new record if the search is new
                if (!$is_existing) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $search,
                            'backtrack2' => $backtrack1,
                            'backtrack3' => $backtrack2
                        ]);
                }
            } else { //creates new record of backtrack if user is first time searching
                DB::table('backtrack')
                    ->insert([
                        'backtrack1' => $search,
                    ]);
                $compiled_backtrack_ID = DB::select("SELECT compiled_backtrack_ID
                from backtrack
                ORDER BY compiled_backtrack_ID DESC LIMIT 1
                ");
                DB::table('users')
                    ->where('id', $uid)
                    ->update([
                        'compiled_backtrack_id' => $compiled_backtrack_ID[0]->compiled_backtrack_ID
                    ]);
            }




            $document_studies = $this->Search('artsandscience', $search)[0];
            $search = $this->Search('artsandscience', $search)[1];

            return view('SessionViews.artsandscience')->with(compact('document_studies', 'search'));
        } else {
            return view('SessionViews.artsandscience', ['document_studies' => $document_studies]);
        }
    }

    public function computerstudies(Request $request)
    {
        $document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
            FROM document_studies
            LEFT JOIN course ON document_studies.course_ID = course.course_ID
            LEFT JOIN college ON course.college_ID = college.college_ID
            LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
            LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
            LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
            LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
            LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
            WHERE course.college_ID = 6
            ");
        $allParameters = $request->query();
        if (isset($allParameters['search'])) {
            $search = $allParameters['search'];


            $uid = Auth::user()->id;
            $compiled_backtrack_id = Auth::user()->compiled_backtrack_id;
            if ($compiled_backtrack_id != null) {
                $is_existing = false;
                //gets the backtrack record
                $backtrack_record = DB::select("SELECT * from backtrack
                    where compiled_backtrack_ID = $compiled_backtrack_id
                ");
                $backtrack1 = $backtrack_record[0]->backtrack1;
                $backtrack2 = $backtrack_record[0]->backtrack2;
                $backtrack3 = $backtrack_record[0]->backtrack3;
                //compares if the search has been done before and update it
                if ($backtrack2 == $search) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $backtrack2,
                            'backtrack2' => $backtrack1
                        ]);
                    $is_existing = true;
                }
                if ($backtrack3 == $search) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $backtrack3,
                            'backtrack2' => $backtrack1,
                            'backtrack2' => $backtrack2
                        ]);
                    $is_existing = true;
                }
                if ($backtrack1 == $search) {
                    $is_existing = true;
                }

                //creates new record if the search is new
                if (!$is_existing) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $search,
                            'backtrack2' => $backtrack1,
                            'backtrack3' => $backtrack2
                        ]);
                }
            } else { //creates new record of backtrack if user is first time searching
                DB::table('backtrack')
                    ->insert([
                        'backtrack1' => $search,
                    ]);
                $compiled_backtrack_ID = DB::select("SELECT compiled_backtrack_ID
                from backtrack
                ORDER BY compiled_backtrack_ID DESC LIMIT 1
                ");
                DB::table('users')
                    ->where('id', $uid)
                    ->update([
                        'compiled_backtrack_id' => $compiled_backtrack_ID[0]->compiled_backtrack_ID
                    ]);
            }




            $document_studies = $this->Search('computerstudies', $search)[0];
            $search = $this->Search('computerstudies', $search)[1];

            return view('SessionViews.computerstudies')->with(compact('document_studies', 'search'));
        } else {
            return view('SessionViews.computerstudies', ['document_studies' => $document_studies]);
        }
    }

    public function education(Request $request)
    {
        $document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
            FROM document_studies
            LEFT JOIN course ON document_studies.course_ID = course.course_ID
            LEFT JOIN college ON course.college_ID = college.college_ID
            LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
            LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
            LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
            LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
            LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
            WHERE course.college_ID = 4
            ");
        $allParameters = $request->query();
        if (isset($allParameters['search'])) {
            $search = $allParameters['search'];


            $uid = Auth::user()->id;
            $compiled_backtrack_id = Auth::user()->compiled_backtrack_id;
            if ($compiled_backtrack_id != null) {
                $is_existing = false;
                //gets the backtrack record
                $backtrack_record = DB::select("SELECT * from backtrack
                    where compiled_backtrack_ID = $compiled_backtrack_id
                ");
                $backtrack1 = $backtrack_record[0]->backtrack1;
                $backtrack2 = $backtrack_record[0]->backtrack2;
                $backtrack3 = $backtrack_record[0]->backtrack3;
                //compares if the search has been done before and update it
                if ($backtrack2 == $search) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $backtrack2,
                            'backtrack2' => $backtrack1
                        ]);
                    $is_existing = true;
                }
                if ($backtrack3 == $search) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $backtrack3,
                            'backtrack2' => $backtrack1,
                            'backtrack2' => $backtrack2
                        ]);
                    $is_existing = true;
                }
                if ($backtrack1 == $search) {
                    $is_existing = true;
                }

                //creates new record if the search is new
                if (!$is_existing) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $search,
                            'backtrack2' => $backtrack1,
                            'backtrack3' => $backtrack2
                        ]);
                }
            } else { //creates new record of backtrack if user is first time searching
                DB::table('backtrack')
                    ->insert([
                        'backtrack1' => $search,
                    ]);
                $compiled_backtrack_ID = DB::select("SELECT compiled_backtrack_ID
                from backtrack
                ORDER BY compiled_backtrack_ID DESC LIMIT 1
                ");
                DB::table('users')
                    ->where('id', $uid)
                    ->update([
                        'compiled_backtrack_id' => $compiled_backtrack_ID[0]->compiled_backtrack_ID
                    ]);
            }




            $document_studies = $this->Search('education', $search)[0];
            $search = $this->Search('education', $search)[1];

            return view('SessionViews.education')->with(compact('document_studies', 'search'));
        } else {
            return view('SessionViews.education', ['document_studies' => $document_studies]);
        }
    }

    public function engineering(Request $request)
    {
        $document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
            FROM document_studies
            LEFT JOIN course ON document_studies.course_ID = course.course_ID
            LEFT JOIN college ON course.college_ID = college.college_ID
            LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
            LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
            LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
            LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
            LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
            WHERE course.college_ID = 5
            ");
        $allParameters = $request->query();
        if (isset($allParameters['search'])) {
            $search = $allParameters['search'];


            $uid = Auth::user()->id;
            $compiled_backtrack_id = Auth::user()->compiled_backtrack_id;
            if ($compiled_backtrack_id != null) {
                $is_existing = false;
                //gets the backtrack record
                $backtrack_record = DB::select("SELECT * from backtrack
                    where compiled_backtrack_ID = $compiled_backtrack_id
                ");
                $backtrack1 = $backtrack_record[0]->backtrack1;
                $backtrack2 = $backtrack_record[0]->backtrack2;
                $backtrack3 = $backtrack_record[0]->backtrack3;
                //compares if the search has been done before and update it
                if ($backtrack2 == $search) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $backtrack2,
                            'backtrack2' => $backtrack1
                        ]);
                    $is_existing = true;
                }
                if ($backtrack3 == $search) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $backtrack3,
                            'backtrack2' => $backtrack1,
                            'backtrack2' => $backtrack2
                        ]);
                    $is_existing = true;
                }
                if ($backtrack1 == $search) {
                    $is_existing = true;
                }

                //creates new record if the search is new
                if (!$is_existing) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $search,
                            'backtrack2' => $backtrack1,
                            'backtrack3' => $backtrack2
                        ]);
                }
            } else { //creates new record of backtrack if user is first time searching
                DB::table('backtrack')
                    ->insert([
                        'backtrack1' => $search,
                    ]);
                $compiled_backtrack_ID = DB::select("SELECT compiled_backtrack_ID
                from backtrack
                ORDER BY compiled_backtrack_ID DESC LIMIT 1
                ");
                DB::table('users')
                    ->where('id', $uid)
                    ->update([
                        'compiled_backtrack_id' => $compiled_backtrack_ID[0]->compiled_backtrack_ID
                    ]);
            }




            $document_studies = $this->Search('engineering', $search)[0];
            $search = $this->Search('engineering', $search)[1];

            return view('SessionViews.engineering')->with(compact('document_studies', 'search'));
        } else {
            return view('SessionViews.engineering', ['document_studies' => $document_studies]);
        }
    }

    public function hotelmanagement(Request $request)
    {
        $document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
            FROM document_studies
            LEFT JOIN course ON document_studies.course_ID = course.course_ID
            LEFT JOIN college ON course.college_ID = college.college_ID
            LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
            LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
            LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
            LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
            LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
            WHERE course.college_ID = 3
            ");
        $allParameters = $request->query();
        if (isset($allParameters['search'])) {
            $search = $allParameters['search'];


            $uid = Auth::user()->id;
            $compiled_backtrack_id = Auth::user()->compiled_backtrack_id;
            if ($compiled_backtrack_id != null) {
                $is_existing = false;
                //gets the backtrack record
                $backtrack_record = DB::select("SELECT * from backtrack
                    where compiled_backtrack_ID = $compiled_backtrack_id
                ");
                $backtrack1 = $backtrack_record[0]->backtrack1;
                $backtrack2 = $backtrack_record[0]->backtrack2;
                $backtrack3 = $backtrack_record[0]->backtrack3;
                //compares if the search has been done before and update it
                if ($backtrack2 == $search) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $backtrack2,
                            'backtrack2' => $backtrack1
                        ]);
                    $is_existing = true;
                }
                if ($backtrack3 == $search) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $backtrack3,
                            'backtrack2' => $backtrack1,
                            'backtrack2' => $backtrack2
                        ]);
                    $is_existing = true;
                }
                if ($backtrack1 == $search) {
                    $is_existing = true;
                }

                //creates new record if the search is new
                if (!$is_existing) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $search,
                            'backtrack2' => $backtrack1,
                            'backtrack3' => $backtrack2
                        ]);
                }
            } else { //creates new record of backtrack if user is first time searching
                DB::table('backtrack')
                    ->insert([
                        'backtrack1' => $search,
                    ]);
                $compiled_backtrack_ID = DB::select("SELECT compiled_backtrack_ID
                from backtrack
                ORDER BY compiled_backtrack_ID DESC LIMIT 1
                ");
                DB::table('users')
                    ->where('id', $uid)
                    ->update([
                        'compiled_backtrack_id' => $compiled_backtrack_ID[0]->compiled_backtrack_ID
                    ]);
            }




            $document_studies = $this->Search('hotelmanagement', $search)[0];
            $search = $this->Search('hotelmanagement', $search)[1];

            return view('SessionViews.hotelmanagement')->with(compact('document_studies', 'search'));
        } else {
            return view('SessionViews.hotelmanagement', ['document_studies' => $document_studies]);
        }
    }

    public function nursing(Request $request)
    {
        $document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
            FROM document_studies
            LEFT JOIN course ON document_studies.course_ID = course.course_ID
            LEFT JOIN college ON course.college_ID = college.college_ID
            LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
            LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
            LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
            LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
            LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
            WHERE course.college_ID = 7
            ");
        $allParameters = $request->query();
        if (isset($allParameters['search'])) {
            $search = $allParameters['search'];


            $uid = Auth::user()->id;
            $compiled_backtrack_id = Auth::user()->compiled_backtrack_id;
            if ($compiled_backtrack_id != null) {
                $is_existing = false;
                //gets the backtrack record
                $backtrack_record = DB::select("SELECT * from backtrack
                    where compiled_backtrack_ID = $compiled_backtrack_id
                ");
                $backtrack1 = $backtrack_record[0]->backtrack1;
                $backtrack2 = $backtrack_record[0]->backtrack2;
                $backtrack3 = $backtrack_record[0]->backtrack3;
                //compares if the search has been done before and update it
                if ($backtrack2 == $search) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $backtrack2,
                            'backtrack2' => $backtrack1
                        ]);
                    $is_existing = true;
                }
                if ($backtrack3 == $search) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $backtrack3,
                            'backtrack2' => $backtrack1,
                            'backtrack2' => $backtrack2
                        ]);
                    $is_existing = true;
                }
                if ($backtrack1 == $search) {
                    $is_existing = true;
                }

                //creates new record if the search is new
                if (!$is_existing) {
                    DB::table('backtrack')
                        ->where('compiled_backtrack_ID', $compiled_backtrack_id)
                        ->update([
                            'backtrack1' => $search,
                            'backtrack2' => $backtrack1,
                            'backtrack3' => $backtrack2
                        ]);
                }
            } else { //creates new record of backtrack if user is first time searching
                DB::table('backtrack')
                    ->insert([
                        'backtrack1' => $search,
                    ]);
                $compiled_backtrack_ID = DB::select("SELECT compiled_backtrack_ID
                from backtrack
                ORDER BY compiled_backtrack_ID DESC LIMIT 1
                ");
                DB::table('users')
                    ->where('id', $uid)
                    ->update([
                        'compiled_backtrack_id' => $compiled_backtrack_ID[0]->compiled_backtrack_ID
                    ]);
            }




            $document_studies = $this->Search('nursing', $search)[0];
            $search = $this->Search('nursing', $search)[1];

            return view('SessionViews.nursing')->with(compact('document_studies', 'search'));
        } else {
            return view('SessionViews.nursing', ['document_studies' => $document_studies]);
        }
    }
    public function homepage()
    {
        if(Auth::user()->compiled_backtrack_id != null) {
            $compiled_backtrack_id = Auth::user()->compiled_backtrack_id;
            $backtrack_record = DB::select("SELECT * from backtrack
                    where compiled_backtrack_ID = $compiled_backtrack_id
                ");
            $backtrack1 = $backtrack_record[0]->backtrack1;
            $backtrack2 = $backtrack_record[0]->backtrack2;
            $backtrack3 = $backtrack_record[0]->backtrack3;
        }else {
            $backtrack1 = null;
            $backtrack2 = null;
            $backtrack3 = null;
        }

        //all of these are temporary query
        if($backtrack1 != null){
            $document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
            FROM document_studies
            LEFT JOIN course ON document_studies.course_ID = course.course_ID
            LEFT JOIN college ON course.college_ID = college.college_ID
            LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
            LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
            LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
            LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
            LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
            where document_studies.title LIKE '%$backtrack1%'
            OR tag1.tag1 LIKE '%$backtrack1%'
            OR tag2.tag2 LIKE '%$backtrack1%'
            OR tag3.tag3 LIKE '%$backtrack1%'
            OR tag4.tag4 LIKE '%$backtrack1%'
            ORDER BY RAND()
            limit 5
            ");
        } else $document_studies = [];
        if($backtrack2 != null){
            $document_studies2 = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
            FROM document_studies
            LEFT JOIN course ON document_studies.course_ID = course.course_ID
            LEFT JOIN college ON course.college_ID = college.college_ID
            LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
            LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
            LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
            LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
            LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
            where document_studies.title LIKE '%$backtrack2%'
            OR tag1.tag1 LIKE '%$backtrack2%'
            OR tag2.tag2 LIKE '%$backtrack2%'
            OR tag3.tag3 LIKE '%$backtrack2%'
            OR tag4.tag4 LIKE '%$backtrack2%'
            ORDER BY RAND()
            limit 5
            ");
        } else $document_studies2 = [];

        if($backtrack3 != null){
            $document_studies3 = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
            FROM document_studies
            LEFT JOIN course ON document_studies.course_ID = course.course_ID
            LEFT JOIN college ON course.college_ID = college.college_ID
            LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
            LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
            LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
            LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
            LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
            where document_studies.title LIKE '%$backtrack3%'
            OR tag1.tag1 LIKE '%$backtrack3%'
            OR tag2.tag2 LIKE '%$backtrack3%'
            OR tag3.tag3 LIKE '%$backtrack3%'
            OR tag4.tag4 LIKE '%$backtrack3%'
            ORDER BY RAND()
            limit 5
            ");
        } else $document_studies3 = [];
        $document_studies = array_merge($document_studies, $document_studies2);
        $document_studies = array_merge($document_studies, $document_studies3);
        $document_studies = array_unique($document_studies, SORT_REGULAR);



        return view('SessionViews.homepage', ['document_studies' => $document_studies]);
    }
    public function profilepage()
    {
        return view('SessionViews.profilepage');
    }

    public function Search($college, $search)
    {
        if ($college != null) {
            // dd("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
            // FROM document_studies
            // LEFT JOIN course ON document_studies.course_ID = course.course_ID
            // LEFT JOIN college ON course.college_ID = college.college_ID
            // LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
            // LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
            // LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
            // LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
            // LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
            // WHERE (document_studies.title LIKE '%" . $search . "%'
            // OR tag1.tag1 LIKE '%$search%'
            // OR tag2.tag2 LIKE '%$search%'
            // OR tag3.tag3 LIKE '%$search%')
            // AND college.college LIKE '%" . $college . "%'

            // ");
            $document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
                FROM document_studies
                LEFT JOIN course ON document_studies.course_ID = course.course_ID
                LEFT JOIN college ON course.college_ID = college.college_ID
                LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
                LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
                LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
                LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
                LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
                WHERE (document_studies.title LIKE '%" . $search . "%'
                OR tag1.tag1 LIKE '%$search%'
                OR tag2.tag2 LIKE '%$search%'
                OR tag3.tag3 LIKE '%$search%'
                OR tag4.tag4 LIKE '%$search%')
                AND college.college LIKE '%" . $college . "%'
                ");
        } else {

            $document_studies = DB::table('document_studies')->select('*')->where('title', ' like', "'%" . $search . "'%")->get();
        }
        if ($college == 'accountancy') {
            // return view('SessionViews.accountancy')->with(compact('document_studies','search'));
            return [$document_studies, $search];
        } elseif ($college == 'artsandscience') {
            return view('SessionViews.artsandscience')->with(compact('document_studies', 'search'));
        } elseif ($college == 'artsandscience') {
            return view('SessionViews.artsandscience')->with(compact('document_studies', 'search'));
        } elseif ($college == 'artsandscience') {
            return view('SessionViews.artsandscience')->with(compact('document_studies', 'search'));
        } elseif ($college == 'artsandscience') {
            return view('SessionViews.artsandscience')->with(compact('document_studies', 'search'));
        } elseif ($college == 'artsandscience') {
            return view('SessionViews.artsandscience')->with(compact('document_studies', 'search'));
        } elseif ($college == 'artsandscience') {
            return view('SessionViews.artsandscience')->with(compact('document_studies', 'search'));
        } else {
            return 'ERROR: Invalid Request';
        }
        // return $result;
    }
}
