<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        LEFT JOIN tag ON document_studies.document_id = tag.compiled_tag_ID
        LEFT JOIN tag1 ON document_studies.document_id = tag1.tag1_ID
		LEFT JOIN tag2 ON document_studies.document_id = tag2.tag2_ID
		LEFT JOIN tag3 ON document_studies.document_id = tag3.tag3_ID
		LEFT JOIN tag4 ON document_studies.document_id = tag4.tag4_ID
        LEFT JOIN college ON document_studies.document_id = college.college_ID
        WHERE course.college_ID = 2
        ");

        $allParameters = $request->query();
        if (isset($allParameters['search'])) {
            $document_studies = $this->Search('accountancy', $allParameters['search'])[0];
            $search = $this->Search('accountancy', $allParameters['search'])[1];
            return view('SessionViews.accountancy')->with(compact('document_studies', 'search' ));
        } else {
            return view('SessionViews.accountancy', ['document_studies' => $document_studies]);
        }
    }
    public function artsandscience()
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
        ");


        return view('SessionViews.artsandscience', ['document_studies' => $document_studies]);
    }
    public function computerstudies()
    {
        $document_studies = DB::select('SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
        FROM document_studies
        LEFT JOIN course ON document_studies.document_id = course.course_ID
        LEFT JOIN tag ON document_studies.document_id = tag.compiled_tag_ID
        LEFT JOIN tag1 ON document_studies.document_id = tag1.tag1_ID
		LEFT JOIN tag2 ON document_studies.document_id = tag2.tag2_ID
		LEFT JOIN tag3 ON document_studies.document_id = tag3.tag3_ID
		LEFT JOIN tag4 ON document_studies.document_id = tag4.tag4_ID
        LEFT JOIN college ON document_studies.document_id = college.college_ID');


        return view('SessionViews.computerstudies', ['document_studies' => $document_studies]);
    }
    public function education()
    {
        $document_studies = DB::select('SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
        FROM document_studies
        LEFT JOIN course ON document_studies.document_id = course.course_ID
        LEFT JOIN tag ON document_studies.document_id = tag.compiled_tag_ID
        LEFT JOIN tag1 ON document_studies.document_id = tag1.tag1_ID
		LEFT JOIN tag2 ON document_studies.document_id = tag2.tag2_ID
		LEFT JOIN tag3 ON document_studies.document_id = tag3.tag3_ID
		LEFT JOIN tag4 ON document_studies.document_id = tag4.tag4_ID
        LEFT JOIN college ON document_studies.document_id = college.college_ID');


        return view('SessionViews.education', ['document_studies' => $document_studies]);
    }
    public function engineering()
    {
        $document_studies = DB::select('SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
        FROM document_studies
        LEFT JOIN course ON document_studies.document_id = course.course_ID
        LEFT JOIN tag ON document_studies.document_id = tag.compiled_tag_ID
        LEFT JOIN tag1 ON document_studies.document_id = tag1.tag1_ID
		LEFT JOIN tag2 ON document_studies.document_id = tag2.tag2_ID
		LEFT JOIN tag3 ON document_studies.document_id = tag3.tag3_ID
		LEFT JOIN tag4 ON document_studies.document_id = tag4.tag4_ID
        LEFT JOIN college ON document_studies.document_id = college.college_ID');


        return view('SessionViews.engineering', ['document_studies' => $document_studies]);
    }
    public function hotelmanagement()
    {
        $document_studies = DB::select('SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
        FROM document_studies
        LEFT JOIN course ON document_studies.document_id = course.course_ID
        LEFT JOIN tag ON document_studies.document_id = tag.compiled_tag_ID
        LEFT JOIN tag1 ON document_studies.document_id = tag1.tag1_ID
		LEFT JOIN tag2 ON document_studies.document_id = tag2.tag2_ID
		LEFT JOIN tag3 ON document_studies.document_id = tag3.tag3_ID
		LEFT JOIN tag4 ON document_studies.document_id = tag4.tag4_ID
        LEFT JOIN college ON document_studies.document_id = college.college_ID');


        return view('SessionViews.hotelmanagement', ['document_studies' => $document_studies]);
    }
    public function nursing()
    {
        $document_studies = DB::select('SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
        FROM document_studies
        LEFT JOIN course ON document_studies.document_id = course.course_ID
        LEFT JOIN tag ON document_studies.document_id = tag.compiled_tag_ID
        LEFT JOIN tag1 ON document_studies.document_id = tag1.tag1_ID
		LEFT JOIN tag2 ON document_studies.document_id = tag2.tag2_ID
		LEFT JOIN tag3 ON document_studies.document_id = tag3.tag3_ID
		LEFT JOIN tag4 ON document_studies.document_id = tag4.tag4_ID
        LEFT JOIN college ON document_studies.document_id = college.college_ID');


        return view('SessionViews.nursing', ['document_studies' => $document_studies]);
    }
    public function homepage()
    {
        $document_studies = DB::select('SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.course_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, course.course, college.college_ID, college.college, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
        FROM document_studies
        LEFT JOIN course ON document_studies.document_id = course.course_ID
        LEFT JOIN tag ON document_studies.document_id = tag.compiled_tag_ID
        LEFT JOIN tag1 ON document_studies.document_id = tag1.tag1_ID
		LEFT JOIN tag2 ON document_studies.document_id = tag2.tag2_ID
		LEFT JOIN tag3 ON document_studies.document_id = tag3.tag3_ID
		LEFT JOIN tag4 ON document_studies.document_id = tag4.tag4_ID
        LEFT JOIN college ON document_studies.document_id = college.college_ID');


        return view('SessionViews.homepage', ['document_studies' => $document_studies]);
    }
    public function profilepage()
    {
        return view('SessionViews.profilepage');
    }

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
                WHERE document_studies.title LIKE '%" . $search . "%'
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
