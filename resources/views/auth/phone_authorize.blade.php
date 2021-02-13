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
    <script src="{{ asset('js/users/register.js') }}"></script>
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
                                <img src="{{asset('img/check.png')}}" alt="">
                                1- ثبت نام----->
                            </li>
                            <li>
                                <img src="{{asset('img/check.png')}}" alt="">
                                2- درخواست احراز هویت ----->
                            </li>
                            <li>
                                3- احراز هویت
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="panel-body">
                    <form role="form" action="/final_authenticate" method="post">
                            @csrf
                            <div class="form-group">
                                @error('auth_code')
                                <label for="auth_code" class="alert alert-danger" dir="rtl">{{ $message }}</label>
                                @enderror
                                @error('auth_code_time_sent')
                                <label for="auth_code" class="alert alert-danger" dir="rtl">{{ $message }}</label>
                                @enderror
                                <input type="number" name="auth_code" id="auth_code" class="form-control input-sm" placeholder="کد ارسال شده را وارد کنید">
                                <input type="hidden" name="auth_code_time_sent" id="auth_code_time_sent" class="form-control input-sm" value="{{ time() }}" >
                            </div>
                            <div class="time-left">
                                @isset($remaining_time)
                                <span> مدت زمان باقی مانده تا وارد کردن کد ارسالی‌:</span> <span class="countdown"> {{ $remaining_time }}</span>
                                @endisset
                            </div>
                            <input type="submit" value="احراز هویت" class="btn btn-info btn-block authorize">
                        </form>
                    <form role="form" action="/phone_authorize" method="post">
                        @csrf
                        <input type="submit" value="ارسال مجدد" class="btn btn-info btn-block re-authorize">
                    </form>
                    <a class="left-text full" href="/">انصراف</a>
                    </div>

            </div>
        </div>
    </div>
</div>
</body>

</html>