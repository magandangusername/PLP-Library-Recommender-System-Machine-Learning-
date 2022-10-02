<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewsController extends Controller
{
    public function manageaccount(){
        return view('AdminViews.manageaccount');
    }
    public function managedocument(){
        return view('AdminViews.managedocument');
    }
    public function addnewaccount(){
        return view('AdminViews.addnewaccount');
    }
    public function addnewdocument(){
        return view('AdminViews.addnewdocument');
    }
    

}
