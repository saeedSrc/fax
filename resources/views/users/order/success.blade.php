@extends('layouts.master')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/users/order/success.css') }}" >
@endsection


@section('js')
    @parent

@endsection

@section('title', 'ثبت سفارش')

@section('content')
    <div class="success-content">

        <div class="inline">
            <img  src="{{asset('img/check.png')}}" alt="" style="vertical-align: middle">
            <p style="vertical-align: middle">سفارش شما با موفقیت ثبت شد.</p>
        </div>
       <p> کد پیگیری :{{ $order->zarinpal_referenceId }} </p>
       <p><a class="btn home-link" href="/">بازگشت به صفحه‌ی اصلی</a></p>
    </div>



@endsection