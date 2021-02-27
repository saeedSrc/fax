@extends('layouts.master')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/users/home.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/users/order/order_list.css') }}" >
@endsection


@section('js')
    @parent
         <script src="{{ asset('js/users/home.js') }}"></script>
@endsection

@section('title', 'خانه')

@section('content')
    <div class="home-banner">
        <div class="white-color home-banner-right-section">
               <h1 class="right-text">سرویس فکس اینترنتی یوفکس</h1>
               <p>با یوفکس، در کمترین زمان، با کمترین هزینه، بدون نیاز به خط تلفن، ارسال و دریافت فکس داشته باشید.</p>
               <a class="btn back-white-color lagevardi" href="#fax-packages">سفارش فکس آنلاین</a>
           </div>
        <div class="home-banner-left-section">
            <img src="{{asset('img/banner.png')}}" alt="">
        </div>
    </div>
    @if(auth()->check())
        <div class="contact-content back-white-color1">
            <div class="user-desc">
                <h2> <img  class="middle" src="{{asset('img/user.png')}}" alt="" style=""> مشخصات شما‌:</h2>
                <table id="desktop-view">
                    <tr>
                        <th>نام :</th>
                        <th>نام خانوادگی:</th>
                        <th>شماره موبایل:</th>
                        <th>شماره اشتراکی:</th>
                    </tr>

                <tr>
                    <td>{{auth()->user()->first_name}}  </td>
                    <td>{{auth()->user()->last_name}}  </td>
                    <td>{{auth()->user()->phone}}  </td>
                    <td>{{auth()->user()->fax_shared_number}}  </td>
                </tr>
                </table>
                <table id="mobile-view">
                    <tr>
                        <th>نام :</th>
                        <td>{{auth()->user()->first_name}}  </td>
                    </tr>
                    <tr>
                        <th>نام خانوادگی:</th>
                        <td>{{auth()->user()->last_name}}  </td>
                    </tr>
                    <tr>
                        <th>شماره موبایل:</th>
                        <td style="color: white!important;">{{auth()->user()->phone}}  </td>
                    </tr>

                        <th>شماره اشتراکی:</th>
                        <td>{{auth()->user()->fax_shared_number}}  </td>
                    </tr>

                    <tr>




                    </tr>
                </table>
                <h2><span class="red-color free-page-count">۵ صفحه</span> فکس جهت ارسال به صورت رایگان برای شروع به شما اختصاص یافت.</h2>
            </div>
            <div class="orders">

                <h2 class="violet-color">سفارش‌های من</h2>
                @if(count($orders) > 0)
                    <table>
                        <tr>
                            <th>نام پکیج</th>
                            <th>تعداد</th>
                            <th>تاریخ ثبت سفارش</th>
                        </tr>
                        @foreach($orders as $order)

                            <tr>
                                <td>{{ $order->package_name }}</td>
                                <td>1</td>
                                <td><span class="persian-time">{{  date('H:i:s d-m-Y', strtotime($order->created_at)) }}</span></td>
                            </tr>
                        @endforeach
                    </table>
                @endif
                @if(count($orders) == 0)
                    <h3 class="center gray-color empty-bag">سفارشی وجود ندارد.</h3>
                @endif
            </div>
        </div>
        @else
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
    @endif
    <div id='fax-packages' class="relative fax-packages white-color">
        <h2>تعرفه‌های ارسال فکس </h2>
        <img class="right-polygon" src="{{asset('img/Polygon.png')}}" alt="">
        <img class="left-polygon" src="{{asset('img/Rectangle.png')}}" alt="">
        @isset($packages)
            @foreach($packages as $package)
                <div class="fax-packages-content back-white-color lagevardi">
                    <img class="org-img" src="{{asset( $package->title_image )}}" alt="">
                    <h1 class="violet-color">{{ $package->title }}</h1>
                  <div class="package-detail">
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
                      <h2 class="pink-color"> <span class="price">{{ $package->price }}</span> تومان</h2>
                  </div>
                    <div class="final-order">
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