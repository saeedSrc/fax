@extends('layouts.master')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/users/order/order_list.css') }}" >
@endsection
@section('js')
    @parent
@endsection

@section('title', 'سفارش‌های من')

@section('content')
    <div class="contact-content back-white-color1">
        <div class="orders">
            <h2 class="violet-color">سفارش‌های من</h2>
                @if(count($orders) > 0)
                         <table>
                             <tr>
                                 <th>نام پکیج</th>
                                 <th>تعداد</th>
                                 <th>تاریخ ثبت سفارش</th>
                             </tr>
                        @foreach($orders as $order)

                                 <tr>
                                     <td>{{ $order->package_name }}</td>
                                     <td>1</td>
                                     <td><span class="persian-time">{{  date('H:i:s d-m-Y', strtotime($order->created_at)) }}</span></td>
                                 </tr>
                        @endforeach
                         </table>
                @endif
                @if(count($orders) == 0)
                    <h3 class="center gray-color empty-bag">سفارشی وجود ندارد.</h3>
                @endif
                <a class="btn home-link" href="/">بازگشت به صفحه‌ی اصلی</a>
        </div>
    </div>

@endsection