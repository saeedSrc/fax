<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * request to buy package.
     *
     * @param  int  $order_id
     * @return \Illuminate\Http\Response
     */
    public function Request(Request $request)
    {
        $package_id = $request->input('package_id');
        $package = Package::find($package_id) ;

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->price = $package->price;

        $order_package_id = "package_{$package_id}" ;
        $order->$order_package_id = 1;
        $order->save();

        // go to bank

        // on success
        $this->successPayment($order->id);
        return redirect('/');

    }

    /**
     * change payment state to success.
     *
     * @param  int  $order_id
     * @return \Illuminate\Http\Response
     */
    public function successPayment($orderId)
    {
        Order::find($orderId)->update(['pay'=> 'success']);
    }
}
