<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Auth
Auth::routes();

// user phone authorize request path
Route::get('/phone_authentication_request', function () {
    return view('auth.phone_authorize_request');
});

// user phone authorize path
Route::post('/phone_authorize','UserController@PostPhoneAuthenticationForm');

// user phone authorize path
Route::get('/phone_authorize','UserController@GetPhoneAuthenticationForm');

// user phone authorize path
Route::post('/final_authenticate','UserController@FinalAuthenticate');

// user contact path
Route::get('/contact', function () {
    return view('users.contact');
});

Route::resource('user', 'UserController');

Route::resource('ticket', 'TicketController')->middleware('check.phone.auth');
Route::post('/create_ticket_message/{tid}','TicketController@CreateTicketMessage')->middleware('check.phone.auth');

// download image
Route::get('/download/{image}','TicketController@Download');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/order/request','OrderController@Request')->middleware('check.phone.auth');

// admin controller
Route::prefix('admin')->group(function () {
    Route::get('/get_users_tickets','AdminController@GetUsersTickets');
    Route::get('/ticket/{id}','AdminController@ShowTicket');
    Route::post('/update_ticket/{tid}/{tmid}','AdminController@UpdateTicket');
});