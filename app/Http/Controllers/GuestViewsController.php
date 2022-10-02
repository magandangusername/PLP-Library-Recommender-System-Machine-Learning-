<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestViewsController extends Controller
{
    public function guestaccountancy(){
        return view('GuestViews.guestaccountancy');
    }
    public function guestartsandscience(){
        return view('GuestViews.guestartsandscience');
    }
    public function guestcomputerstudies(){
        return view('GuestViews.guestcomputerstudies');
    }
    public function guesteducation(){
        return view('GuestViews.guesteducation');
    }
    public function guestengineering(){
        return view('GuestViews.guestengineering');
    }
    public function guesthotelmanagement(){
        return view('GuestViews.guesthotelmanagement');
    }
    public function guestnursing(){
        return view('GuestViews.guestnursing');
    }
    public function guesthomepage(){
        return view('GuestViews.guesthomepage');
    }
}
