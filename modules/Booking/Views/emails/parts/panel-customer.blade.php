<div class="b-panel">
    <div class="b-panel-title">{{__('Thông tin khách hàng')}}</div>
    <div class="b-table-wrap">
        <table class="b-table" cellspacing="0" cellpadding="0">
            <tr class="info-first-name">
                <td class="label">{{__('Họ')}}</td>
                <td class="val">{{$booking->first_name}}</td>
            </tr>
            <tr class="info-last-name">
                <td class="label">{{__('Tên')}}</td>
                <td class="val">{{$booking->last_name}}</td>
            </tr>
            <tr class="info-email">
                <td class="label">{{__('Email')}}</td>
                <td class="val">{{$booking->email}}</td>
            </tr>
            <tr class="info-address">
                <td class="label">{{__('Địa chỉ 1')}}</td>
                <td class="val">{{$booking->address}}</td>
            </tr>
            <tr class="info-address2">
                <td class="label">{{__('Địa chỉ 2')}}</td>
                <td class="val">{{$booking->address2}}</td>
            </tr>
            <tr class="info-city">
                <td class="label">{{__('Thành phố')}}</td>
                <td class="val">{{$booking->city}}</td>
            </tr>
            <tr class="info-state">
                <td class="label">{{__('Quận,Huyện / Tỉnh / Vùng')}}</td>
                <td class="val">{{$booking->state}}</td>
            </tr>
            <tr class="info-zip-code">
                <td class="label">{{__('Mã bưu điện / Mã bưu chính')}}</td>
                <td class="val">{{$booking->zip_code}}</td>
            </tr>
            <tr class="info-country">
                <td class="label">{{__('Quốc gia')}}</td>
                <td class="val">{{get_country_name($booking->country)}}</td>
            </tr>
            <tr class="info-notes">
                <td class="label">{{__('Yêu cầu đặc biệt')}}</td>
                <td class="val">{{$booking->customer_notes}}</td>
            </tr>
        </table>
    </div>
</div>
