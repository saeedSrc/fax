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
        <div class="contact-all-info">
            <div class="contact-info">
                <img src="{{asset('img/location.png')}}" alt="">
                <h3>نشانی</h3>
                <p class="gray-color"> تهران خیابان فلان کوچه‌ی فلان پلاک 2 طبقه‌ی سوم</p>
            </div>
            <div class="contact-info">
                <img src="{{asset('img/phone-number.png')}}" alt="">
                <h3>شماره تماس</h3>
                <p class="gray-color">021 22122254 </p>
            </div>
            <div class="contact-info">
                <img src="{{asset('img/email.png')}}" alt="">
                <h3>آدرس ایمیل</h3>
                <p class="gray-color">saeedrasooli@yahoo.com</p>
            </div>
        </div>
        <div class="contact-form">
            <h1 class="violet-color">فرم ارسال پیام جدید</h1>
            <br>
            <form class="violet-color" action="{{ action('TicketController@store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title" class="last-label">موضوع پیام</label>
                    <br>
                    <input  id="title" name="title">
                </div>
                <br>
                <div class="form-group">
                    <label class="last-label" for="question">متن پیام</label>
                    <br>
                    <textarea  id="question" name="question"></textarea>
                </div>
                <br>
                <button class="btn submit-btn" type="submit" value="Submit">ارسال</button>
            </form>
        </div>
    </div>

@endsection