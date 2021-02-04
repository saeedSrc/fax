@extends('layouts.master')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/users/order/success.css') }}" >
@endsection


@section('js')
    @parent

@endsection

@section('title', 'لغو سفارش')

@section('content')
    <div class="success-content">
        <div class="inline">
            <p style="vertical-align: middle">{{ $message }}</p>
           <div><img src="{{asset('img/not-check.png')}}" alt="" style="vertical-align: middle; width: 50%"></div>
        </div>
        <p><a class="btn home-link" href="/">بازگشت به صفحه‌ی اصلی</a></p>
    </div>
@endsection