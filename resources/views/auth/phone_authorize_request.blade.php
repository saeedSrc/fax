<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>ثبت نام</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/users/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontiran.css') }}">
    <script src="{{ asset('js/jquery/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>
</head>
<body>
<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8  col-sm-offset-2 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> فرم احراز هویت در یوفکس <small>کاملن رایگان !</small></h3>
                    <nav>
                        <ul>
                            <li>
                                @if(session()->has('register-done'))
                                    <img src="{{asset('img/check.png')}}" alt="">
                                @else
                                    <img src="{{asset('img/not-check.png')}}" alt="">
                                @endif
                                ثبت نام
                            </li>
                            <li>
                                @if(session()->has('auth-req-done'))
                                    <img src="{{asset('img/check.png')}}" alt="">
                                @else
                                    <img src="{{asset('img/not-check.png')}}" alt="">
                                @endif
                                درخواست احراز هویت
                            </li>
                            <li>
                                @if(session()->has('auth-done'))
                                    <img src="{{asset('img/check.png')}}" alt="">
                                @else
                                    <img src="{{asset('img/not-check.png')}}" alt="">
                                @endif
                                    احراز هویت
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="panel-body">
                            <form role="form" action="/phone_authorize" method="get">
                                @csrf
                                <p class="center" dir="rtl">برای احراز هویت درخواست دهید.</p>
                                <input type="submit" value="ارسال کد" class="btn btn-info btn-block">
                            </form>
                    <a class="left-text full" href="/">انصراف</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>