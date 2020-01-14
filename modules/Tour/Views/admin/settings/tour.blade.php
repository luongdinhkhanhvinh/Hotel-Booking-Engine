<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Trang tìm kiếm")}}</h3>
        <p class="form-group-desc">{{__('Cấu hình trang tìm kiếm của trang web của bạn')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" >{{__("Tiêu đề trang")}}</label>
                    <div class="form-controls">
                        <input type="text" name="tour_page_search_title" value="{{$settings['tour_page_search_title'] ?? ''}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="" >{{__("Trang biểu ngữ")}}</label>
                    <div class="form-controls form-group-image">
                        {!! \Modules\Media\Helpers\FileHelper::fieldUpload('tour_page_search_banner',$settings['tour_page_search_banner'] ?? "") !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="" >{{__("Bố trí tìm kiếm")}}</label>
                    <div class="form-controls">
                        <select name="tour_layout_search" class="form-control" >
                            <option value="normal" {{ ($settings['tour_layout_search'] ?? '') == 'normal' ? 'selected' : ''  }}>{{__("Bố trí bình thường")}}</option>
                            <option value="map" {{($settings['tour_layout_search'] ?? '') == 'map' ? 'selected' : ''  }}>{{__('Địa điểm bố trí')}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="" >{{__("SEO tùy chọn")}}</label>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#seo_1">{{__("Tùy chọn chung")}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#seo_2">{{__("Chia sẻ Facebook")}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#seo_3">{{__("Chia sẻ Twitter")}}</a>
                        </li>
                    </ul>
                    <div class="tab-content" >
                        <div class="tab-pane active" id="seo_1">
                            <div class="form-group" >
                                <label class="control-label">{{__("Seo tiêu đề")}}</label>
                                <input type="text" name="tour_page_list_seo_title" class="form-control" placeholder="{{__("Nhập tiêu đề...")}}" value="{{ $settings['tour_page_list_seo_title'] ?? ""}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{__("Seo mô tả")}}</label>
                                <input type="text" name="tour_page_list_seo_desc" class="form-control" placeholder="{{__("Nhập mô tả...")}}" value="{{$settings['tour_page_list_seo_desc'] ?? ""}}">
                            </div>
                            <div class="form-group form-group-image">
                                <label class="control-label">{{__("Ảnh nổi bật")}}</label>
                                {!! \Modules\Media\Helpers\FileHelper::fieldUpload('tour_page_list_seo_image', $settings['tour_page_list_seo_image'] ?? "" ) !!}
                            </div>
                        </div>
                        @php $seo_share = !empty($settings['tour_page_list_seo_share']) ? json_decode($settings['tour_page_list_seo_share'],true): false; @endphp
                        <div class="tab-pane" id="seo_2">
                            <div class="form-group">
                                <label class="control-label">{{__("Tiêu đề Facebook")}}</label>
                                <input type="text" name="tour_page_list_seo_share[facebook][title]" class="form-control" placeholder="{{__("Nhập tiêu đề...")}}" value="{{$seo_share['facebook']['title'] ?? "" }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{__("Mô tả Facebook")}}</label>
                                <input type="text" name="tour_page_list_seo_share[facebook][desc]" class="form-control" placeholder="{{__("Nhập mô tả...")}}" value="{{$seo_share['facebook']['desc'] ?? "" }}">
                            </div>
                            <div class="form-group form-group-image">
                                <label class="control-label">{{__("Hình Facebook")}}</label>
                                {!! \Modules\Media\Helpers\FileHelper::fieldUpload('tour_page_list_seo_share[facebook][image]',$seo_share['facebook']['image'] ?? "" ) !!}
                            </div>
                        </div>
                        <div class="tab-pane" id="seo_3">
                            <div class="form-group">
                                <label class="control-label">{{__("Tiêu đề Twitter")}}</label>
                                <input type="text" name="tour_page_list_seo_share[twitter][title]" class="form-control" placeholder="{{__("Nhập tiêu đề...")}}" value="{{$seo_share['twitter']['title'] ?? "" }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{__("Mô tả Twitter")}}</label>
                                <input type="text" name="tour_page_list_seo_share[twitter][desc]" class="form-control" placeholder="{{__("Nhập mô tả...")}}" value="{{$seo_share['twitter']['title'] ?? "" }}">
                            </div>
                            <div class="form-group form-group-image">
                                <label class="control-label">{{__("Hình Twitter")}}</label>
                                {!! \Modules\Media\Helpers\FileHelper::fieldUpload('tour_page_list_seo_share[twitter][image]', $seo_share['twitter']['image'] ?? "" ) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Tùy chọn đánh giá")}}</h3>
        <p class="form-group-desc">{{__('Cấu hình đánh giá cho chuyến đi')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" >{{__("Viết đánh giá")}}</label>
                    <div class="form-controls">
                        <label><input type="checkbox" name="tour_enable_review" value="1" @if(!empty($settings['tour_enable_review'])) checked @endif /> {{__("Bật đánh giá")}} </label>
                        <br>
                        <small class="form-text text-muted">{{__("Bật chế độ xem lại chuyến tham quan")}}</small>
                    </div>
                </div>
                <div class="form-group" data-condition="tour_enable_review:is(1)">
                    <label class="" >{{__("Enable review after booking")}}</label>
                    <div class="form-controls">
                        <label><input type="checkbox" name="tour_enable_review_after_booking" value="1"  @if(!empty($settings['tour_enable_review_after_booking'])) checked @endif /> {{__("Bật")}} </label>
                        <br>
                        <small class="form-text text-muted">{{__("BẬT: Chỉ đánh giá sau khi đặt phòng - TẮT: Đăng bài mà không cần đặt trước")}}</small>
                    </div>
                </div>
                <div class="form-group" data-condition="tour_enable_review:is(1)">
                    <label class="" >{{__("Đánh giá đã được phê duyệt")}}</label>
                    <div class="form-controls">
                        <label><input type="checkbox" name="tour_review_approved" value="1"  @if(!empty($settings['tour_review_approved'])) checked @endif /> {{__("Bật phê duyệt")}} </label>
                        <br>
                        <small class="form-text text-muted">{{__("BẬT: Đánh giá phải được phê duyệt bởi quản trị viên - TẮT: Đánh giá được phê duyệt tự động")}}</small>
                    </div>
                </div>
                <div class="form-group" data-condition="tour_enable_review:is(1)">
                    <label class="" >{{__("Đánh giá số trên mỗi trang")}}</label>
                    <div class="form-controls">
                        <input type="number" class="form-control" name="tour_review_number_per_page" value="{{ $settings['tour_review_number_per_page'] ?? 5 }}" />
                        <small class="form-text text-muted">{{__("Dừng bình luận trên mỗi trang")}}</small>
                    </div>
                </div>
                <div class="form-group" data-condition="tour_enable_review:is(1)">
                    <label class="" >{{__("Đánh giá tiêu chí")}}</label>
                    <div class="form-controls">
                        <div class="form-group-item">
                            <div class="g-items-header">
                                <div class="row">
                                    <div class="col-md-5">{{__("Tiêu đề")}}</div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="g-items">
                                <?php
                                if(!empty($settings['tour_review_stats'])){
                                $social_share = json_decode($settings['tour_review_stats']);
                                ?>
                                @foreach($social_share as $key=>$item)
                                    <div class="item" data-number="{{$key}}">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <input type="text" name="tour_review_stats[{{$key}}][title]" class="form-control" value="{{$item->title}}" placeholder="{{__('Eg: Service')}}">
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
                                        <div class="col-md-11">
                                            <input type="text" __name__="tour_review_stats[__number__][title]" class="form-control" value="" placeholder="{{__('Eg: Dịch vụ')}}">
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
        </div>
    </div>
</div>