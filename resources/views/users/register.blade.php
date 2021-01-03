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
                    <h3 class="panel-title"> فرم ثبت نام در یوفکس <small>کاملن رایگان !</small></h3>
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
                @if(session()->has('register-form'))
                <div class="panel-body">
                    <form role="form" action="{{action('UserController@store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            @error('first_name')
                            <label class="alert alert-danger" dir="rtl"> {{ $message }}</label>
                            @enderror
                            <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="نام">
                        </div>
                        <div class="form-group">
                            @error('last_name')
                            <label class="alert alert-danger" dir="rtl"> {{ $message }}</label>
                            @enderror
                            <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="نام خانوادگی">
                        </div>
                        <div class="form-group">
                            @error('phone')
                            <label class="alert alert-danger" dir="rtl"> {{ $message }}</label>
                            @enderror
                            <input type="number" name="phone" id="phone" class="form-control input-sm" placeholder="شماره تلفن همراه">
                        </div>
                        <div class="form-group">
                            @error('password')
                            <label class="alert alert-danger" dir="rtl"> {{ $message }}</label>
                            @enderror
                            <input type="password" name="password" id="password" class="form-control input-sm" placeholder="پسورد">
                        </div>
                        <input type="submit" value="ثبت نام" class="btn btn-info btn-block">
                    </form>
                </div>
                    @elseif(session()->has('auth-req-form'))
                        <div class="panel-body">
                            <form role="form" action="{{action('UserController@store')}}" method="post">
                                @csrf
                                <p class="center" dir="rtl">برای احراز هویت درخواست دهید.</p>
                                <input type="submit" value="ارسال کد" class="btn btn-info btn-block">
                            </form>
                        </div>
                @elseif(session()->has('auth-form'))
                    <div class="panel-body">
                        <form role="form" action="{{action('UserController@store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                @error('phone')
                                <label class="alert alert-danger" dir="rtl">کد وارد شده اشتباه است</label>
                                @enderror
                                <input type="number" name="phone" id="phone" class="form-control input-sm" placeholder="کد ارسال شده را وارد کنید">
                            </div>
                            <input type="submit" value="احراز هویت" class="btn btn-info btn-block">
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</body>

</html>