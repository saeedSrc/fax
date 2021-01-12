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
                                    <p class="question">
                                        {{ $ticketMessage->question }}
                                    </p>
                                    @endisset
                                    @isset($ticketMessage->question_image)
                                        <p>
                                            <a class="btn img-download">
                                                دانلود
                                            </a>
                                            {{--{{ $ticketMessage->question_image }}--}}
                                        </p>
                                    @endisset
                                      @if(isset($ticketMessage->answer))
                                    @isset($ticketMessage->answer)
                                    <p class="answer">
                                        <span class="answer-word">پاسخ:</span>
                                        {{ $ticketMessage->answer }}
                                    </p>
                                    @endisset
                                    @isset($ticketMessage->answer_image)
                                        <p>
                                            <a class="btn">
                                                دانلود
                                            </a>
                                        </p>
                                    @endisset
                                        <form class="violet-color" action="{{ action('TicketController@store')}}" method="post" enctype="multipart/form-data">
                                            @csrf
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
                                    @endif


                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endisset
            </div>
        </div>
    </div>

@endsection