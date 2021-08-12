<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\TestEnrollment;

class TestEnrollmentController extends Controller
{
    
    public function sendTestNotification()
    {

            $user = User::first();
        $enrollmentData = [
            'body'=> 'you have received a new test notification',
            'enrollmentText' => 'you are allowed to enroll',
            'url' => url('/'),
            'thankyou'=>'you have 14 days to enroll',
        ];

        $user->notify(new TestEnrollment($enrollmentData));
    }
}
