<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

// auth route for the admin only
Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::resource('admin', AdminController::class);
});

require __DIR__.'/auth.php';
