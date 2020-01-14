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
            <li>&nbsp; {{__("Cài đặt")}} </li>
        </ul>
        <div class="bravo-more-menu-user">
            <i class="icofont-settings"></i>
        </div>
    </div>
    <h2 class="title-bar">
        {{__("Cài đặt")}}
        <a href="{{url("/user/profile/change-password")}}" class="btn-change-password">{{__("Thay đổi mật khẩu")}}</a>
    </h2>
    @include('admin.message')
    <form action="{{url("/user/profile")}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-title">
                    <strong>{{__("Thông tin cá nhân")}}</strong>
                </div>
                <div class="form-group">
                    <label>{{__("E-mail")}}</label>
                    <input type="text" value="{{$dataUser->email}}" placeholder="{{__("E-mail")}}" readonly class="form-control">
                    <i class="fa fa-envelope input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("Họ")}}</label>
                    <input type="text" value="{{$dataUser->first_name}}" name="first_name" placeholder="{{__("Họ")}}" class="form-control">
                    <i class="fa fa-user input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("Tên")}}</label>
                    <input type="text" value="{{$dataUser->last_name}}" name="last_name" placeholder="{{__("Tên")}}" class="form-control">
                    <i class="fa fa-user input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("Số điện thoại")}}</label>
                    <input type="text" value="{{$dataUser->phone}}" name="phone" placeholder="{{__("Số điện thoại")}}" class="form-control">
                    <i class="fa fa-phone input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("Ngày sinh")}}</label>
                    <input type="text" value="{{ $dataUser->birthday? display_date($dataUser->birthday) :'' }}" name="birthday" placeholder="{{__("Ngày sinh")}}" class="form-control date-picker">
                    <i class="fa fa-birthday-cake input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("Về bản thân")}}</label>
                    <textarea name="bio" rows="5" class="form-control">{{$dataUser->bio}}</textarea>
                </div>
                <div class="form-group">
                    <label>{{__("Hình đại diện")}}</label>
                    <div class="upload-btn-wrapper">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    {{__("Duyệt")}}… <input type="file">
                                </span>
                            </span>
                            <input type="text" data-error="{{__("Lỗi đăng lên...")}}" data-loading="{{__("Đăng tải...")}}" class="form-control text-view" readonly value="{{ $dataUser->getAvatarUrl()?? __("Không có ảnh")}}">
                        </div>
                        <input type="hidden" class="form-control" name="avatar_id" value="{{ $dataUser->avatar_id?? ""}}">
                        <img class="image-demo" src="{{ $dataUser->getAvatarUrl()?? ""}}"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-title">
                    <strong>{{__("Thông tin địa điểm")}}</strong>
                </div>
                <div class="form-group">
                    <label>{{__("Địa chỉ 1")}}</label>
                    <input type="text" value="{{$dataUser->address}}" name="address" placeholder="{{__("Địa chỉ")}}" class="form-control">
                    <i class="fa fa-location-arrow input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("Địa chỉ 2")}}</label>
                    <input type="text" value="{{$dataUser->address2}}" name="address2" placeholder="{{__("Địa chỉ 2")}}" class="form-control">
                    <i class="fa fa-location-arrow input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("Quận,Huyện")}}</label>
                    <input type="text" value="{{$dataUser->state}}" name="state" placeholder="{{__("Quận,Huyện")}}" class="form-control">
                    <i class="fa fa-map-signs input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("Thành phố")}}</label>
                    <input type="text" value="{{$dataUser->city}}" name="city" placeholder="{{__("Thành phố")}}" class="form-control">
                    <i class="fa fa-street-view input-icon"></i>
                </div>
                <div class="form-group">
                    <label>{{__("Quốc gia")}}</label>
                    <select name="country" class="form-control">
                        <option value="">{{__('-- Chọn --')}}</option>
                        @foreach(get_country_lists() as $id=>$name)
                            <option @if(($dataUser->country ?? '') == $id) selected @endif value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>{{__("Mã bưu chính")}}</label>
                    <input type="text" value="{{$dataUser->zip_code}}" name="zip_code" placeholder="{{__("Mã bưu chính")}}" class="form-control">
                    <i class="fa fa-map-pin input-icon"></i>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <input type="submit" class="btn btn-primary" value="Lưu thay đổi">
            </div>
        </div>
    </form>
</div>