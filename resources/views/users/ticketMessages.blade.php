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
                                            {{ auth()->user()->first_name }}
                                            {{ auth()->user()->last_name }}
                                            :
                                        </span>
                                        {{ $ticketMessage->question }}
                                    </p>
                                    @isset($ticketMessage->question_image)
                                        <p>
                                            <a class="btn img-download" href="/download/{{ $ticketMessage->question_image }}">
                                                دانلود
                                            </a>
                                        </p>
                                    @endisset
                                      <span class="time">  اخرین بروز رسانی : {{  date('  h:i:s  d-m-Y', strtotime($ticketMessage->question_time)) }} </span>
                                  </div>
                                    @endisset



                                    @if(isset($ticketMessage->answer))
                                   <div class="answer-box">
                                    <p class="answer">
                                        <span class="lagevardi">پاسخ:</span>
                                        {{ $ticketMessage->answer }}
                                    </p>
                                    @isset($ticketMessage->answer_image)
                                        <p>
                                            <a class="btn">
                                                دانلود
                                            </a>
                                        </p>
                                    @endisset
                                       <span class="time">  اخرین بروز رسانی : {{  date('  h:i:s  d-m-Y', strtotime($ticketMessage->answer_time)) }} </span>
                                   </div>
                                        @if($loop->last)
                                        <form class="violet-color" action="/create_ticket_message/{{ $ticket->id }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                @error('question')
                                                <label class="alert alert-danger" dir="rtl" > {{ $message }}</label>
                                                @enderror
                                                <br>
                                                <textarea  id="question" name="question" placeholder="پاسخ"></textarea>
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

                                        @else
                                        <h3 class="gray-color center">در انتظار پاسخ</h3>
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