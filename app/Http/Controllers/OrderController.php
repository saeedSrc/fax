<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Symfony\Component\Console\Input\Input;


class OrderController extends Controller
{
    private $user_id;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user_id = Auth::user()->id;
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        $orders = Order::orderByDesc('updated_at')->where(['user_id'=> $this->user_id, 'pay' => 'success'])->get();
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
        return view('users.order.order_list', compact('orders'));
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
        $order->$order_package_id = 1; // for now set 1
        $order->save();

        session(['order_id' => $order->id]);
        // go to bank
        return  $this->zarinRequest();

    }

    /**
     * change payment state to success.
     *
     * @param  int  $order_id
     * @return \Illuminate\Http\Response
     */
    public function successPayment($orderId)
    {
        $order = Order::find($orderId);
        Order::where('id', $orderId)->update(['pay'=> 'success']);

        $pageCounts = 0;
        if($order->package_3 > 0) {
            $pageCounts = $this->getPackagePageCount(3);
        }
        if($order->package_2 > 0) {
            $pageCounts = $this->getPackagePageCount(2);
        }
        if($order->package_1 > 0) {
            $pageCounts = $this->getPackagePageCount(1);
        }

        $newUserPageCount = Auth::user()->pages + $pageCounts;
        User::where('id', Auth::user()->id)->update(['pages'=> $newUserPageCount]);


    }

    /**
     * pay invoice
     *
     * @param  int  $order_id
     * @return \Illuminate\Http\Response
     */
    public function zarinRequest()
    {
        $order_id = session('order_id');
        $order = Order::find($order_id);
        $invoice = (new Invoice)->amount($order->price);
        $invoice->detail(['detailName' => config('constants.bank_page_detail_name')]);

        return Payment::purchase($invoice, function($driver, $transactionId) {
            $order_id = session('order_id');
            Order::where('id', $order_id)->update(['zarinpal_authority'=> $transactionId]);
            }
        )->pay()->render();

    }

    /**
     * verify payment
     *
     * @param  int  $order_id
     * @return \Illuminate\Http\Response
     */
    public function VerifyPayment()
    {
        $transaction_id = request('Authority');
        $order_id = session('order_id');
        $order = Order::find($order_id);
        try {
            $receipt = Payment::amount($order->price)->transactionId($transaction_id)->verify();

            Order::where('id', $order_id)->update(['zarinpal_referenceId'=> $receipt->getReferenceId()]);
            $this->successPayment($order_id);
            session()->forget('order_id');
            return redirect('/order/success/'.$order_id);

        } catch (InvalidPaymentException $exception) {
            /**
            when payment is not verified, it will throw an exception.
            We can catch the exception to handle invalid payments.
            getMessage method, returns a suitable message that can be used in user interface.
             **/
            $failure_message = $exception->getMessage();
            session()->forget('order_id');
            return redirect('/order/fail/'.$failure_message);
        }
    }

    /**
     * success page
     *
     * @param  int  $order_id
     * @return \Illuminate\Http\Response
     */
    public function SuccessPage($order_id)
    {
        $order = Order::find($order_id);
        return view("users.order.success", compact('order')) ;
    }

    /**
     * fail page
     *
     * @param  int  $order_id
     * @return \Illuminate\Http\Response
     */
    public function FailPage($message)
    {
        return view("users.order.fail", compact('message')) ;
    }


    /**
     * get package page counts.
     *
     * @param  int  $order_id
     * @return \Illuminate\Http\Response
     */
    public function getPackagePageCount($packageID)
    {
     $package =  Package::find($packageID);
      return $package->page_counts;
    }
}
