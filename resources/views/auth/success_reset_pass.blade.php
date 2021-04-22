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
                    <h3 class="panel-title">  باز نشانی رمز عبور با موفقیت انجام شد. </h3>
                    <a class="left-text full" href="/login">ورود</a>
                </div>

            </div>
        </div>
    </div>
</div>
</body>

</html>