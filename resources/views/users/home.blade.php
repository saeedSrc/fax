@extends('layouts.master')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/users/home.css') }}" >
@endsection


@section('js')
    @parent
         <script src="{{ asset('js/users/home.js') }}"></script>
@endsection

@section('title', 'خانه')

@section('content')
    <div class="home-banner">
        <div class="white-color home-banner-right-section">
               <h1 class="right-text">دریافت و ارسال فکس از طریف اینترنت</h1>
               <p>شما می توانید با یوفکس در بستر اینترت به ارسال فک اقدام نمایید ما در یو فکس به شما کمک میکنیم تا لذت ارتباط آنلاین را بار دیگر تجربه نمایید.</p>
               <a class="btn back-white-color lagevardi" href="#fax-packages">سفارش فکس آنلاین</a>
           </div>
        <div class="home-banner-left-section">
            <img src="{{asset('img/banner.png')}}" alt="">
        </div>
    </div>
    <div class="fax-spec">
        <div class="fax-spec-section">
            <img class="social-img" src="{{asset('img/send-fax.png')}}" alt="" style="">
            <h3>ارسال فکس</h3>
            <p class="gray-color">آنلاین فکس ارسال کنید.</p>
        </div>
        <div class="fax-spec-section">
            <img class="social-img" src="{{asset('img/recieve-fax.png')}}" alt="" style="">
            <h3>دریافت فکس</h3>
            <p class="gray-color">آنلاین فکس دریافت کنید.</p>
        </div>
        <div class="fax-spec-section">
            <img class="social-img" src="{{asset('img/dedicated-number.png')}}" alt="" style="">
            <h3>شماره اختصاصی</h3>
            <p class="gray-color">ارسال فکس همراه با شماره اختصاصی.</p>
        </div>
        <div class="fax-spec-section">
            <img class="social-img" src="{{asset('img/save-fax.png')}}" alt="" style="">
            <h3>ارسال فکس</h3>
            <p class="gray-color">ذخیره‌ی فکس‌های ارسالی</p>
        </div>
        <div class="fax-spec-section">
            <img class="social-img" src="{{asset('img/fax-email.png')}}" alt="" style="">
            <h3>ارسال فکس</h3>
            <p class="gray-color">ارسال فکس به ایمیل</p>
        </div>
        <div class="fax-spec-section">
            <img class="social-img" src="{{asset('img/fax-service.png')}}" alt="" style="">
            <h3>ارسال فکس</h3>
            <p class="gray-color">دریافت وب سرویس ارسال فکس</p>
        </div>
    </div>
    <div id='fax-packages' class="relative fax-packages white-color">
        <h2>تعرفه‌های ارسال فکس </h2>
        <img class="right-polygon" src="{{asset('img/Polygon.png')}}" alt="">
        <img class="left-polygon" src="{{asset('img/Rectangle.png')}}" alt="">
        @isset($packages)
            @foreach($packages as $package)
                <div class="fax-packages-content back-white-color lagevardi">
                    <img class="org-img" src="{{asset( $package->title_image )}}" alt="">
                    <h3 class="violet-color">{{ $package->title }}</h3>
                    <ul>
                        <li>
                            <div class="inline">
                                <img class="right" src="{{asset('img/check.png')}}" alt="">
                            </div>
                            <span>{{ $package->page_counts }}  صفحه فکس </span>
                        </li>
                        @if($package->send_receive_fax)
                        <li>
                            <div class="inline">
                                <img class="right" src="{{asset('img/check.png')}}" alt="">
                            </div>
                            <span>ارسال و دریافت فکس</span>
                        </li>
                        @endif
                        @if($package->number == "dedicate")
                        <li>
                            <div class="inline">
                                <img class="right" src="{{asset('img/check.png')}}" alt="">
                            </div>
                            <span>شماره اختصاصی</span>
                        </li>
                        @else
                            <li>
                                <div class="inline">
                                    <img class="right" src="{{asset('img/check.png')}}" alt="">
                                </div>
                                <span>شماره اشتراکی</span>
                            </li>
                            @endif
                        @if($package->service == "email")
                        <li>
                            <div class="inline">
                                <img class="right" src="{{asset('img/check.png')}}" alt="">
                            </div>
                            <span>ارسال فکس از طریق ایمیل</span>
                        </li>
                            @elseif($package->service == "panel")
                            <li>
                                <div class="inline">
                                    <img class="right" src="{{asset('img/check.png')}}" alt="">
                                </div>
                                <span>پنل تحت وب</span>
                            </li>
                            @else
                            <li>
                                <div class="inline">
                                    <img class="right" src="{{asset('img/check.png')}}" alt="">
                                </div>
                                <span>وب سرویس</span>
                            </li>
                            @endif

                        <li class="hide">
                            <div class="inline">
                                <img class="right" src="{{asset('img/check.png')}}" alt="">
                            </div>
                            <span>{{ $package->package_ttl_text }} </span>
                        </li>

                    </ul>
                    <h3 class="pink-color">{{ $package->price }} تومان</h3>
                    <div class="final-order">


                         {{--todo inja bayad un action ro benevisam ke id package o berize too session--}}
                    <form action="/order/request" method="post">
                        @csrf
                        <input type="hidden" name="package_id"  value="{{ $package->id }}">
                        <button class="btn submit-btn order">
                            سفارش
                        </button>
                    </form>

                    </div>

                </div>
                @endforeach
            @endisset

    </div>
    <div class="relative fax-flow white-color">
        <h2>مراحل ارسال فکس</h2>
        <img class="right-polygon" src="{{asset('img/Polygon.png')}}" alt="">
        <img class="left-polygon" src="{{asset('img/Rectangle.png')}}" alt="">
        <div class="flow">
            <div class="flow-section">
                <img  src="{{asset('img/file.png')}}" alt="">
                <h2>۱- انتخاب فایل</h2>
                <span>فایل خود را بازگذاری کنید.</span>
            </div>
            <img class="arrow" src="{{asset('img/Arrow.png')}}" alt="">
            <div class="flow-section">
                <img  src="{{asset('img/destination.png')}}" alt="">
                <h2>۲- شماره مقصد</h2>
                <span>شماره‌ی مقصد را وارد کنید.</span>
            </div>
            <img  class="arrow" src="{{asset('img/Arrow.png')}}" alt="">
            <div class="flow-section">
                <img  src="{{asset('img/send.png')}}" alt="">
                <h2>۳- ارسال</h2>
                <span>فکس خود را ارسال کنید.</span>
            </div>
        </div>
    </div>

   <div class="chosen-package-content">
   </div>
@endsection