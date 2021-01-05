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
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            @error('first_name')
                            <label  for="first_name" class="alert alert-danger" dir="rtl"> {{ $message }}</label>
                            @enderror
                            <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="نام" value="{{ old('first_name') }}" >
                        </div>
                        <div class="form-group">
                            @error('last_name')
                            <label  for="last_name" class="alert alert-danger" dir="rtl"> {{ $message }}</label>
                            @enderror
                            <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="نام خانوادگی" value="{{ old('last_name') }}" >
                        </div>
                        <div class="form-group">
                            @error('phone')
                            <label  for="phone" class="alert alert-danger" dir="rtl"> {{ $message }}</label>
                            @enderror
                            <input type="number" name="phone" id="phone" class="form-control input-sm" placeholder="شماره تلفن همراه" value="{{ old('phone') }}"  autocomplete="phone">
                        </div>
                        <div class="form-group">
                            @error('password')
                            <label for="password" class="alert alert-danger" dir="rtl"> {{ $message }}</label>
                            @enderror
                            <input type="password" name="password" id="password" class="form-control input-sm" placeholder="پسورد" value="{{ old('password') }}"  autocomplete="password">
                        </div>
                        <input type="submit" value="ثبت نام" class="btn btn-info btn-block">
                    </form>
                    <a class="left-text full" href="/login">ورود</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>