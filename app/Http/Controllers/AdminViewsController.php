<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Document_Studies;
use App\Models\Student_Info;
use App\Models\College;
use App\Models\Course;
use App\Models\Tag1;
use App\Models\Tag2;
use App\Models\Tag3;
use App\Models\Tag4;


class AdminViewsController extends Controller
{
    public function overview()
    {
        $document_studies = DB::table('document_studies')
            ->leftJoin('course', 'document_studies.course_ID', '=', 'course.course_ID')
            ->leftJoin('college', 'course.college_ID', '=', 'college.college_ID')
            ->leftjoin('tag', 'document_studies.compiled_tag_ID', '=', 'tag.compiled_tag_ID')
            ->leftjoin('tag1', 'tag.tag1_ID', '=', 'tag1.tag1_ID')
            ->leftjoin('tag2', 'tag.tag2_ID', '=', 'tag2.tag2_ID')
            ->leftjoin('tag3', 'tag.tag3_ID', '=', 'tag3.tag3_ID')
            ->leftjoin('tag4', 'tag.tag4_ID', '=', 'tag4.tag4_ID')
            ->select('document_studies.*', 'course.course', 'college.college_ID', 'college.college', 'tag.tag1_ID', 'tag.tag2_ID', 'tag.tag3_ID', 'tag.tag4_ID', 'tag1.tag1_ID', 'tag1.tag1', 'tag2.tag2_ID', 'tag2.tag2', 'tag3.tag3_ID', 'tag3.tag3', 'tag4.tag4_ID', 'tag4.tag4')
            ->get();
        $student_info = DB::table('users')
            ->leftJoin('student_info', 'users.student_info_ID', '=', 'student_info.student_info_ID')
            ->leftJoin('course', 'student_info.course_ID', '=', 'course.course_ID')
            ->leftJoin('college', 'course.college_ID', '=', 'college.college_ID')
            ->select('users.*', 'student_info.*', 'course.course', 'college.college_ID', 'college.college')
            ->get();
        // $student_count = $student_info->count();
        // // accountancy_college_count
        // $bsa = DB::table('student_info')->where('student_info.course_ID', 2)->count();
        // $bsba = DB::table('student_info')->where('student_info.course_ID', 3)->count();
        // $bse = DB::table('student_info')->where('student_info.course_ID', 4)->count();
        // $accountancy_student_count = $bsa + $bsba + $bse;
        $document_count = $document_studies->count();
        $thesis_count = DB::table('document_studies')->where('document_type', 'Thesis')->count();
        $research_count = DB::table('document_studies')->where('document_type', 'Research')->count();
        //document overview for college of accountancy
        $docubsa = DB::table('document_studies')->where('document_studies.course_ID', 2)->count();
        $docubsba = DB::table('document_studies')->where('document_studies.course_ID', 3)->count();
        $docubse = DB::table('document_studies')->where('document_studies.course_ID', 4)->count();
        $accountancy_docu_count = $docubsa + $docubsba + $docubse;
        $thbsa = DB::table('document_studies')->where('document_studies.course_ID', 2)->where('document_type', 'Thesis')->count();
        $thbsba = DB::table('document_studies')->where('document_studies.course_ID', 3)->where('document_type', 'Thesis')->count();
        $thbse = DB::table('document_studies')->where('document_studies.course_ID', 4)->where('document_type', 'Thesis')->count();
        $accountancy_th_count = $thbsa + $thbsba + $thbse;
        $rsbsa = DB::table('document_studies')->where('document_studies.course_ID', 2)->where('document_type', 'Research')->count();
        $rsbsba = DB::table('document_studies')->where('document_studies.course_ID', 3)->where('document_type', 'Research')->count();
        $rsbse = DB::table('document_studies')->where('document_studies.course_ID', 4)->where('document_type', 'Research')->count();
        $accountancy_rs_count = $rsbsa + $rsbsba + $rsbse;

        //document overview for college of arts and sciences
        $artscie_docu_count = DB::table('document_studies')->where('document_studies.course_ID', 1)->count();
        $th_artscie = DB::table('document_studies')->where('document_studies.course_ID', 1)->where('document_type', 'Thesis')->count();
        $rs_artscie = DB::table('document_studies')->where('document_studies.course_ID', 1)->where('document_type', 'Research')->count();

        //document overview for college of computer studies
        $docu_cs = DB::table('document_studies')->where('document_studies.course_ID', 9)->count();
        $docu_it = DB::table('document_studies')->where('document_studies.course_ID', 10)->count();
        $ccs_docu_count = $docu_cs + $docu_it;
        $th_cs = DB::table('document_studies')->where('document_studies.course_ID', 9)->where('document_type', 'Thesis')->count();
        $th_it = DB::table('document_studies')->where('document_studies.course_ID', 10)->where('document_type', 'Thesis')->count();
        $ccs_th_count = $th_cs + $th_it;
        $rs_cs = DB::table('document_studies')->where('document_studies.course_ID', 9)->where('document_type', 'Research')->count();
        $rs_it = DB::table('document_studies')->where('document_studies.course_ID', 10)->where('document_type', 'Research')->count();
        $ccs_rs_count = $rs_cs + $rs_it;

        //document overview for college of education
        $docu_pe = DB::table('document_studies')->where('document_studies.course_ID', 6)->count();
        $docu_se = DB::table('document_studies')->where('document_studies.course_ID', 7)->count();
        $educ_docu_count = $docu_pe + $docu_se;
        $th_pe = DB::table('document_studies')->where('document_studies.course_ID', 6)->where('document_type', 'Thesis')->count();
        $th_se = DB::table('document_studies')->where('document_studies.course_ID', 7)->where('document_type', 'Thesis')->count();
        $educ_th_count = $th_pe + $th_se;
        $rs_pe = DB::table('document_studies')->where('document_studies.course_ID', 6)->where('document_type', 'Research')->count();
        $rs_se = DB::table('document_studies')->where('document_studies.course_ID', 7)->where('document_type', 'Research')->count();
        $educ_rs_count = $rs_pe + $rs_se;

        //document overview for college of engineering
        $eng_docu_count = DB::table('document_studies')->where('document_studies.course_ID', 8)->count();
        $th_eng = DB::table('document_studies')->where('document_studies.course_ID', 8)->where('document_type', 'Thesis')->count();
        $rs_eng = DB::table('document_studies')->where('document_studies.course_ID', 8)->where('document_type', 'Research')->count();

        //document overview for college of hotel management
        $hm_docu_count = DB::table('document_studies')->where('document_studies.course_ID', 5)->count();
        $th_hm = DB::table('document_studies')->where('document_studies.course_ID', 5)->where('document_type', 'Thesis')->count();
        $rs_hm = DB::table('document_studies')->where('document_studies.course_ID', 5)->where('document_type', 'Research')->count();

        //document overview for college of nursing
        $nurs_docu_count = DB::table('document_studies')->where('document_studies.course_ID', 11)->count();
        $th_nurs = DB::table('document_studies')->where('document_studies.course_ID', 11)->where('document_type', 'Thesis')->count();
        $rs_nurs = DB::table('document_studies')->where('document_studies.course_ID', 11)->where('document_type', 'Research')->count();

        return view(
            'AdminViews.overview',
            [
                'document_studies' => $document_studies,
                'student_info' => $student_info,
                'document_count' => $document_count,
                'thesis_count' => $thesis_count,
                'research_count' => $research_count,
                'accountancy_docu_count' => $accountancy_docu_count,
                'accountancy_th_count' => $accountancy_th_count,
                'accountancy_rs_count' => $accountancy_rs_count,
                'artscie_docu_count' => $artscie_docu_count,
                'th_artscie' => $th_artscie,
                'rs_artscie' => $rs_artscie,
                'ccs_docu_count' => $ccs_docu_count,
                'ccs_th_count' => $ccs_th_count,
                'ccs_rs_count' => $ccs_rs_count,
                'educ_docu_count' => $educ_docu_count,
                'educ_th_count' => $educ_th_count,
                'educ_rs_count' => $educ_rs_count,
                'eng_docu_count' => $eng_docu_count,
                'th_eng' => $th_eng,
                'rs_eng' => $rs_eng,
                'hm_docu_count' => $hm_docu_count,
                'th_hm' => $th_hm,
                'rs_hm' => $rs_hm,
                'nurs_docu_count' => $nurs_docu_count,
                'th_nurs' => $th_nurs,
                'rs_nurs' => $rs_nurs,
                // 'student_count'=>$student_count,
                // 'accountancy_student_count'=>$accountancy_student_count,
            ]
        );
    }
    public function manageaccount()
    {

        return view('AdminViews.manageaccount');
    }
    public function managedocument()
    {
        $document_studies = DB::table('document_studies')
            ->leftJoin('course', 'document_studies.course_ID', '=', 'course.course_ID')
            ->leftJoin('college', 'course.college_ID', '=', 'college.college_ID')
            ->leftjoin('tag', 'document_studies.compiled_tag_ID', '=', 'tag.compiled_tag_ID')
            ->leftjoin('tag1', 'tag.tag1_ID', '=', 'tag1.tag1_ID')
            ->leftjoin('tag2', 'tag.tag2_ID', '=', 'tag2.tag2_ID')
            ->leftjoin('tag3', 'tag.tag3_ID', '=', 'tag3.tag3_ID')
            ->leftjoin('tag4', 'tag.tag4_ID', '=', 'tag4.tag4_ID')
            ->select('document_studies.*', 'course.course', 'college.college_ID', 'college.college', 'tag.tag1_ID', 'tag.tag2_ID', 'tag.tag3_ID', 'tag.tag4_ID', 'tag1.tag1_ID', 'tag1.tag1', 'tag2.tag2_ID', 'tag2.tag2', 'tag3.tag3_ID', 'tag3.tag3', 'tag4.tag4_ID', 'tag4.tag4')
            ->get();



        if (isset($_POST['delete'])) {
            // $deleted = DB::table('document_studies')->delete();

            $deleted = DB::table('document_studies')
            ->leftJoin('course', 'document_studies.course_ID', '=', 'course.course_ID')
            ->leftJoin('college', 'course.college_ID', '=', 'college.college_ID')
            ->leftjoin('tag', 'document_studies.compiled_tag_ID', '=', 'tag.compiled_tag_ID')
            ->leftjoin('tag1', 'tag.tag1_ID', '=', 'tag1.tag1_ID')
            ->leftjoin('tag2', 'tag.tag2_ID', '=', 'tag2.tag2_ID')
            ->leftjoin('tag3', 'tag.tag3_ID', '=', 'tag3.tag3_ID')
            ->leftjoin('tag4', 'tag.tag4_ID', '=', 'tag4.tag4_ID')
            ->where('document_studies.document_id', '=', $_POST['delete'])->delete();

            DB::table('document_views')
            ->where('view1', '=', $_POST['delete'])
            ->update([
                'view1' => 'view2',
                'view2' => 'view3',
                'view3' => null
            ]);
            DB::table('document_views')
            ->where('view2', '=', $_POST['delete'])
            ->update([
                'view2' => 'view3',
                'view3' => null
            ]);
            DB::table('document_views')
            ->where('view3', '=', $_POST['delete'])
            ->update([
                'view3' => null
            ]);
            // $documentID = $_POST['documentID'];

            // $delete_user = $conn->query("DELETE FROM tnr_dataset
            //     WHERE ID = '$documentID'");

            echo "<script> alert('Document information deleted');</script>";
            return view('AdminViews.managedocument', ['delete' => $deleted]);
        }
        // if (isset($_POST['submitedit'])) {
        //     $documentID = $_POST['documentID'];
        //     $title = $_POST['title'];
        //     $author = $_POST['author'];
        //     $year = $_POST['year'];
        //     $kind = $_POST['kind'];
        //     $college = $_POST['college'];
        //     $content = $_POST['content'];
        //     $links = $_POST['links'];

        //     $update = $conn->query("UPDATE tnr_dataset SET
        // Title = '$title',
        // Author = '$author',
        // Year = '$year',
        // Kind_of_Paper = '$kind',
        // College = '$college',
        // Content = '$content',
        // Links = '$links'
        // WHERE ID = '$documentID'");
        // }
        else {
            return view('AdminViews.managedocument', ['document_studies' => $document_studies]);
        }
    }

