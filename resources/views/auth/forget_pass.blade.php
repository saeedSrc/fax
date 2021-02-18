<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>فراموشی رمز عبور</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/users/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontiran.css') }}">
    <script src="{{ asset('js/jquery/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>
    <script>
        $(window).load(function() {
            $('.loading').hide();
        });
    </script>
</head>
<body>
<div class="container">
    <img class="loading" src="{{asset('img/loading.gif')}}"  alt="">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8  col-sm-offset-2 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> فراموشی رمز عبور</h3>
                </div>
                <div class="panel-body">
                    @if(isset($message))
                        <div> {{ $message }} </div>
                    @else
                            <form role="form" action="/send_reset_pass" method="post">
                                @csrf
                                <p class="center" dir="rtl">لطفا شماره همراه خود راوارد کنید:</p>
                                @error('phone')
                                <label for="phone" class="alert alert-danger" dir="rtl" > {{ $message }}</label>
                                @enderror
                                <input name="phone" id="phone" class="form-control input-sm"  required autocomplete="phone"  placeholder="شماره تلفن همراه">
                                <input type="submit" value="ارسال پسورد" class="btn btn-info btn-block mt-5">
                            </form>
                    @endif
                    <a class="left-text full" href="/">خانه</a> / <a class="left-text full" href="/login">ورود</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>