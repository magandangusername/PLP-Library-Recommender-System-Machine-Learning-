<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use PhpParser\Node\Expr\AssignOp\ShiftLeft;
use Ramsey\Uuid\Type\Integer;
use Symfony\Component\Mime\RawMessage;


use function PHPUnit\Framework\isEmpty;

class SessionViewsController extends Controller
{

    public function accountancy(Request $request)
    {   if (auth::check()){
        $userid = Auth::user()->id;
        $names = DB::table('users')
        ->leftJoin("student_info", "users.student_info_id", "=", "student_info.student_info_ID")
        ->select('student_info.firstname', 'student_info.surname')
        ->where('id', $userid )
        ->get();
        $name = $names[0]->firstname . " " . $names[0]->surname;
        }

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

            if(auth::check()){
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
            }



            $document_studies = $this->Search('accountancy', $search)[0];
            $search = $this->Search('accountancy', $search)[1];
            if(auth::check()){
                return view('SessionViews.accountancy')->with(compact('document_studies', 'search', 'name'));
            }else{
                return view('SessionViews.accountancy')->with(compact('document_studies', 'search'));
            }
        } else {
            if(auth::check()){
                return view('SessionViews.accountancy', ['document_studies' => $document_studies, 'name' => $name]);
            }
            else{
                return view('SessionViews.accountancy', ['document_studies' => $document_studies]);
            }
        }
    }

    public function artsandscience(Request $request)
    {
        if (auth::check()){
            $userid = Auth::user()->id;
            $names = DB::table('users')
            ->leftJoin("student_info", "users.student_info_id", "=", "student_info.student_info_ID")
            ->select('student_info.firstname', 'student_info.surname')
            ->where('id', $userid )
            ->get();
            $name = $names[0]->firstname . " " . $names[0]->surname;
            }
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

            if(auth::check()){
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
            }



            $document_studies = $this->Search('artsandscience', $search)[0];
            $search = $this->Search('artsandscience', $search)[1];
            if (auth::check()){
                return view('SessionViews.artsandscience')->with(compact('document_studies', 'search', 'name'));
            }else{
                return view('SessionViews.artsandscience')->with(compact('document_studies', 'search'));
            }
        } else {
            if (auth::check()){
                return view('SessionViews.artsandscience', ['document_studies' => $document_studies, 'name' => $name]);
            }else{
                return view('SessionViews.artsandscience', ['document_studies' => $document_studies]);
            }
        }
    }

    public function computerstudies(Request $request)
    {
        if (auth::check()){
            $userid = Auth::user()->id;
            $names = DB::table('users')
            ->leftJoin("student_info", "users.student_info_id", "=", "student_info.student_info_ID")
            ->select('student_info.firstname', 'student_info.surname')
            ->where('id', $userid )
            ->get();
            $name = $names[0]->firstname . " " . $names[0]->surname;
            }
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

            if(auth::check()){
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
            }



            $document_studies = $this->Search('computerstudies', $search)[0];
            $search = $this->Search('computerstudies', $search)[1];

            if (auth::check()){
                return view('SessionViews.computerstudies')->with(compact('document_studies', 'search', 'name'));
            }else{
                return view('SessionViews.computerstudies')->with(compact('document_studies', 'search'));
            }
        } else {
            if (auth::check()){
                return view('SessionViews.computerstudies', ['document_studies' => $document_studies, 'name' => $name]);
            }else{
                return view('SessionViews.computerstudies', ['document_studies' => $document_studies]);
            }
        }
    }

    public function education(Request $request)
    {
        if (auth::check()){
            $userid = Auth::user()->id;
            $names = DB::table('users')
            ->leftJoin("student_info", "users.student_info_id", "=", "student_info.student_info_ID")
            ->select('student_info.firstname', 'student_info.surname')
            ->where('id', $userid )
            ->get();
            $name = $names[0]->firstname . " " . $names[0]->surname;
            }
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

            if(auth::check()){
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
            }



            $document_studies = $this->Search('education', $search)[0];
            $search = $this->Search('education', $search)[1];

            if (auth::check()){
                return view('SessionViews.education')->with(compact('document_studies', 'search', 'name'));
            }else{
                return view('SessionViews.education')->with(compact('document_studies', 'search'));
            }
        } else {
            if (auth::check()){
                return view('SessionViews.education', ['document_studies' => $document_studies, 'name' => $name]);
            }else{
                return view('SessionViews.education', ['document_studies' => $document_studies]);
            }
        }
    }

    public function engineering(Request $request)
    {
        if (auth::check()){
            $userid = Auth::user()->id;
            $names = DB::table('users')
            ->leftJoin("student_info", "users.student_info_id", "=", "student_info.student_info_ID")
            ->select('student_info.firstname', 'student_info.surname')
            ->where('id', $userid )
            ->get();
            $name = $names[0]->firstname . " " . $names[0]->surname;
            }
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

            if(auth::check()){
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
            }



            $document_studies = $this->Search('engineering', $search)[0];
            $search = $this->Search('engineering', $search)[1];

            if (auth::check()){
                return view('SessionViews.engineering')->with(compact('document_studies', 'search', 'name'));
            }else{
                return view('SessionViews.engineering')->with(compact('document_studies', 'search'));
            }
        } else {
            if (auth::check()){
                return view('SessionViews.engineering', ['document_studies' => $document_studies, 'name' => $name]);
            }else{
                return view('SessionViews.engineering', ['document_studies' => $document_studies]);
            }
        }
    }

    public function hotelmanagement(Request $request)
    {
        if (auth::check()){
            $userid = Auth::user()->id;
            $names = DB::table('users')
            ->leftJoin("student_info", "users.student_info_id", "=", "student_info.student_info_ID")
            ->select('student_info.firstname', 'student_info.surname')
            ->where('id', $userid )
            ->get();
            $name = $names[0]->firstname . " " . $names[0]->surname;
            }
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

            if(auth::check()){
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
            }



            $document_studies = $this->Search('hotelmanagement', $search)[0];
            $search = $this->Search('hotelmanagement', $search)[1];

            if (auth::check()){
                return view('SessionViews.hotelmanagement')->with(compact('document_studies', 'search', 'name'));
            }else{
                return view('SessionViews.hotelmanagement')->with(compact('document_studies', 'search'));
            }
        } else {
            if (auth::check()){
                return view('SessionViews.hotelmanagement', ['document_studies' => $document_studies, 'name' => $name]);
            }else{
                return view('SessionViews.hotelmanagement', ['document_studies' => $document_studies]);
            }
        }
    }

    public function nursing(Request $request)
    {
        if (auth::check()){
            $userid = Auth::user()->id;
            $names = DB::table('users')
            ->leftJoin("student_info", "users.student_info_id", "=", "student_info.student_info_ID")
            ->select('student_info.firstname', 'student_info.surname')
            ->where('id', $userid )
            ->get();
            $name = $names[0]->firstname . " " . $names[0]->surname;
            }
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

            if(auth::check()){
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
            }



            $document_studies = $this->Search('nursing', $search)[0];
            $search = $this->Search('nursing', $search)[1];

            if (auth::check()){
                return view('SessionViews.nursing')->with(compact('document_studies', 'search', 'name'));
            }else{
                return view('SessionViews.nursing')->with(compact('document_studies', 'search'));
            }
        } else {
            if (auth::check()){
                return view('SessionViews.nursing', ['document_studies' => $document_studies, 'name' => $name]);
            }else{
                return view('SessionViews.nursing', ['document_studies' => $document_studies]);
            }
        }
    }
    public function homepage()
    {
        //
        if (auth::check()){
            $userid = Auth::user()->id;
            $names = DB::table('users')
            ->leftJoin("student_info", "users.student_info_id", "=", "student_info.student_info_ID")
            ->select('student_info.firstname', 'student_info.surname')
            ->where('id', $userid )
            ->get();
            $name = $names[0]->firstname . " " . $names[0]->surname;
        } else return redirect('/accountancy');
        $document_studies = [];


        // recommendation for backtrack
        if(isset(Auth::user()->compiled_backtrack_id) and Auth::user()->compiled_backtrack_id != null and $document_studies == []) {
            $backtrack1 = null;
            $backtrack2 = null;
            $backtrack3 = null;
            $compiled_backtrack_id = Auth::user()->compiled_backtrack_id;
            $backtrack_record = DB::select("SELECT * from backtrack
                    where compiled_backtrack_ID = $compiled_backtrack_id
                ");
            $backtrack1 = $backtrack_record[0]->backtrack1;
            $backtrack2 = $backtrack_record[0]->backtrack2;
            $backtrack3 = $backtrack_record[0]->backtrack3;

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
        }

        $results_count = sizeof($document_studies);

        // recommendation for views
        if((isset(Auth::user()->compiled_views_id) and Auth::user()->compiled_views_id != null) and $results_count < 15) {
            //checks if user has views record
            $view1 = null;
            $view2 = null;
            $view3 = null;
            $compiled_views_id = Auth::user()->compiled_views_id;
            $view_record = DB::select("SELECT * from document_views
                    where compiled_views_ID = $compiled_views_id
                ");
            $view1 = $view_record[0]->view1;
            $view2 = $view_record[0]->view2;
            $view3 = $view_record[0]->view3;


            //all of these are temporary query
            if($view1 != null){
                // gets the tags of the view
                $document_studies1 = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
                FROM document_studies
                LEFT JOIN course ON document_studies.course_ID = course.course_ID
                LEFT JOIN college ON course.college_ID = college.college_ID
                LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
                LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
                LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
                LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
                LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
                where document_studies.document_id = $view1
                limit 1
                ");
                $tag1 = $document_studies1[0]->tag1;
                $tag2 = $document_studies1[0]->tag2;
                $tag3 = $document_studies1[0]->tag3;
                $tag4 = $document_studies1[0]->tag4;

                // find results
                $document_studies1 = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
                FROM document_studies
                LEFT JOIN course ON document_studies.course_ID = course.course_ID
                LEFT JOIN college ON course.college_ID = college.college_ID
                LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
                LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
                LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
                LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
                LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
                where document_studies.title LIKE '%$tag1%' OR document_studies.title LIKE '%$tag2%' OR document_studies.title LIKE '%$tag3%' OR document_studies.title LIKE '%$tag4%'
                OR tag1.tag1 LIKE '%$tag1%' OR tag1.tag1 LIKE '%$tag2%' OR tag1.tag1 LIKE '%$tag3%' OR tag1.tag1 LIKE '%$tag4%'
                OR tag2.tag2 LIKE '%$tag1%' OR tag2.tag2 LIKE '%$tag2%' OR tag2.tag2 LIKE '%$tag3%' OR tag2.tag2 LIKE '%$tag4%'
                OR tag3.tag3 LIKE '%$tag1%' OR tag3.tag3 LIKE '%$tag2%' OR tag3.tag3 LIKE '%$tag3%' OR tag3.tag3 LIKE '%$tag4%'
                OR tag4.tag4 LIKE '%$tag1%' OR tag4.tag4 LIKE '%$tag2%' OR tag4.tag4 LIKE '%$tag3%' OR tag4.tag4 LIKE '%$tag4%'
                ORDER BY document_studies.views_count DESC
                limit 5
                ");
            } else $document_studies1 = [];
            if($view2 != null){
                // gets the tags of the view
                $document_studies2 = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
                FROM document_studies
                LEFT JOIN course ON document_studies.course_ID = course.course_ID
                LEFT JOIN college ON course.college_ID = college.college_ID
                LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
                LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
                LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
                LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
                LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
                where document_studies.document_id = $view2
                limit 1
                ");
                $tag1 = $document_studies2[0]->tag1;
                $tag2 = $document_studies2[0]->tag2;
                $tag3 = $document_studies2[0]->tag3;
                $tag4 = $document_studies2[0]->tag4;

                // find results
                $document_studies2 = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
                FROM document_studies
                LEFT JOIN course ON document_studies.course_ID = course.course_ID
                LEFT JOIN college ON course.college_ID = college.college_ID
                LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
                LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
                LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
                LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
                LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
                where document_studies.title LIKE '%$tag1%' OR document_studies.title LIKE '%$tag2%' OR document_studies.title LIKE '%$tag3%' OR document_studies.title LIKE '%$tag4%'
                OR tag1.tag1 LIKE '%$tag1%' OR tag1.tag1 LIKE '%$tag2%' OR tag1.tag1 LIKE '%$tag3%' OR tag1.tag1 LIKE '%$tag4%'
                OR tag2.tag2 LIKE '%$tag1%' OR tag2.tag2 LIKE '%$tag2%' OR tag2.tag2 LIKE '%$tag3%' OR tag2.tag2 LIKE '%$tag4%'
                OR tag3.tag3 LIKE '%$tag1%' OR tag3.tag3 LIKE '%$tag2%' OR tag3.tag3 LIKE '%$tag3%' OR tag3.tag3 LIKE '%$tag4%'
                OR tag4.tag4 LIKE '%$tag1%' OR tag4.tag4 LIKE '%$tag2%' OR tag4.tag4 LIKE '%$tag3%' OR tag4.tag4 LIKE '%$tag4%'
                ORDER BY document_studies.views_count DESC
                limit 5
                ");
            } else $document_studies2 = [];
            if($view3 != null){
                // gets the tags of the view
                $document_studies3 = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
                FROM document_studies
                LEFT JOIN course ON document_studies.course_ID = course.course_ID
                LEFT JOIN college ON course.college_ID = college.college_ID
                LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
                LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
                LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
                LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
                LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
                where document_studies.document_id = $view3
                limit 1
                ");
                $tag1 = $document_studies3[0]->tag1;
                $tag2 = $document_studies3[0]->tag2;
                $tag3 = $document_studies3[0]->tag3;
                $tag4 = $document_studies3[0]->tag4;

                // find results
                $document_studies3 = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
                FROM document_studies
                LEFT JOIN course ON document_studies.course_ID = course.course_ID
                LEFT JOIN college ON course.college_ID = college.college_ID
                LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
                LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
                LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
                LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
                LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
                where document_studies.title LIKE '%$tag1%' OR document_studies.title LIKE '%$tag2%' OR document_studies.title LIKE '%$tag3%' OR document_studies.title LIKE '%$tag4%'
                OR tag1.tag1 LIKE '%$tag1%' OR tag1.tag1 LIKE '%$tag2%' OR tag1.tag1 LIKE '%$tag3%' OR tag1.tag1 LIKE '%$tag4%'
                OR tag2.tag2 LIKE '%$tag1%' OR tag2.tag2 LIKE '%$tag2%' OR tag2.tag2 LIKE '%$tag3%' OR tag2.tag2 LIKE '%$tag4%'
                OR tag3.tag3 LIKE '%$tag1%' OR tag3.tag3 LIKE '%$tag2%' OR tag3.tag3 LIKE '%$tag3%' OR tag3.tag3 LIKE '%$tag4%'
                OR tag4.tag4 LIKE '%$tag1%' OR tag4.tag4 LIKE '%$tag2%' OR tag4.tag4 LIKE '%$tag3%' OR tag4.tag4 LIKE '%$tag4%'
                ORDER BY document_studies.views_count DESC
                limit 5
                ");
            } else $document_studies3 = [];
            $document_studies = array_merge($document_studies, $document_studies1);
            $document_studies = array_merge($document_studies, $document_studies2);
            $document_studies = array_merge($document_studies, $document_studies3);
            $document_studies = array_unique($document_studies, SORT_REGULAR);
            $document_studies = array_slice($document_studies, 0, 15, true);

        }



        $results_count = sizeof($document_studies);

        if($document_studies == [] or $results_count < 15) {

            $popular_document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
                FROM document_studies
                LEFT JOIN course ON document_studies.course_ID = course.course_ID
                LEFT JOIN college ON course.college_ID = college.college_ID
                LEFT JOIN tag ON document_studies.compiled_tag_ID = tag.compiled_tag_ID
                LEFT JOIN tag1 ON tag.tag1_ID = tag1.tag1_ID
                LEFT JOIN tag2 ON tag.tag2_ID = tag2.tag2_ID
                LEFT JOIN tag3 ON tag.tag3_ID = tag3.tag3_ID
                LEFT JOIN tag4 ON tag.tag4_ID = tag4.tag4_ID
                ORDER BY document_studies.views_count DESC
                ");

            $document_studies = array_merge($document_studies, $popular_document_studies);
            $document_studies = array_unique($document_studies, SORT_REGULAR);
            $document_studies = array_slice($document_studies, 0, 15, true);
        }
        if (auth::check()){
            return view('SessionViews.homepage', ['document_studies' => $document_studies, 'name' => $name]);
        }else{
            return view('SessionViews.homepage', ['document_studies' => $document_studies]);
        }
    }
    // public function profilepage()
    // {
    //     return view('SessionViews.profilepage');
    // }

    public function Search($college, $search)
    {
        if ($college != null) {

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
        return [$document_studies, $search];
    }

    public function viewpage($title){
        if (auth::check()){
            $userid = Auth::user()->id;
            $names = DB::table('users')
            ->leftJoin("student_info", "users.student_info_id", "=", "student_info.student_info_ID")
            ->select('student_info.firstname', 'student_info.surname')
            ->where('id', $userid )
            ->get();
            $name = $names[0]->firstname . " " . $names[0]->surname;
            }
        $document_studies = DB::table("document_studies")
        ->leftJoin("course", "document_studies.course_ID", "=", "course.course_ID")
        ->leftJoin("college", "course.college_ID", "=", "college.college_ID")
        ->leftJoin("tag", "document_studies.compiled_tag_ID", "=", "tag.compiled_tag_ID")
        ->leftJoin("tag1", "tag.tag1_ID", "=", "tag1.tag1_ID")
        ->leftJoin("tag2", "tag.tag2_ID", "=", "tag2.tag2_ID")
        ->leftJoin("tag3", "tag.tag3_ID", "=", "tag3.tag3_ID")
        ->leftJoin("tag4", "tag.tag4_ID", "=", "tag4.tag4_ID")
        ->where("document_studies.title", $title)->first();

        $view_count = $document_studies->views_count;
        $title_id = $document_studies->document_id;

        DB::table("document_studies")
        ->where("document_id", $title_id)
        ->update([
            'document_studies.views_count' => $view_count + 1
        ]);

        if(auth::check()){
            $uid = Auth::user()->id;
            $compiled_views_id = Auth::user()->compiled_views_id;
            if ($compiled_views_id != null) {
                $is_existing = false;
                //gets the views record
                $view_record = DB::select("SELECT * from document_views
                    where compiled_views_id = $compiled_views_id
                ");

                $view1 = $view_record[0]->view1;
                $view2 = $view_record[0]->view2;
                $view3 = $view_record[0]->view3;
                //compares if the search has been done before and update it
                if ($view2 == $title_id) {
                    DB::table('document_views')
                        ->where('compiled_views_id', $compiled_views_id)
                        ->update([
                            'view1' => $view2,
                            'view2' => $view1
                        ]);
                    $is_existing = true;
                }
                if ($view3 == $title_id) {
                    DB::table('document_views')
                        ->where('compiled_views_id', $compiled_views_id)
                        ->update([
                            'view1' => $view3,
                            'view2' => $view1,
                            'view2' => $view2
                        ]);
                    $is_existing = true;
                }
                if ($view1 == $title_id) {
                    $is_existing = true;
                }

                //creates new record if the view is new
                if (!$is_existing) {
                    DB::table('document_views')
                        ->where('compiled_views_id', $compiled_views_id)
                        ->update([
                            'view1' => $title_id,
                            'view2' => $view1,
                            'view3' => $view2
                        ]);
                }
            } else { //creates new record of view if user is first time clickingw
                DB::table('document_views')
                    ->insert([
                        'view1' => $title_id,
                    ]);
                $compiled_views_id = DB::select("SELECT compiled_views_id
                from document_views
                ORDER BY compiled_views_id DESC LIMIT 1
                ");
                DB::table('users')
                    ->where('id', $uid)
                    ->update([
                        'compiled_views_id' => $compiled_views_id[0]->compiled_views_id
                    ]);
            }
        }


        // $document_studies = DB::table('document_studies')->select('SELECT * FROM document_studies LIMIT 1');
        if(auth::check()){
            return view('SessionViews.viewpage', ['document_studies'=>$document_studies, 'name' => $name]);
        }else{
            return view('SessionViews.viewpage', ['document_studies'=>$document_studies]);
        }
    }

    public function fetchuser(){
        // $userid = Auth::user()->id;
        // // $names = $users;
        // $names = DB::table('users')
        // ->leftJoin("student_info", "users.student_info_id", "=", "student_info.student_info_ID")
        // ->select('student_info.firstname')
        // ->where('id', $userid )
        // ->get();

        if (auth::check()){
            $userid = Auth::user()->id;
            $names = DB::table('users')
            ->leftJoin("student_info", "users.student_info_id", "=", "student_info.student_info_ID")
            ->select('student_info.firstname', 'student_info.surname')
            ->where('id', $userid )
            ->get();
            $name = $names[0]->firstname . " " . $names[0]->surname;
            }


        // $firstnames = $name->firstname;
        // $surnames = $name->surname;
        if (auth::check()){
            return view('layouts.app', ['name'=>$name]);
        }else{
            return view('layouts.app');
        }
    }

    public function printpage(){
        return view('SessionViews.printpage');
    }
}
