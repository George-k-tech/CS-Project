<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

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
    /*public function profile() {
        return view('users.myprofile',array('user' => Auth::user()));
    }*/
    /*public function updateAvatar(Request $request){
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.'. $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' .$filename ));
            
            $user = Auth::user();
            $user->avatar=$filename;
           
        }
        return view('myprofile',array('user' => Auth::user()));
    }*/
}
