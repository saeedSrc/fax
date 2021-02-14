<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>ورود</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/users/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontiran.css') }}">
    <script src="{{ asset('js/jquery/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('js/users/register.js') }}"></script>
</head>
<body>
<div class="container">
    <img class="loading" src="{{asset('img/loading.gif')}}"  alt="">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8  col-sm-offset-2 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">ورود به حساب کاربری</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            @error('phone')
                            <label for="phone" class="alert alert-danger" dir="rtl" > {{ $message }}</label>
                            @enderror
                            <input type="number" name="phone" id="phone" class="form-control input-sm" value="{{ old('phone') }}" required autocomplete="phone"  placeholder="شماره تلفن همراه">
                        </div>
                        <div class="form-group">
                            @error('password')
                            <label for="password" class="alert alert-danger" dir="rtl"> {{ $message }}</label>
                            @enderror
                            <input type="password" name="password" id="password" class="form-control input-sm" placeholder="پسورد" required autocomplete="current-password">
                        </div>
                        <input type="submit" value="ورود" class="btn btn-info btn-block">
                    </form>
                    <a class="left-text" href="/register">درخواست عضویت</a> / <a class="left-text full" href="/">خانه</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>