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
                            @error('national_code')
                            <label  for="national_code" class="alert alert-danger" dir="rtl"> {{ $message }}</label>
                            @enderror
                            <input type="number" name="national_code" id="national_code" class="form-control input-sm" placeholder="کدملی" value="{{ old('national_code') }}" >
                        </div>
                        <div class="form-group">
                            @error('province')
                            <label  for="province" class="alert alert-danger" dir="rtl"> {{ $message }}</label>
                            @enderror
                            <select type="text" name="province" id="province" class="form-control input-sm">
                                    <option value="null">لطفا استان را انتخاب نمایید</option>
                                    <option value="تهران">تهران</option>
                                    <option value="گیلان">گیلان</option>
                                    <option value="آذربایجان شرقی">آذربایجان شرقی</option>
                                    <option value="خوزستان">خوزستان</option>
                                    <option value="فارس">فارس</option>
                                    <option value="اصفهان">اصفهان</option>
                                    <option value="خراسان رضوی">خراسان رضوی</option>
                                    <option value="قزوین">قزوین</option>
                                    <option value="سمنان">سمنان</option>
                                    <option value="قم">قم</option>
                                    <option value="مرکزی">مرکزی</option>
                                    <option value="زنجان">زنجان</option>
                                    <option value="مازندران">مازندران</option>
                                    <option value="گلستان">گلستان</option>
                                    <option value="اردبیل">اردبیل</option>
                                    <option value="آذربایجان غربی">آذربایجان غربی</option>
                                    <option value="همدان">همدان</option>
                                    <option value="کردستان">کردستان</option>
                                    <option value="کرمانشاه">کرمانشاه</option>
                                    <option value="لرستان">لرستان</option>
                                    <option value="بوشهر">بوشهر</option>
                                    <option value="کرمان">کرمان</option>
                                    <option value="هرمزگان">هرمزگان</option>
                                    <option value="چهارمحال و بختیاری">چهارمحال و بختیاری</option>
                                    <option value="یزد">یزد</option>
                                    <option value="سیستان و بلوچستان">سیستان و بلوچستان</option>
                                    <option value="ایلام">ایلام</option>
                                    <option value="کهگلویه و بویراحمد">کهگلویه و بویراحمد</option>
                                    <option value="خراسان شمالی">خراسان شمالی</option>
                                    <option value="خراسان جنوبی">خراسان جنوبی</option>
                                    <option value="البرز">البرز</option>
                            </select>
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
                    <a class="left-text full" href="/login">ورود</a> / <a class="left-text full" href="/">خانه</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>