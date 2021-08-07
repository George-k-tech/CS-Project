<?php

use Illuminate\Support\Facades\Route;
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
Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name ('dashboard');
});

//auth route for the users
Route::group(['middleware' => ['auth', 'role:user']], function(){
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name ('dashboard.myprofile');
});
Route::group(['middleware' => ['auth', 'role:user']], function(){
    Route::get('/dashboard/BuyTicket', 'App\Http\Controllers\TicketController@index')->name ('dashboard.index');
    //Route::post('/payTicket', 'App\Http\Controllers\TicketController@pay')->name ('dashboard.pay');
    // The route that the button calls to initialize payment
    Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
// The callback url after a payment
    Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');

});

// auth route for the admin only
Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::resource('admin', AdminController::class);
});

require __DIR__.'/auth.php';
