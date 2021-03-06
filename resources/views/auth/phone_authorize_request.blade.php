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
                    <h3 class="panel-title"> فرم احراز هویت در یوفکس </h3>
                    <nav>
                        <ul>
                            <li>
                                <img src="{{asset('img/check.png')}}" alt="">
                                1- ثبت نام----------->
                            </li>
                            <li>
                                2- درخواست احراز هویت ----------->
                            </li>
                            <li>
                                    3- احراز هویت
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="panel-body">
                            <form role="form" action="/phone_authorize" method="post">
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