@extends('layouts.master')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/users/about.css') }}" >
@endsection


@section('js')
    @parent

@endsection

@section('title', 'درباره‌ی ما')

@section('content')
    <div class="about-banner">
        <div class="white-color about-banner-right-section">
               <h1 class="right-text">بیشتر بدانید...</h1>
              <p>ما در یوفکس، با فراهم کردن بستری مطمئن، در تلاشیم تا کمی از فکس های سنتی فاصله بگیریم.</p>
            <p>یوفکس ، از سال ۱۳۹۹ شروع به کار کرد . وقتی که هزینه های خرید دستگاه فکس بالا رفته بود، ما تصمیم گرفتیم تا قوی ترین و با کیفیت ترین سرویس فکس رابه صورت اینترنتی به شما ارائه بدهیم.</p>
            <p> اولویت ما رضایت مشتری در کنار سرویسی با کیفیت میباشد. </p>
            <p>هدف ما گسترش و بهبود روز افزون یوفکس میباشد . </p>
            <p>امیدوارم باپیشنهاد ها و انتقاد های شما بتونیم مثل همیشه بهترین بمونیم.</p>

           </div>
        <div class="about-banner-left-section">
            <img src="{{asset('img/banner.png')}}" alt="">
        </div>
    </div>
@endsection