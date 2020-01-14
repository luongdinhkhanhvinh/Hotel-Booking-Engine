@extends('Email::layout')
@section('content')

    <div class="b-container">
        <div class="b-panel">
            @switch($to)
                @case ('admin')
                    <h3 class="email-headline"><strong>{{__('Chào Quản trị viên')}}</strong></h3>
                    <p>{{__('Đặt phòng mới đã được thực hiện')}}</p>
                @break
                @case ('vendor')
                    <h3 class="email-headline"><strong>{{__('Chào :name',['name'=>$booking->vendor->nameOrEmail ?? ''])}}</strong></h3>
                    <p>{{__('Dịch vụ của bạn có đặt phòng mới')}}</p>
                @break

                @case ('customer')
                    <h3 class="email-headline"><strong>{{__('Chào :name',['name'=>$booking->first_name ?? ''])}}</strong></h3>
                    <p>{{__('Cảm ơn bạn đã đặt phòng với chúng tôi. Dưới đây là thông tin đặt phòng của bạn:')}}</p>
                @break

            @endswitch

            @include($service->email_new_booking_file ?? '')
        </div>
        @include('Booking::emails.parts.panel-customer')
    </div>
@endsection
