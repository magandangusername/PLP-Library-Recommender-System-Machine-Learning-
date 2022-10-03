<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SessionViewsController extends Controller
{
    public function accountancy(){
        return view('SessionViews.accountancy');
    }
    public function artsandscience(){
        return view('SessionViews.artsandscience');
    }
    public function computerstudies(){
        return view('SessionViews.computerstudies');
    }
    public function education(){
        return view('SessionViews.education');
    }
    public function engineering(){
        return view('SessionViews.engineering');
    }
    public function hotelmanagement(){
        return view('SessionViews.hotelmanagement');
    }
    public function nursing(){
        return view('SessionViews.nursing');
    }
    public function homepage(){
        $document_studies = DB::select('select * from document_studies');
        return view('SessionViews.homepage',['document_studies'=>$document_studies]);
    }
    public function recommendationpage(){
        return view('SessionViews.recommendationpage');
    }
    public function savedpage(){
        return view('SessionViews.savedpage');
    }
    public function profilepage(){
        return view('SessionViews.profilepage');
    }

}
