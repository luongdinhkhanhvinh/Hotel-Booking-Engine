<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Trang thanh toán')}}</h3>
        <p class="form-group-desc">{{__('Thay đổi tùy chọn hình thức thanh toán')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" >{{__("Kích hoạt mẫu đặt phòng reCapcha")}}</label>
                    <div class="form-controls">
                        <label><input type="checkbox" name="booking_enable_recaptcha" value="1" @if(!empty($settings['booking_enable_recaptcha'])) checked @endif /> {{__("Bật ReCapcha")}} </label>
                        <br>
                        <small class="form-text text-muted">{{__("Bật chế độ mẫu đặt phòng")}}</small>
                    </div>
                </div>
                <div class="form-group">
                    <label >{{__("Trang điều khoản & điều kiện")}}</label>
                    <div class="form-controls">
                        <?php
                            $template = !empty($settings['booking_term_conditions']) ? \Modules\Page\Models\Page::find($settings['booking_term_conditions'] ) : false;
                            \App\Helpers\AdminForm::select2('booking_term_conditions',[
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
        <h3 class="form-group-title">{{__('Email đặt phòng')}}</h3>
        <p class="form-group-desc">{{__('Thay đổi email đặt phòng tiêu đề và chân trang')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label >{{__("Tiêu đề")}}</label>
                    <div class="form-controls">
                        <textarea name="email_header" class="d-none has-ckeditor" cols="30" rows="10">{{$settings['email_header'] ?? '' }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label >{{__("Chân trang")}}</label>
                    <div class="form-controls">
                        <textarea name="email_footer" class="d-none has-ckeditor" cols="30" rows="10">{{$settings['email_footer'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
