@extends('layouts.master')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/users/contact.css') }}" >
@endsection
@section('js')
    @parent
    <script src="{{ asset('js/users/ticket.js') }}"></script>
@endsection

@section('title', 'ارتباط با ما')

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
        <div class="tickets">
            <div class="ticket-title">
                <h1 class="violet-color">پیام‌های من</h1>
                <ul>
                    <li>
                        <a id="ticket-title01" class="gray-color" href="#">
                            خطا در ارتباط با سرور ارسال فکس
                        </a>
                        <span class="left light-green-color" href="">پاسخ داده شد</span>
                        <div id="ticket-detail01" class="ticket-detail">
                            <div class="ticket-box">
                                <h3>پیام شما</h3>
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                            </div>
                            <div class="ticket-box answer light-blue-color">
                                <h3>پاسخ</h3>
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                                سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد سرور دچار خطا شد
                            </div>
                            <div class="contact-form">
                                <h1 class="violet-color">پاسخ</h1>
                                <br>
                                <form class="violet-color" action="/">
                                    <div class="form-group">
                                        <label class="last-label" for="message">متن پیام</label>
                                        <br>
                                        <textarea  id="message" name="message"></textarea>
                                    </div>
                                    <br>
                                    <button class="btn submit-btn" type="submit" value="Submit">ارسال</button>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="contact-form">
            <h1 class="violet-color">فرم ارسال پیام جدید</h1>
            <br>
            <form class="violet-color" action="/">
                <div class="form-group">
                    <label class="last-label" for="title">موضوع پیام</label>
                    <br>
                    <input  id="message" name="title">
                </div>
                <br>
                <div class="form-group">
                    <label class="last-label" for="message">متن پیام</label>
                    <br>
                    <textarea  id="message" name="message"></textarea>
                </div>
                <br>
                <button class="btn submit-btn" type="submit" value="Submit">ارسال</button>
            </form>
        </div>
    </div>

@endsection