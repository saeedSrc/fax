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

// home api
Route::get('/', function () {
    return view('users.home');
});

// user login api
Route::get('/login', function () {
    return view('users.login');
});

Route::resource('user', 'UserController');

Route::resource('ticket', 'TicketController');


