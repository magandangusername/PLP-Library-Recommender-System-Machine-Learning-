<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\AssignOp\ShiftLeft;

class SessionViewsController extends Controller
{
    public function accountancy(){
        $document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.document_college_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, document_college.document_college,document_course.document_course_ID, document_course.document_course, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
        FROM document_studies
        LEFT JOIN document_college ON document_studies.document_id = document_college.document_college_ID
        LEFT JOIN tag ON document_studies.document_id = tag.compiled_tag_ID
        LEFT JOIN tag1 ON document_studies.document_id = tag1.tag1_ID
		LEFT JOIN tag2 ON document_studies.document_id = tag2.tag2_ID
		LEFT JOIN tag3 ON document_studies.document_id = tag3.tag3_ID
		LEFT JOIN tag4 ON document_studies.document_id = tag4.tag4_ID
        LEFT JOIN document_course ON document_studies.document_id = document_course.document_course_ID
        WHERE document_college = 'College of Accountancy'");

        
        
        return view('SessionViews.accountancy',['document_studies'=>$document_studies]);
    }
    public function artsandscience(){
        $document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.document_college_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, document_college.document_college,document_course.document_course_ID, document_course.document_course, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
        FROM document_studies
        LEFT JOIN document_college ON document_studies.document_id = document_college.document_college_ID
        LEFT JOIN tag ON document_studies.document_id = tag.compiled_tag_ID
        LEFT JOIN tag1 ON document_studies.document_id = tag1.tag1_ID
		LEFT JOIN tag2 ON document_studies.document_id = tag2.tag2_ID
		LEFT JOIN tag3 ON document_studies.document_id = tag3.tag3_ID
		LEFT JOIN tag4 ON document_studies.document_id = tag4.tag4_ID
        LEFT JOIN document_course ON document_studies.document_id = document_course.document_course_ID
        WHERE document_college = 'College of Arts and Science'");

        return view('SessionViews.artsandscience',['document_studies'=>$document_studies]);
    }
    public function computerstudies(){
        $document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.document_college_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, document_college.document_college,document_course.document_course_ID, document_course.document_course, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
        FROM document_studies
        LEFT JOIN document_college ON document_studies.document_id = document_college.document_college_ID
        LEFT JOIN tag ON document_studies.document_id = tag.compiled_tag_ID
        LEFT JOIN tag1 ON document_studies.document_id = tag1.tag1_ID
		LEFT JOIN tag2 ON document_studies.document_id = tag2.tag2_ID
		LEFT JOIN tag3 ON document_studies.document_id = tag3.tag3_ID
		LEFT JOIN tag4 ON document_studies.document_id = tag4.tag4_ID
        LEFT JOIN document_course ON document_studies.document_id = document_course.document_course_ID
        WHERE document_college = 'College of Computer Studies'");

        return view('SessionViews.computerstudies',['document_studies'=>$document_studies]);
    }
    public function education(){
        $document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.document_college_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, document_college.document_college,document_course.document_course_ID, document_course.document_course, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
        FROM document_studies
        LEFT JOIN document_college ON document_studies.document_id = document_college.document_college_ID
        LEFT JOIN tag ON document_studies.document_id = tag.compiled_tag_ID
        LEFT JOIN tag1 ON document_studies.document_id = tag1.tag1_ID
		LEFT JOIN tag2 ON document_studies.document_id = tag2.tag2_ID
		LEFT JOIN tag3 ON document_studies.document_id = tag3.tag3_ID
		LEFT JOIN tag4 ON document_studies.document_id = tag4.tag4_ID
        LEFT JOIN document_course ON document_studies.document_id = document_course.document_course_ID
        WHERE document_college = 'College of Education'");

        return view('SessionViews.education',['document_studies'=>$document_studies]);
    }
    public function engineering(){
        $document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.document_college_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, document_college.document_college,document_course.document_course_ID, document_course.document_course, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
        FROM document_studies
        LEFT JOIN document_college ON document_studies.document_id = document_college.document_college_ID
        LEFT JOIN tag ON document_studies.document_id = tag.compiled_tag_ID
        LEFT JOIN tag1 ON document_studies.document_id = tag1.tag1_ID
		LEFT JOIN tag2 ON document_studies.document_id = tag2.tag2_ID
		LEFT JOIN tag3 ON document_studies.document_id = tag3.tag3_ID
		LEFT JOIN tag4 ON document_studies.document_id = tag4.tag4_ID
        LEFT JOIN document_course ON document_studies.document_id = document_course.document_course_ID
        WHERE document_college = 'College of Engineering'");

        return view('SessionViews.engineering',['document_studies'=>$document_studies]);
    }
    public function hotelmanagement(){
        $document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.document_college_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, document_college.document_college,document_course.document_course_ID, document_course.document_course, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
        FROM document_studies
        LEFT JOIN document_college ON document_studies.document_id = document_college.document_college_ID
        LEFT JOIN tag ON document_studies.document_id = tag.compiled_tag_ID
        LEFT JOIN tag1 ON document_studies.document_id = tag1.tag1_ID
		LEFT JOIN tag2 ON document_studies.document_id = tag2.tag2_ID
		LEFT JOIN tag3 ON document_studies.document_id = tag3.tag3_ID
		LEFT JOIN tag4 ON document_studies.document_id = tag4.tag4_ID
        LEFT JOIN document_course ON document_studies.document_id = document_course.document_course_ID
        WHERE document_college = 'College of Hotel Management'");

        return view('SessionViews.hotelmanagement',['document_studies'=>$document_studies]);
    }
    public function nursing(){
        $document_studies = DB::select("SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.document_college_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, document_college.document_college,document_course.document_course_ID, document_course.document_course, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
        FROM document_studies
        LEFT JOIN document_college ON document_studies.document_id = document_college.document_college_ID
        LEFT JOIN tag ON document_studies.document_id = tag.compiled_tag_ID
        LEFT JOIN tag1 ON document_studies.document_id = tag1.tag1_ID
		LEFT JOIN tag2 ON document_studies.document_id = tag2.tag2_ID
		LEFT JOIN tag3 ON document_studies.document_id = tag3.tag3_ID
		LEFT JOIN tag4 ON document_studies.document_id = tag4.tag4_ID
        LEFT JOIN document_course ON document_studies.document_id = document_course.document_course_ID
        WHERE document_college = 'College of Nurisng'");
        
        return view('SessionViews.nursing',['document_studies'=>$document_studies]);
    }
    public function homepage(){
        $document_studies = DB::select('SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.document_college_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, document_college.document_college,document_course.document_course_ID, document_course.document_course, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
        FROM document_studies
        LEFT JOIN document_college ON document_studies.document_id = document_college.document_college_ID
        LEFT JOIN tag ON document_studies.document_id = tag.compiled_tag_ID
        LEFT JOIN tag1 ON document_studies.document_id = tag1.tag1_ID
		LEFT JOIN tag2 ON document_studies.document_id = tag2.tag2_ID
		LEFT JOIN tag3 ON document_studies.document_id = tag3.tag3_ID
		LEFT JOIN tag4 ON document_studies.document_id = tag4.tag4_ID
        LEFT JOIN document_course ON document_studies.document_id = document_course.document_course_ID');
        
        return view('SessionViews.homepage',['document_studies'=>$document_studies]);
    }
    public function recommendationpage(){
        // $document_studies = DB::select('SELECT document_studies.document_id, document_studies.compiled_tag_ID, document_studies.document_college_ID, document_studies.document_number, document_studies.title, document_studies.date_submitted, document_studies.author, document_studies.document_type, document_studies.addedby, document_studies.document_status, document_studies.created_at, document_studies.updated_on, document_college.document_college,document_course.document_course_ID, document_course.document_course, tag.tag1_ID, tag.tag2_ID, tag.tag3_ID, tag.tag4_ID, tag1.tag1_ID, tag1.tag1, tag2.tag2_ID, tag2.tag2, tag3.tag3_ID, tag3.tag3, tag4.tag4_ID, tag4.tag4
        // FROM document_studies
        // LEFT JOIN document_college ON document_studies.document_id = document_college.document_college_ID
        // LEFT JOIN tag ON document_studies.document_id = tag.compiled_tag_ID
        // LEFT JOIN tag1 ON document_studies.document_id = tag1.tag1_ID
		// LEFT JOIN tag2 ON document_studies.document_id = tag2.tag2_ID
		// LEFT JOIN tag3 ON document_studies.document_id = tag3.tag3_ID
		// LEFT JOIN tag4 ON document_studies.document_id = tag4.tag4_ID
        // LEFT JOIN document_course ON document_studies.document_id = document_course.document_course_ID');
        
        //return view('SessionViews.recommendationpage',['document_studies'=>$document_studies]);
        return view('SessionViews.recommendationpage');
    }
    public function savedpage(){
        
        
        //return view('SessionViews.savedpage',['document_studies'=>$document_studies]);
        return view('SessionViews.savedpage');
    }
    public function profilepage(){
        return view('SessionViews.profilepage');
    }

}
