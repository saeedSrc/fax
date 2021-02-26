@extends('layouts.master')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/users/contact.css') }}" >
@endsection


@section('title', 'ارتباط با ما')

@section('js')
    @parent
{{--     <script src="{{ asset('js/users/contact.js') }}"></script>--}}
    @endsection

@section('content')
    <div class="contact-content back-white-color1">
        <div class="contact-all-info white-color">
            <div class="contact-info ">
                <img src="{{asset('img/location.png')}}" alt="">
                <h2>نشانی</h2>
                <p class=""> تهران خیابان فلان کوچه‌ی فلان پلاک 2 طبقه‌ی سوم</p>
            </div>
            <div class="contact-info">
                <img src="{{asset('img/phone-number.png')}}" alt="">
                <h2>شماره تماس</h2>
                <p class=""> 021 91090702 </p>
            </div>
            <div class="contact-info">
                <img src="{{asset('img/email.png')}}" alt="">
                <h2>آدرس ایمیل</h2>
                <p class="">ufax.ir@gmail.com</p>
            </div>
        </div>
        <div class="contact-form">
            <h1>فرم ارسال پیام </h1>
            <br>
            <form class="violet-color" action="{{ action('TicketController@store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    @error('title')
                    <label class="alert alert-danger" dir="rtl" > {{ $message }}</label>
                    @enderror
                    <br>
                    <input  id="title" name="title" placeholder="پیام">
                </div>
                <br>
                <div class="form-group">
                    @error('question')
                    <label class="alert alert-danger" dir="rtl" > {{ $message }}</label>
                    @enderror
                    <br>
                    <textarea  id="question" name="question" placeholder="متن پیام"></textarea>
                </div>
                <br>
                <div>
                    @error('question_image')
                    <label class="alert alert-danger" dir="rtl" > {{ $message }}</label>
                    @enderror
                    <input class="file-input" type="file" name="question_image">
                </div>
                <br>
                <button class="btn submit-btn" type="submit" value="Submit">ارسال</button>
            </form>
        </div>
    </div>

@endsection