    public function modifydocument(Request $request)
    {
        $document_studies = DB::table('document_studies')
            ->leftJoin('course', 'document_studies.course_ID', '=', 'course.course_ID')
            ->leftJoin('college', 'course.college_ID', '=', 'college.college_ID')
            ->leftjoin('tag', 'document_studies.compiled_tag_ID', '=', 'tag.compiled_tag_ID')
            ->leftjoin('tag1', 'tag.tag1_ID', '=', 'tag1.tag1_ID')
            ->leftjoin('tag2', 'tag.tag2_ID', '=', 'tag2.tag2_ID')
            ->leftjoin('tag3', 'tag.tag3_ID', '=', 'tag3.tag3_ID')
            ->leftjoin('tag4', 'tag.tag4_ID', '=', 'tag4.tag4_ID')
            ->select('document_studies.*', 'course.course', 'college.college_ID', 'college.college', 'tag.tag1_ID', 'tag.tag2_ID', 'tag.tag3_ID', 'tag.tag4_ID', 'tag1.tag1_ID', 'tag1.tag1', 'tag2.tag2_ID', 'tag2.tag2', 'tag3.tag3_ID', 'tag3.tag3', 'tag4.tag4_ID', 'tag4.tag4')
            ->get();
        if ($request->input('deletedocument') !== null) {
            $docucheck = DB::table('document_studies')
                ->where('document_id', $request->input('deletedocument'))
                ->count();


            if ($docucheck != 0) {
                DB::table('document_studies')
                    ->leftJoin('course', 'document_studies.course_ID', '=', 'course.course_ID')
                    ->leftJoin('college', 'course.college_ID', '=', 'college.college_ID')
                    ->leftjoin('tag', 'document_studies.compiled_tag_ID', '=', 'tag.compiled_tag_ID')
                    ->leftjoin('tag1', 'tag.tag1_ID', '=', 'tag1.tag1_ID')
                    ->leftjoin('tag2', 'tag.tag2_ID', '=', 'tag2.tag2_ID')
                    ->leftjoin('tag3', 'tag.tag3_ID', '=', 'tag3.tag3_ID')
                    ->leftjoin('tag4', 'tag.tag4_ID', '=', 'tag4.tag4_ID')->select('document_studies.*', 'course.course', 'college.college_ID', 'college.college', 'tag.tag1_ID', 'tag.tag2_ID', 'tag.tag3_ID', 'tag.tag4_ID', 'tag1.tag1_ID', 'tag1.tag1', 'tag2.tag2_ID', 'tag2.tag2', 'tag3.tag3_ID', 'tag3.tag3', 'tag4.tag4_ID', 'tag4.tag4')
                    ->where('document_id', $request->input('deletedocument'))
                    ->delete();

                DB::statement('UPDATE document_views SET view1 = view2, view2 = view3, view3 = null where view1 = '.$request->input('deletedocument'));
                DB::statement('UPDATE document_views SET view2 = view3, view3 = null where view1 = '.$request->input('deletedocument'));

                // DB::table('document_views')
                // ->where('view1', '=', $request->input('deletedocument'))
                // ->update([
                //     'view1' => 'view2',
                //     'view2' => 'view3',
                //     'view3' => null
                // ]);
                // DB::table('document_views')
                // ->where('view2', '=', $request->input('deletedocument'))
                // ->update([
                //     'view2' => 'view3',
                //     'view3' => null
                // ]);
                DB::table('document_views')
                ->where('view3', '=', $request->input('deletedocument'))
                ->update([
                    'view3' => null
                ]);
            } else {
                return redirect(route('managedocument') . '?error=Problem deleting document');
            }


            return redirect(route('managedocument') . '?success=Document has been deleted.');
        }

        if ($request->input('editdocument') !== null) {
            $editdocument = DB::table('document_studies')
                ->leftjoin('tag', 'document_studies.compiled_tag_ID', '=', 'tag.compiled_tag_ID')
                ->leftjoin('tag1', 'tag.tag1_ID', '=', 'tag1.tag1_ID')
                ->leftjoin('tag2', 'tag.tag2_ID', '=', 'tag2.tag2_ID')
                ->leftjoin('tag3', 'tag.tag3_ID', '=', 'tag3.tag3_ID')
                ->leftjoin('tag4', 'tag.tag4_ID', '=', 'tag4.tag4_ID')
                ->where('document_id', $request->input('editdocument'))
                ->first();

            // this is not right, just a temporary fix
            $document_types = DB::table('document_studies')->select('document_type')->distinct('document_type')->get();
            $courses = DB::table('course')->distinct('course')->get();



            $edit = true;

            return view('AdminViews.managedocument')->with(compact('document_studies', 'editdocument', 'edit', 'document_types', 'courses'));
        }

        if ($request->input('submitedit') !== null) {

            $request->validate([
                'document_ID' => 'required',
                'availability' => 'required',
                'title' => 'required',
                'author' => 'required',
                'date_submitted' => 'required',
                'document_type' => 'required',
                'course_id' => 'required',
                'tag1' => 'required',
                'tag2' => 'required',
                'tag3' => 'required',
                'tag4' => 'required',
                'submitedit' => 'required',
                'document_status' => 'required',
                'abstract' => 'required'
            ]);
            DB::table('document_studies')
            ->where('document_id', $request->input('document_ID'))
            ->update([
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'date_submitted' => $request->input('date_submitted'),
                'document_type' => $request->input('document_type'),
                'course_id' => $request->input('course_id'),
                'availability' => $request->input('availability'),
                // 'tag1' => $request->input('promotion_end'),
                // 'tag2' => $request->input('terms_conditions1'),
                // 'tag3' => $request->input('terms_conditions2'),
                // 'tag4' => $request->input('terms_conditions3'),
                'document_status' => $request->input('document_status'),
                'abstract' => $request->input('abstract')
            ]);
            DB::table('tag')
            ->leftjoin('tag1', 'tag.tag1_ID', '=', 'tag1.tag1_ID')
            ->leftjoin('tag2', 'tag.tag2_ID', '=', 'tag2.tag2_ID')
            ->leftjoin('tag3', 'tag.tag3_ID', '=', 'tag3.tag3_ID')
            ->leftjoin('tag4', 'tag.tag4_ID', '=', 'tag4.tag4_ID')
            ->where('compiled_tag_ID', $request->input('submitedit'))
            ->update([
                'tag1.tag1' => $request->input('tag1'),
                'tag2.tag2' => $request->input('tag2'),
                'tag3.tag3' => $request->input('tag3'),
                'tag4.tag4' => $request->input('tag4')
            ]);




            return redirect(route('managedocument').'?success=Book "'.$request->input('title').'" has been edited.');
        }
    }


