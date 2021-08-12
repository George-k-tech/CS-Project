<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function _construct(){

        $this->middleware(['auth', 'verified']);
    }


    public function index(){


        if(Auth::user()->hasRole('admin')){

            return view('admindashboard');

        }
        elseif(Auth::user()->hasRole('user')){

            return view('userdashboard');
        }

    }

    public function myprofile(){
        
        return view('users.myprofile');
    }
}
