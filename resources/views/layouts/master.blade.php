<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title> @yield('title') </title>
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/users/layouts/layouts.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/fontiran.css') }}">
    @show
    @section('js')
        <script src="{{ asset('js/jquery/jquery.js') }}"></script>
        <script src="{{ asset('js/layouts/master.js') }}"></script>
    @show
</head>
<body>
<div class="header">
    <div class="header-top back-white-color2">
        <h3>ارسال و دریافت فکس به صورت آنلاین</h3>
        <img class="logo" src="{{asset('img/fax.png')}}"  alt="">
    </div>
    <div class="header-middle back-white-color gray-color">
        <div class="mobile">
            <header class="header-nav">
                <input class="menu-btn" type="checkbox" id="menu-btn" />
                <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
                <div class="mobile-profile relative">

                    <input class="profile-btn" id="profile-btn" type="checkbox"><label for="profile-btn"></label>
                </div>
                <ul class="menu">
                    <li><a href="/ticket">تیکت‌های من</a></li>
                    <li><a href="/about">درباره ما</a></li>
                    <li><a href="/contact">تماس با ما</a></li>
                    <li><a href="/">خانه</a></li>
                    <li><a href="/login">ورود</a></li>
                    <li><a href="/register">ثبت نام</a></li>
                </ul>
            </header>
        </div>
        <div class="right-nav"><nav>
                <ul>
                    <li><a href="/ticket">تیکت‌های من</a></li>
                    <li><a href="/about">درباره ما</a></li>
                    <li><a href="/contact">تماس با ما</a></li>
                    <li><a href="/">خانه</a></li>
                </ul>
            </nav></div>
        <div class="left-nav">
            <nav>
                <ul>
                    @if(auth()->check())
                        <li><a href="#"><span> {{ Auth::user()->first_name }}</span>/ <span>ورود به پنل ارسال فکس</span></a></li>
                        <li><a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" >خروج</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                    <li><a href="/login"><span>ورود</span> <img src="{{asset('img/login.png')}}"  alt=""></a></li>
                    <li><a href="/register"><span>ثبت نام</span><img src="{{asset('img/register.png')}}"  alt=""></a></li>
                        @endif

                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    @yield('content')
</div>

<div class="footer">
    <p>سرویس ارسال و دریافت فکس به صورت انلاین <span class="red-color">به صورت انلاین</span> سرویس اراسل و دریافت فکس به صورت انلاین ویس اراسل و دریافت فکس  </p>
    <p>یوفکس را در شبکه‌های اجتماعی دنبال کنید.</p>
    <img class="social-img" src="{{asset('img/telegram.png')}}" alt="">
    <img class="social-img" src="{{asset('img/instagram.png')}}" alt="">
    <p>
       یو فکس در تلاش است ارسال فکس رو برای شما اسان و اسان تر بکنه یو فکس در تلاش است ارسال فکس رو برای شما اسان و اسان تر بکنه
        یو فکس در تلاش است ارسال فکس رو برای شما اسان و اسان تر بکنه
    </p>
    <img src="{{asset('img/enamad.png')}}" alt="">
</div>
</body>

</html>