@extends('layouts.master')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/users/ticketMessages.css') }}" >
@endsection
@section('js')
    @parent

@endsection

@section('title', 'تیکت‌های من')

@section('content')
    <div class="contact-content back-white-color1">
        <div class="tickets">
                <h1 class="ticket-title violet-color">
                    @isset($ticket)
                        {{ $ticket->title }}
                    @endisset
                </h1>
                @isset($ticketMessages)
                    <div class="ticket-messages">
                        <ul>
                            @foreach($ticketMessages as $ticketMessage)
                                <li>
                                    @isset($ticketMessage->question)
                             <div class="question-box">
                                    <p class="question">
                                        <span class="lagevardi">
                                            @isset($user)
                                               {{ $user->first_name }}
                                               {{ $user->last_name }}
                                                :
                                                @endisset

                                        </span>
                                        {{ $ticketMessage->question }}
                                    </p>
                                            @isset($ticketMessage->question_image)
                                        <p>
                                            <a class="btn img-download" href="/download/question/{{ $ticketMessage->question_image }}">
                                                دانلود
                                            </a>
                                        </p>
                                             @endisset

                                 <span class="time">  اخرین بروز رسانی :  <span class="persian-time">{{date('H:i:s d-m-Y', strtotime($ticketMessage->question_time))}}</span></span>
                                        @if($loop->last)
                                            @empty($ticketMessage->answer)
                                            <form class="violet-color" action="/admin/update_ticket/{{ $ticket->id }}/{{ $ticketMessage->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    @error('answer')
                                                    <label class="alert alert-danger" dir="rtl" > {{ $message }}</label>
                                                    @enderror
                                                    <br>
                                                    <textarea  id="answer" name="answer" placeholder="پاسخ"></textarea>
                                                </div>
                                                <br>
                                                <div>
                                                    @error('answer_image')
                                                    <label class="alert alert-danger" dir="rtl" > {{ $message }}</label>
                                                    @enderror
                                                    <input class="file-input" type="file" name="answer_image">
                                                </div>
                                                <br>
                                                <button class="btn submit-btn" type="submit" value="Submit">ارسال</button>
                                            </form>
                                             @endempty
                                        @endif
                             </div>
                                    @endisset

                                    @isset($ticketMessage->answer)
                             <div class="answer-box">
                                    <p class="answer">
                                        <span class="lagevardi">ادمین:</span>
                                        {{ $ticketMessage->answer }}
                                    </p>

                                           @isset($ticketMessage->answer_image)
                                        <p>
                                            <a class="btn img-download" href="/download/answer/{{ $ticketMessage->answer_image }}">
                                                دانلود
                                            </a>
                                        </p>
                                            @endisset
                                 <span class="time">  اخرین بروز رسانی :  <span class="persian-time">{{  date('H:i:s d-m-Y', strtotime($ticketMessage->answer_time)) }}</span></span>
                             </div>
                                    @endisset

                                </li>
                            @endforeach
                        </ul>
                        <a class="btn img-download" href="/admin/get_users_tickets">
                            بازگشت
                        </a>
                    </div>
                @endisset

            </div>
        </div>

@endsection