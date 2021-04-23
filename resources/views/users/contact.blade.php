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

    </div>

@endsection