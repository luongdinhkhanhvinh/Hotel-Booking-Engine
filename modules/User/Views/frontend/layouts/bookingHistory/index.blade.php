<div class="user-form-settings">
    <div class="breadcrumb-page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{url("/user/dashboard")}}">
                    {{__("Trang chủ")}}
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>&nbsp; {{__("Lịch sử đặt phòng")}} </li>
        </ul>
        <div class="bravo-more-menu-user">
            <i class="icofont-settings"></i>
        </div>
    </div>
    <h2 class="title-bar no-border-bottom">
        {{__("Lịch sử đặt phòng")}}
    </h2>
    @include('admin.message')
    <div class="booking-history-manager">
        <div class="tabbable">
            <ul class="nav nav-tabs ht-nav-tabs">
                <?php $status_type = Request::query('status'); ?>
                <li class="@if(empty($status_type)) active @endif">
                    <a href="{{url("/user/booking-history")}}">{{__("Tất cả phòng đặt")}}</a>
                </li>
                @if(!empty($statues))
                    @foreach($statues as $status)
                        <li class="@if(!empty($status_type) && $status_type == $status) active @endif">
                            <a href="{{url("/user/booking-history?status=".$status)}}">{{ucfirst($status)}}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
            @if(!empty($bookings) and $bookings->total() > 0)
                <div class="tab-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-booking-history">
                            <thead>
                            <tr>
                                <th width="2%">{{__("Loại")}}</th>
                                <th>{{__("Tiêu đề")}}</th>
                                <th class="a-hidden">{{__("Ngày đặt")}}</th>
                                <th class="a-hidden">{{__("Thời gian thực hiện")}}</th>
                                <th>{{__("Giá cả")}}</th>
                                <th class="a-hidden">{{__("Trạng thái")}}</th>
                                <th>{{__("Hoạt động")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bookings as $booking)
                                @include('User::frontend.layouts.bookingHistory.loop.'.$booking->object_model)
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="bravo-pagination">
                        {{$bookings->appends(request()->query())->links()}}
                    </div>
                </div>
            @else
                {{__("Không có lịch sử đặt phòng")}}
            @endif
        </div>
    </div>
</div>