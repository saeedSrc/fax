<?php

use Illuminate\Support\Facades\Route;

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

// home path
Route::get('/', function () {
    return view('users.home');
});

// user login path
Route::get('/login', function () {
    return view('users.login');
});

// user contact path
Route::get('/contact', function () {
    return view('users.contact');
});

// user phone authorize request path
Route::get('/phone_authorize_request', function () {
    return view('auth.phone_authorize_request');
});

// user phone authorize path
Route::post('/phone_authorize','UserController@SendAuthCode');

//Route::resource('user', 'UserController');

Route::resource('ticket', 'TicketController')->middleware('check.phone.auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
