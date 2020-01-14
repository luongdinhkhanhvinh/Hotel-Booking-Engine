<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Nhà cung cấp bản đồ")}}</h3>
        <p class="form-group-desc">{{__('Thay đổi nhà cung cấp bản đồ cho trang web của bạn')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label>{{__("Nhà cung cấp bản đồ")}}</label>
                    <div class="form-controls">
                        <select name="map_provider" class="form-control" >
                            <option value="osm" {{ ($settings['map_provider'] ?? '') == 'osm' ? 'selected' : ''  }}>{{__("OpenStreetMap.org")}}</option>
                            <option value="gmap" {{($settings['map_provider'] ?? '') == 'gmap' ? 'selected' : ''  }}>{{__('Google Map')}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" data-condition="map_provider:is(gmap)">
                    <label>{{__("Gmap API Key")}}</label>
                    <div class="form-controls">
                        <input type="text" name="map_gmap_key" value="{{$settings['map_gmap_key'] ?? ''}}" class="form-control">
                        <p><i><a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="blank">{{__("Tìm hiều cách lấy khóa api")}}</a></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Đăng nhập mạng xã hội")}}</h3>
        <p class="form-group-desc">{{__('Thay đổi thông tin đăng nhập xã hội cho trang web của bạn')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong>{{__('Facebook')}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label> <input type="checkbox" @if($settings['facebook_enable'] ?? '' == 1) checked @endif name="facebook_enable" value="1"> {{__("Cho phép đăng nhập Facebook?")}}</label>
                </div>
                <div class="form-group" data-condition="facebook_enable:is(1)">
                    <label>{{__("Facebook Client Id")}}</label>
                    <div class="form-controls">
                        <input type="text" name="facebook_client_id" value="{{$settings['facebook_client_id'] ?? ''}}" class="form-control">
                    </div>
                </div>
                <div class="form-group" data-condition="facebook_enable:is(1)">
                    <label>{{__("Facebook Client Secret")}}</label>
                    <div class="form-controls">
                        <input type="text" name="facebook_client_secret" value="{{$settings['facebook_client_secret'] ?? ''}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong>{{__('Google')}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label><input type="checkbox" @if($settings['google_enable'] ?? '' == 1) checked @endif name="google_enable" value="1"> {{__("Cho phép đăng nhập Google?")}}</label>
                </div>
                <div class="form-group" data-condition="google_enable:is(1)">
                    <label>{{__("Google Client Id")}}</label>
                    <div class="form-controls">
                        <input type="text" name="google_client_id" value="{{$settings['google_client_id'] ?? ''}}" class="form-control">
                    </div>
                </div>
                <div class="form-group" data-condition="google_enable:is(1)">
                    <label>{{__("Google Client Secret")}}</label>
                    <div class="form-controls">
                        <input type="text" name="google_client_secret" value="{{$settings['google_client_secret'] ?? ''}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong>{{__('Twitter')}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label> <input type="checkbox" @if($settings['twitter_enable'] ?? '' == 1) checked @endif name="twitter_enable" value="1"> {{__("Cho phép đăng nhập Twitter?")}}</label>
                </div>
                <div class="form-group" data-condition="twitter_enable:is(1)">
                    <label>{{__("Twitter Client Id")}}</label>
                    <div class="form-controls">
                        <input type="text" name="twitter_client_id" value="{{$settings['twitter_client_id'] ?? ''}}" class="form-control">
                    </div>
                </div>
                <div class="form-group" data-condition="twitter_enable:is(1)">
                    <label>{{__("Twitter Client Secret")}}</label>
                    <div class="form-controls">
                        <input type="text" name="twitter_client_secret" value="{{$settings['twitter_client_secret'] ?? ''}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Captcha")}}</h3>
        <p class="form-group-desc">{{__('Thay đổi nhà cung cấp bản đồ của trang web của bạn')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong>{{__("Cấu hình ReCaptcha")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-controls">
                        <label ><input type="checkbox" @if($settings['recaptcha_enable'] ?? '' == 1) checked @endif name="recaptcha_enable" value="1"> {{__("Kích hoạt ReCaptcha")}}</label>
                    </div>
                </div>
                <div class="form-group" data-condition="recaptcha_enable:is(1)">
                    <label>{{__("Khóa Api")}}</label>
                    <div class="form-controls">
                        <input type="text" name="recaptcha_api_key" value="{{$settings['recaptcha_api_key'] ?? ''}}" class="form-control">
                        <p><i><a href="http://www.google.com/recaptcha/admin" target="blank">{{__("Tìm hiểu cách lấy khóa api")}}</a></i></p>
                    </div>
                </div>
                <div class="form-group" data-condition="recaptcha_enable:is(1)">
                    <label>{{__("Api Secret")}}</label>
                    <div class="form-controls">
                        <input type="text" name="recaptcha_api_secret" value="{{$settings['recaptcha_api_secret'] ?? ''}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Tùy chình tập lệnh")}}</h3>
        <p class="form-group-desc">{{__('Thêm tập lệnh HTML tùy chỉnh trước và sau nội dung, như mã theo dõi')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong>{{__("Tùy chỉnh tập lệnh")}}</strong></div>
            <div class="panel-body">
                <div class="form-group" >
                    <label>{{__("Tập lệnh Body")}}</label>
                    <div class="form-controls">
                        <textarea name="body_scripts"  cols="30" rows="10" class="form-control">{{$settings['body_scripts'] ?? ''}}</textarea>
                        <p><i>{{__('tập lệnh sau khi mở thẻ body')}}</i></p>
                    </div>
                </div>
                <div class="form-group" >
                    <label>{{__("Tập lệnh Footer ")}}</label>
                    <div class="form-controls">
                        <textarea name="body_scripts"  cols="30" rows="10" class="form-control">{{$settings['footer_scripts'] ?? ''}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
