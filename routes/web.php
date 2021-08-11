<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FlutterwaveController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
//profile image route update
//Route::post('dashboard.profile','UserController@profile');
//Route::post('dashboard.profile','UserController@updateAvatar');
// the route for the users to change to reset their passwords
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

//the route handles the form submission request from the forgot password view
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

//route necessary to actually reset the password once the user clicks on the password

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


//Route to actually handle the password reset form submission.
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




//auth route for both user and the admin
Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name ('dashboard');

    Route::get('/dashboard/BuyTicket', 'App\Http\Controllers\TicketController@index')->name ('dashboard.index');


    Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
// The callback url after a payment
    Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');

    Route::post('/webhook/flutterwave', [FlutterwaveController::class, 'webhook'])->name('webhook');

});


//auth route for the users
Route::group(['middleware' => ['auth', 'role:user']], function(){
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name ('dashboard.myprofile');
    //Route::post('dashboard/profile','UserController@profile');
    //Route::post('/dashboard/profile','App\Http\Controllers\DashboardController@updateAvatar')->name('dashboard.myprofile');
   
});
//profile photo route
Route::group(['middleware' => ['auth', 'role:user ']], function(){
    
});

// auth route for the admin only
Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::resource('admin', AdminController::class);
    Route::get('/dashboard/viewPayments', 'App\Http\Controllers\TicketController@view_pay')->name ('view_pay');
});

require __DIR__.'/auth.php';
