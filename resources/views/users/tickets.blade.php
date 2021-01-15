@extends('layouts.master')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/users/contact.css') }}" >
@endsection
@section('js')
    @parent
    <script src="{{ asset('js/users/ticket.js') }}"></script>
@endsection

@section('title', 'تیکت‌های من')

@section('content')
    <div class="contact-content back-white-color1">
        <div class="tickets">
            <div class="ticket-titles">
                <h2 class="violet-color">پیام‌های من</h2>
                @isset($tickets)
                <ul>
                    @foreach($tickets as $ticket)
                    <li>
                        <a  id="ticket-title{{ $ticket->id }}"  class="gray-color" href="/ticket/{{ $ticket->id }}">
                           {{ $ticket->title }}
                        </a>

                        <span class="time">  اخرین بروز رسانی : {{  date('  h:i:s  d-m-Y', strtotime($ticket->updated_at)) }} </span>
                        @if($ticket->was_answered == 1)
                        <span class="left light-green-color">پاسخ داده شد</span>
                            @else
                            <span class="left gray-color">در حال بررسی</span>
                        @endif
                    </li>
                    @endforeach
                </ul>
                @endisset
                @if(count($tickets) == 0)
                    <h3 class="center gray-color">پیامی وجود ندارد.</h3>
                @endif
            </div>
        </div>
    </div>

@endsection