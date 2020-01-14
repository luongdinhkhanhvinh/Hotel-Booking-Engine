@extends('Email::layout')
@section('content')

    <div class="b-container">
        <div class="b-panel">
            @switch($to)
                @case ('admin')
                <h3 class="email-headline"><strong>{{__('Chào Quản trị viên')}}</strong></h3>
                <p>{{__('Tình trạng đặt phòng đã được cập nhật')}}</p>
                @break

                @case ('vendor')
                <h3 class="email-headline"><strong>{{__('Chào :name',['name'=>$booking->vendor->nameOrEmail ?? ''])}}</strong></h3>
                <p>{{__('Tình trạng đặt phòng đã được cập nhật')}}</p>
                @break


                @case ('customer')
                <h3 class="email-headline"><strong>{{__('Chào :name',['name'=>$booking->first_name ?? ''])}}</strong></h3>
                <p>{{__('Tình trạng đặt phòng đã được cập nhật')}}</p>
                @break

            @endswitch

            @include($service->email_new_booking_file ?? '')
        </div>
    </div>
@endsection
