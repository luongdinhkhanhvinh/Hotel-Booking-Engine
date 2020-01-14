@extends('layouts.app')
@section('head')
    <link href="{{ asset('module/booking/css/checkout.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="bravo-booking-page padding-content" >
        <div class="container">
            <div class="row booking-success-notice">
                <div class="col-lg-8 col-md-8">
                    <div class="d-flex align-items-center">
                        <img src="{{url('images/ico_success.svg')}}" alt="Payment Success">
                        <div class="notice-success">
                            <p class="line1"><span>{{$booking->first_name}},</span>
                                {{__('Đơn đặt hàng của bạn đã được gửi thành công!')}}
                            </p>
                        <p class="line2">{{__('Chi tiết đặt phòng đã được gửi đến:')}} <span>{{$booking->email}}</span></p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <ul class="booking-info-detail">
                        <li><span>{{__('Số lượng đặt phòng')}}:</span> {{$booking->id}}</li>
                        <li><span>{{__('Ngày đặt phòng')}}:</span> {{display_date($booking->created_at)}}</li>
                        @if(!empty($gateway))
                        <li><span>{{__('Hình thức thanh toán')}}:</span> {{$gateway->name}}</li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="row booking-success-detail">
                <div class="col-md-8">
                    @include ($service->booking_customer_info_file ?? 'Booking::frontend/booking/booking-customer-info')
                    <div class="text-center">
                        <a href="{{url('user/booking-history')}}" class="btn btn-primary">{{__('Lịch sử đặt phòng')}}</a>
                    </div>
                </div>
                <div class="col-md-4">
                    @include ($service->checkout_booking_detail_file ?? '')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection