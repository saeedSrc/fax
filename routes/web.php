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

// user about path
Route::get('/about', function () {
    return view('users.about');
});

Route::resource('user', 'UserController');

Route::resource('ticket', 'TicketController')->middleware('check.phone.auth');
Route::post('/create_ticket_message/{tid}','TicketController@CreateTicketMessage')->middleware('check.phone.auth');

// download answer image
Route::get('/download/answer/{image}','TicketController@DownloadAnswer');

// download question image
Route::get('/download/question/{image}','TicketController@DownloadQuestion');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/order/request','OrderController@Request')->middleware('check.phone.auth');
Route::get('/order/callback','OrderController@VerifyPayment');
Route::get('/order/success/{id}','OrderController@SuccessPage');
Route::get('/order/fail/{msg}','OrderController@FailPage');
Route::resource('order', 'OrderController')->middleware('check.phone.auth');

//login to round cube panel
Route::get('/login-panel','UserController@RoundCubeAutoLogin');

// admin controller
Route::prefix('admin')->group(function () {
    Route::get('/get_users_tickets','AdminController@GetUsersTickets');
    Route::get('/ticket/{id}','AdminController@ShowTicket');
    Route::post('/update_ticket/{tid}/{tmid}','AdminController@UpdateTicket');
});