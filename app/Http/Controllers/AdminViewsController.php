<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminViewsController extends Controller
{
    public function overview(){
        return view('AdminViews.overview');
    }
    public function manageaccount(){
        return view('AdminViews.manageaccount');
    }
    public function managedocument(){
        return view('AdminViews.managedocument');
    }
    public function addnewaccount(){
        $total_accounts = DB::select("SELECT COUNT('library_id_number') as total_accounts
            FROM student_info");


        $student_number = Str(Carbon::now()->format('y')).sprintf('%05d', $total_accounts[0]->total_accounts+1);


        return view('AdminViews.addnewaccount')->with(compact('student_number'));
    }
    public function addnewdocument(){
        return view('AdminViews.addnewdocument');
    }


}
