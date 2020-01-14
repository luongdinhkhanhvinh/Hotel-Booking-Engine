<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Thông tin trang web")}}</h3>
        <p class="form-group-desc">{{__('Thông tin của trang web của bạn cho khách hàng và google')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" >{{__("Tiêu đề trang web")}}</label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="site_title" value="{{$settings['site_title'] ?? 'Booking Core' }}">
                    </div>
                </div>
                <div class="form-group">
                    <label >{{__("Trang web desc")}}</label>
                    <div class="form-controls">
                        <textarea name="site_desc" class="form-control" cols="30" rows="7">{{$settings['site_desc'] ?? '' }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label >{{__("Định dạng ngày tháng")}}</label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="date_format" value="{{$settings['date_format'] ?? 'm/d/Y' }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Ngôn ngữ')}}</h3>
        <p class="form-group-desc">{{__('Thay đổi ngôn ngữ cho trang web của bạn')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label >{{__("Chọn ngôn ngữ mặc định")}}</label>
                    <div class="form-controls">
                        <select name="site_locale" class="form-control">
                            <option value="">{{__("-- Mặc định --")}}</option>
                            @php
                                $langs = \Modules\Language\Models\Language::getActive();
                            @endphp

                            @foreach($langs as $lang)
                                <option @if($lang->locale == ($settings['site_locale'] ?? '') ) selected @endif value="{{$lang->locale}}">{{$lang->name}} - ({{$lang->locale}})</option>
                            @endforeach
                        </select>
                        <p><i><a href="{{url('admin/module/language')}}">{{__("Quản lý ngôn ngữ tại đây")}}</a></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Thông tin liên hệ')}}</h3>
        <p class="form-group-desc">{{__('Làm thế nào khách hàng của bạn có thể liên lạc với bạn')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label >{{__("Email quản trị")}}</label>
                    <div class="form-controls">
                        <input type="email" class="form-control" name="admin_email" value="{{$settings['admin_email'] ?? '' }}">
                    </div>
                </div>
                <div class="form-group">
                    <label >{{__("Tên Email")}}</label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="email_from_name" value="{{$settings['email_from_name'] ?? '' }}">
                    </div>
                </div><div class="form-group">
                    <label >{{__("Địa chỉ Email")}}</label>
                    <div class="form-controls">
                        <input type="email" class="form-control" name="email_from_address" value="{{$settings['email_from_address'] ?? '' }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Trang chủ')}}</h3>
        <p class="form-group-desc">{{__('Thay đổi nội dung trang chủ của bạn')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label >{{__("Trang cho trang chủ")}}</label>
                    <div class="form-controls">
                        <?php
                            $template = !empty($settings['home_page_id']) ? \Modules\Page\Models\Page::find($settings['home_page_id'] ) : false;

                            \App\Helpers\AdminForm::select2('home_page_id',[
                            'configs'=>[
                                    'ajax'=>[
                                        'url'=>url('/admin/module/page/getForSelect2'),
                                        'dataType'=>'json'
                                    ]
                                ]
                            ],
                            !empty($template->id) ? [$template->id,$template->title] :false
                            )
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Cài đặt đầu trang & chân trang')}}</h3>
        <p class="form-group-desc">{{__('Thay đổi tùy chọn của bạn')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label >{{__("Logo")}}</label>
                    <div class="form-controls form-group-image">
                        {!! \Modules\Media\Helpers\FileHelper::fieldUpload('logo_id',$settings['logo_id'] ?? '') !!}
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Chia sẽ xã hội")}}</label>
                    <div class="form-controls">
                        <div class="form-group-item">
                            <div class="g-items-header">
                                <div class="row">
                                    <div class="col-md-5">{{__("Chia sẻ liên kết")}}</div>
                                    <div class="col-md-2">{{__('Lớp biểu tượng')}}</div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="g-items">
                                <?php
                                if(!empty($settings['social_share'])){
                                    $social_share = json_decode($settings['social_share']);
                                    ?>
                                    @foreach($social_share as $key=>$item)
                                        <div class="item" data-number="{{$key}}">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input type="text" name="social_share[{{$key}}][link]" class="form-control" value="{{$item->link}}" placeholder="{{__('Eg: https://facebook.com')}}">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" min="0" name="social_share[{{$key}}][class_icon]" class="form-control" value="{{$item->class_icon}}" placeholder="{{__('Eg: fa fa-facebook')}}">
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                <?php } ?>
                            </div>
                            <div class="text-right">
                                <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Thêm mục')}}</span>
                            </div>
                            <div class="g-more hide">
                                <div class="item" data-number="__number__">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="text" __name__="social_share[__number__][link]" class="form-control" value="" placeholder="{{__('Eg: https://facebook.com')}}">
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" min="0" __name__="social_share[__number__][class_icon]" class="form-control" value="" placeholder="{{__('Eg: fa fa-facebook')}}">
                                        </div>
                                        <div class="col-md-1">
                                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Danh sách chân trang widget")}}</label>
                    <div class="form-controls">
                        <div class="form-group-item">
                            <div class="form-group-item">
                                <div class="g-items-header">
                                    <div class="row">
                                        <div class="col-md-3">{{__("Tiêu đề")}}</div>
                                        <div class="col-md-2">{{__('Kích thước')}}</div>
                                        <div class="col-md-6">{{__('Nội dung')}}</div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="g-items">
                                    <?php
                                    if(!empty($settings['list_widget_footer'])){
                                    $social_share = json_decode($settings['list_widget_footer']);
                                    ?>
                                    @foreach($social_share as $key=>$item)
                                        <div class="item" data-number="{{$key}}">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input type="text" name="list_widget_footer[{{$key}}][title]" class="form-control" value="{{$item->title}}">
                                                </div>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="list_widget_footer[{{$key}}][size]">
                                                        <option @if(!empty($item->size) && $item->size=='3') selected @endif value="3">1/4</option>
                                                        <option @if(!empty($item->size) && $item->size=='4') selected @endif value="4">1/3</option>
                                                        <option @if(!empty($item->size) && $item->size=='6') selected @endif value="6">1/2</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <textarea name="list_widget_footer[{{$key}}][content]" rows="5" class="form-control">{{$item->content}}</textarea>
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <?php } ?>
                                </div>
                                <div class="text-right">
                                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Thêm mục')}}</span>
                                </div>
                                <div class="g-more hide">
                                    <div class="item" data-number="__number__">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="text" __name__="list_widget_footer[__number__][title]" class="form-control" value="">
                                            </div>
                                            <div class="col-md-2">
                                                <select class="form-control" __name__="list_widget_footer[__number__][size]">
                                                    <option value="3">1/4</option>
                                                    <option value="4">1/3</option>
                                                    <option value="6">1/2</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea __name__="list_widget_footer[__number__][content]" class="form-control" rows="5"></textarea>
                                            </div>
                                            <div class="col-md-1">
                                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Văn bản chân trang còn lại")}}</label>
                    <div class="form-controls">
                        <textarea name="footer_text_left" class="d-none has-ckeditor" cols="30" rows="10">{{$settings['footer_text_left'] ?? '' }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Văn bản chân trang còn lại")}}</label>
                    <div class="form-controls">
                        <textarea name="footer_text_right" class="d-none has-ckeditor" cols="30" rows="10">{{$settings['footer_text_right'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