    public function addnewaccount()
    {
        $total_accounts = DB::select("SELECT COUNT('library_id_number') as total_accounts
            FROM student_info");


        $student_number = Str(Carbon::now()->format('y')) . sprintf('%05d', $total_accounts[0]->total_accounts + 1);


        return view('AdminViews.addnewaccount')->with(compact('student_number'));
    }
    public function addnewdocument()
    {
        $document_studies = DB::table('document_studies')
        ->leftJoin('course', 'document_studies.course_ID', '=', 'course.course_ID')
        ->leftJoin('college', 'course.college_ID', '=', 'college.college_ID')
        ->leftjoin('tag', 'document_studies.compiled_tag_ID', '=', 'tag.compiled_tag_ID')
        ->leftjoin('tag1', 'tag.tag1_ID', '=', 'tag1.tag1_ID')
        ->leftjoin('tag2', 'tag.tag2_ID', '=', 'tag2.tag2_ID')
        ->leftjoin('tag3', 'tag.tag3_ID', '=', 'tag3.tag3_ID')
        ->leftjoin('tag4', 'tag.tag4_ID', '=', 'tag4.tag4_ID')
        ->select('document_studies.*', 'course.course', 'college.college_ID', 'college.college', 'tag.tag1_ID', 'tag.tag2_ID', 'tag.tag3_ID', 'tag.tag4_ID', 'tag1.tag1_ID', 'tag1.tag1', 'tag2.tag2_ID', 'tag2.tag2', 'tag3.tag3_ID', 'tag3.tag3', 'tag4.tag4_ID', 'tag4.tag4')
        ->get();

        $document_count = DB::table('document_studies')
        ->orderBy('document_id', 'DESC')
        ->first()
        ->document_id;

        $courses =  DB::table('course')
        ->get();

        return view('AdminViews.addnewdocument', ['document_count'=>$document_count, 'document_studies'=>$document_studies, 'courses'=>$courses]);
    }

    public function adddocument(Request $request){
        $document_types = DB::table('document_studies')->select('document_type')->distinct('document_type')->get();
        $courses = DB::table('course')->distinct('course')->get();

        if ($request->input('adddocument') != null) {
            $request->validate([
                'document_number' => 'required',
                'title' => 'required',
                'availability' => 'required',
                'author' => 'required',
                'date_submitted' => 'required',
                'course_ID' => 'required',
                'document_type' => 'required',
                'document_status' => 'required',
                'tag1' => 'required',
                'tag2' => 'required',
                'tag3' => 'required',
                'tag4' => 'required',
                'addedby' => 'required',
                'abstract' => 'required'

            ]);

            // $document_count = DB::table('document_studies')
            //     ->orderBy('document_id', 'DESC')
            //     ->first()
            //     ->document_id + 1;

            DB::table('tag1')
            ->insert([
                'tag1' => $request->input('tag1')
            ]);
            DB::table('tag2')
            ->insert([
                'tag2' => $request->input('tag2')
            ]);
            DB::table('tag3')
            ->insert([
                'tag3' => $request->input('tag3')
            ]);
            DB::table('tag4')
            ->insert([
                'tag4' => $request->input('tag4')
            ]);

            $tag1_ID = DB::table('tag1')
            ->orderBy('tag1_ID', 'DESC')
            ->first()
            ->tag1_ID;
            $tag2_ID = DB::table('tag2')
            ->orderBy('tag2_ID', 'DESC')
            ->first()
            ->tag2_ID;
            $tag3_ID = DB::table('tag3')
            ->orderBy('tag3_ID', 'DESC')
            ->first()
            ->tag3_ID;
            $tag4_ID = DB::table('tag4')
            ->orderBy('tag4_ID', 'DESC')
            ->first()
            ->tag4_ID;

            DB::table('tag')
            ->insert([
                'tag1_ID' => $tag1_ID,
                'tag2_ID' => $tag2_ID,
                'tag3_ID' => $tag3_ID,
                'tag4_ID' => $tag4_ID,
            ]);

            $compiled_tag_ID = DB::table('tag')
            ->orderBy('compiled_tag_ID', 'DESC')
            ->first()
            ->compiled_tag_ID;



            DB::table('document_studies')
            ->insert([
                'document_number' => $request->input('document_number'),
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'date_submitted' => $request->input('date_submitted'),
                'document_type' => $request->input('document_type'),
                'course_ID' => $request->input('course_ID'),
                'document_status' => $request->input('document_status'),
                'addedby' => $request->input('addedby'),
                'availability' => $request->input('availability'),
                'compiled_tag_ID' => $compiled_tag_ID,
                'abstract' => $request->input('abstract')
            ]);




            return redirect(route('adddocument').'?success=Book "'.$request->input('title').'" has been added successfully.');
    }
}
}

