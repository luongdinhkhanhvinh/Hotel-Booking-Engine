<div class="booking-review">
    <h4 class="booking-review-title">{{__('Thông tin của bạn')}}</h4>
    <div class="booking-review-content">
        <div class="review-section">
            <div class="info-form">
                <ul>
                    <li class="info-first-name">
                        <div class="label">{{__('Họ')}}</div>
                        <div class="val">{{$booking->first_name}}</div>
                    </li>
                    <li class="info-last-name">
                        <div class="label">{{__('Tên')}}</div>
                        <div class="val">{{$booking->last_name}}</div>
                    </li>
                    <li class="info-email">
                        <div class="label">{{__('Email')}}</div>
                        <div class="val">{{$booking->email}}</div>
                    </li>
                    <li class="info-address">
                        <div class="label">{{__('Địa chỉ 1')}}</div>
                        <div class="val">{{$booking->address}}</div>
                    </li>
                    <li class="info-address2">
                        <div class="label">{{__('Địa chỉ 2')}}</div>
                        <div class="val">{{$booking->address2}}</div>
                    </li>
                    <li class="info-city">
                        <div class="label">{{__('Thành phố')}}</div>
                        <div class="val">{{$booking->city}}</div>
                    </li>
                    <li class="info-state">
                        <div class="label">{{__('Quận ,Huyện/Tỉnh/Vùng')}}</div>
                        <div class="val">{{$booking->state}}</div>
                    </li>
                    <li class="info-zip-code">
                        <div class="label">{{__('Mã bưu điện / Mã bưu chính')}}</div>
                        <div class="val">{{$booking->zip_code}}</div>
                    </li>
                    <li class="info-country">
                        <div class="label">{{__('Quốc gia')}}</div>
                        <div class="val">{{get_country_name($booking->country)}}</div>
                    </li>
                    <li class="info-notes">
                        <div class="label">{{__('Yêu cầu đặc biệt')}}</div>
                        <div class="val">{{$booking->customer_notes}}</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
