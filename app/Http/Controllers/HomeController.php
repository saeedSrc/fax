<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Ticket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $packages = Package::all();
        $notAnswered = Ticket::all()->where('was_answered', 0);
        return view('users.home', compact('packages', 'notAnswered'));
    }
}
