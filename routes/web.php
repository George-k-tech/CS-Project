<?php

use App\Mail\WelcomeMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FlutterwaveController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




//auth route for both user and the admin
Route::group(['middleware' => ['auth','verified']], function(){
 Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name ('dashboard');


 Route::get('/dashboard/BuyTicket', 'App\Http\Controllers\TicketController@index')->name ('dashboard.index');
    
    // The route that the button calls to initialize payment
 Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
// The callback url after a payment
 Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');

//the route for emails notifications 
Route::get('/email', function(){
            Mail::to('info@gmail.com')->send(new WelcomeMail());
            return redirect()->route('dashboard')->with('success', 'welcome Email sent');
    });

    //the route for notifications 
Route::get('/send-testenrollment','App\Http\Controllers\TestEnrollmentController@sendTestNotification')->name('testenrollment');

//auth route for the users
Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name ('dashboard.myprofile');

//password reset links
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');


Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');





});

// auth route for the admin only
Route::group(['middleware' => ['auth','verified', 'role:admin']], function(){
    Route::resource('admin', AdminController::class);
    Route::get('/dashboard/viewPayments', 'App\Http\Controllers\TicketController@view_pay')->name ('view_pay');
});

require __DIR__.'/auth.php';
