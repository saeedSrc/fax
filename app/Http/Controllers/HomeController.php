<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $orders = array();
        if (Auth::check()) {
            $orders = Order::orderByDesc('updated_at')->where(['user_id'=> Auth::user()->id, 'pay' => 'success'])->get();
            foreach ($orders as $order) {
                if($order->package_3 > 0) {
                    $order->package_name = Package::find(3)->title;
                }
                if($order->package_2 > 0) {
                    $order->package_name = Package::find(2)->title;
                }
                if($order->package_1 > 0) {
                    $order->package_name = Package::find(1)->title;
                }
            }
        }

        return view('users.home', compact('packages', 'notAnswered', 'orders'));
    }
}
