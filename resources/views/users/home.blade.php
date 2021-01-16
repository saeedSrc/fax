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
               <a class="btn back-white-color lagevardi">سفارش فکس آنلاین</a>
           </div>
        <div class="home-banner-left-section">
            <img src="{{asset('img/banner.png')}}" alt="">
        </div>
    </div>
    <div class="fax-spec">
        <div class="fax-spec-section">
            <img class="social-img" src="{{asset('img/fax-email.png')}}" alt="" style="">
            <h3>ارسال فکس</h3>
            <p class="gray-color">آنلاین فکس ارسال کنید.</p>
        </div>
        <div class="fax-spec-section">
            <img class="social-img" src="{{asset('img/fax-email.png')}}" alt="" style="">
            <h3>ارسال فکس</h3>
            <p class="gray-color">آنلاین فکس ارسال کنید.</p>
        </div>
        <div class="fax-spec-section">
            <img class="social-img" src="{{asset('img/fax-email.png')}}" alt="" style="">
            <h3>ارسال فکس</h3>
            <p class="gray-color">آنلاین فکس ارسال کنید.</p>
        </div>
        <div class="fax-spec-section">
            <img class="social-img" src="{{asset('img/fax-email.png')}}" alt="" style="">
            <h3>ارسال فکس</h3>
            <p class="gray-color">آنلاین فکس ارسال کنید.</p>
        </div>
        <div class="fax-spec-section">
            <img class="social-img" src="{{asset('img/fax-email.png')}}" alt="" style="">
            <h3>ارسال فکس</h3>
            <p class="gray-color">آنلاین فکس ارسال کنید.</p>
        </div>
        <div class="fax-spec-section">
            <img class="social-img" src="{{asset('img/fax-email.png')}}" alt="" style="">
            <h3>ارسال فکس</h3>
            <p class="gray-color">آنلاین فکس ارسال کنید.</p>
        </div>
    </div>
    <div class="relative fax-packages white-color">
        <h2>تعرفه‌های ارسال فکس </h2>
        <img class="right-polygon" src="{{asset('img/Polygon.png')}}" alt="">
        <img class="left-polygon" src="{{asset('img/Rectangle.png')}}" alt="">
        <div class="fax-packages-content back-white-color lagevardi">
            <img class="org-img" src="{{asset('img/org.png')}}" alt="">
            <h3 class="violet-color">شرکتی</h3>
            <ul>
                <li>
                    <div class="inline">
                        <img class="right" src="{{asset('img/check.png')}}" alt="">
                    </div>
                    <span>۴۰ صفحه فکس</span>
                </li>
                <li>
                    <div class="inline">
                        <img class="right" src="{{asset('img/check.png')}}" alt="">
                    </div>
                    <span>ارسال و دریافت فکس</span>
                </li>
                <li>
                    <div class="inline">
                        <img class="right" src="{{asset('img/check.png')}}" alt="">
                    </div>
                    <span>شماره اختصاصی</span>
                </li>
                <li>
                    <div class="inline">
                        <img class="right" src="{{asset('img/check.png')}}" alt="">
                    </div>
                    <span>پنل تحت وب</span>
                </li>
            </ul>
            <h3 class="pink-color">۴۵۰۰۰ تومان</h3>
            <button class="btn submit-btn order">
                سفارش
            </button>
        </div>
        <div class="fax-packages-content back-white-color lagevardi">
            <img class="org-img" src="{{asset('img/org.png')}}" alt="">
            <h3 class="violet-color">شرکتی</h3>
            <ul>
                <li>
                    <div class="inline">
                        <img class="right" src="{{asset('img/check.png')}}" alt="">
                    </div>
                    <span>۴۰ صفحه فکس</span>
                </li>
                <li>
                    <div class="inline">
                        <img class="right" src="{{asset('img/check.png')}}" alt="">
                    </div>
                    <span>ارسال و دریافت فکس</span>
                </li>
                <li>
                    <div class="inline">
                        <img class="right" src="{{asset('img/check.png')}}" alt="">
                    </div>
                    <span>شماره اختصاصی</span>
                </li>
                <li>
                    <div class="inline">
                        <img class="right" src="{{asset('img/check.png')}}" alt="">
                    </div>
                    <span>پنل تحت وب</span>
                </li>
            </ul>
            <h2 class="light-blue-color">۴۵۰۰۰ تومان</h2>
            <button class="btn submit-btn order">
                سفارش
            </button>
        </div>
        <div class="fax-packages-content back-white-color lagevardi">
            <img class="org-img" src="{{asset('img/org.png')}}" alt="">
            <h3 class="violet-color">شرکتی</h3>
            <ul>
                <li>
                    <div class="inline">
                        <img class="right" src="{{asset('img/check.png')}}" alt="">
                    </div>
                    <span>۴۰ صفحه فکس</span>
                </li>
                <li>
                    <div class="inline">
                        <img class="right" src="{{asset('img/check.png')}}" alt="">
                    </div>
                    <span>ارسال و دریافت فکس</span>
                </li>
                <li>
                    <div class="inline">
                        <img class="right" src="{{asset('img/check.png')}}" alt="">
                    </div>
                    <span>شماره اختصاصی</span>
                </li>
                <li>
                    <div class="inline">
                        <img class="right" src="{{asset('img/check.png')}}" alt="">
                    </div>
                    <span>پنل تحت وب</span>
                </li>
            </ul>
            <h2 class="pink-color">۴۵۰۰۰ تومان</h2>
            <button class="btn submit-btn order">
                سفارش
            </button>
        </div>
    </div>
    <div class="relative fax-packages white-color">
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
                <img  src="{{asset('img/file.png')}}" alt="">
                <h2>۱- انتخاب فایل</h2>
                <span>فایل خود را بازگذاری کنید.</span>
            </div>
            <img  class="arrow" src="{{asset('img/Arrow.png')}}" alt="">
            <div class="flow-section">
                <img  src="{{asset('img/file.png')}}" alt="">
                <h2>۱- انتخاب فایل</h2>
                <span>فایل خود را بازگذاری کنید.</span>
            </div>
        </div>
    </div>

   <div class="chosen-package-content">
       <div class="fax-packages-content back-white-color lagevardi">
           <img class="org-img" src="{{asset('img/org.png')}}" alt="">
           <h3 class="violet-color">شرکتی</h3>
           <ul>
               <li>
                   <div class="inline">
                       <img class="right" src="{{asset('img/check.png')}}" alt="">
                   </div>
                   <span>۴۰ صفحه فکس</span>
               </li>
               <li>
                   <div class="inline">
                       <img class="right" src="{{asset('img/check.png')}}" alt="">
                   </div>
                   <span>ارسال و دریافت فکس</span>
               </li>
               <li>
                   <div class="inline">
                       <img class="right" src="{{asset('img/check.png')}}" alt="">
                   </div>
                   <span>شماره اختصاصی</span>
               </li>
               <li>
                   <div class="inline">
                       <img class="right" src="{{asset('img/check.png')}}" alt="">
                   </div>
                   <span>پنل تحت وب</span>
               </li>
               <li>
                   <div class="inline">
                       <img class="right" src="{{asset('img/check.png')}}" alt="">
                   </div>
                   <span>پنل تحت وب</span>
               </li>
               <li>
                   <div class="inline">
                       <img class="right" src="{{asset('img/check.png')}}" alt="">
                   </div>
                   <span>پنل تحت وب</span>
               </li>
           </ul>
           <h2 class="pink-color">۴۵۰۰۰ تومان</h2>
           <button class="btn submit-btn">
              خرید
           </button>
       </div>
   </div>
@endsection