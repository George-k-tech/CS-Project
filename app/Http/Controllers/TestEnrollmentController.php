<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\TestEnrollment;

class TestEnrollmentController extends Controller
{
    public function index(){

        return view('email.Notification');
    }
    
    public function sendTestNotification()
    {

            $users = User::all();
            foreach($users as $user){

                $enrollmentData = [
                    'body'=> request()->welcome,
                    'enrollmentText' => request()->notification,
                    'url' => url('/'),
                    'thankyou'=>request()->close,
                ];
        
                $user->notify(new TestEnrollment($enrollmentData));

            }
        
            return redirect()->route('notify')->with('success','users are notified');
    }
}
