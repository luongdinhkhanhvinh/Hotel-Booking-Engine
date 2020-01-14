<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Trang danh sách")}}</h3>
        <p class="form-group-desc">{{__('Cấu hình trang danh sách tin tức của trang web của bạn')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" >{{__("Trang tiêu đề")}}</label>
                    <div class="form-controls">
                        <input type="text" name="news_page_list_title" value="{{$settings['news_page_list_title'] ?? ''}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="" >{{__("Trang biểu ngữ")}}</label>
                    <div class="form-controls form-group-image">
                        {!! \Modules\Media\Helpers\FileHelper::fieldUpload('news_page_list_banner',$settings['news_page_list_banner'] ?? "") !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="" >{{__("SEO Options")}}</label>
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
                                <label class="control-label">{{__("Seo Tiêu đề")}}</label>
                                <input type="text" name="news_page_list_seo_title" class="form-control" placeholder="{{__("Nhập tiêu đề...")}}" value="{{ $settings['news_page_list_seo_title'] ?? ""}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{__("Seo Mô tả")}}</label>
                                <input type="text" name="news_page_list_seo_desc" class="form-control" placeholder="{{__("Nhập mô tả...")}}" value="{{$settings['news_page_list_seo_desc'] ?? ""}}">
                            </div>
                            <div class="form-group form-group-image">
                                <label class="control-label">{{__("Ảnh nổi bật")}}</label>
                                {!! \Modules\Media\Helpers\FileHelper::fieldUpload('news_page_list_seo_image', $settings['news_page_list_seo_image'] ?? "" ) !!}
                            </div>
                        </div>
                        @php $seo_share = !empty($settings['news_page_list_seo_share']) ? json_decode($settings['news_page_list_seo_share'],true): false; @endphp
                        <div class="tab-pane" id="seo_2">
                            <div class="form-group">
                                <label class="control-label">{{__("Tiêu đề Facebook")}}</label>
                                <input type="text" name="news_page_list_seo_share[facebook][title]" class="form-control" placeholder="{{__("Nhập tiêu đề...")}}" value="{{$seo_share['facebook']['title'] ?? "" }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{__("Mô tả Facebook")}}</label>
                                <input type="text" name="news_page_list_seo_share[facebook][desc]" class="form-control" placeholder="{{__("Nhập mô tả...")}}" value="{{$seo_share['facebook']['desc'] ?? "" }}">
                            </div>
                            <div class="form-group form-group-image">
                                <label class="control-label">{{__("Hình Facebook")}}</label>
                                {!! \Modules\Media\Helpers\FileHelper::fieldUpload('news_page_list_seo_share[facebook][image]',$seo_share['facebook']['image'] ?? "" ) !!}
                            </div>
                        </div>
                        <div class="tab-pane" id="seo_3">
                            <div class="form-group">
                                <label class="control-label">{{__("Tiêu đề Twitter")}}</label>
                                <input type="text" name="news_page_list_seo_share[twitter][title]" class="form-control" placeholder="{{__("Nhập tiêu đề...")}}" value="{{$seo_share['twitter']['title'] ?? "" }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{__("Mô tả Twitter")}}</label>
                                <input type="text" name="news_page_list_seo_share[twitter][desc]" class="form-control" placeholder="{{__("Nhập mô tả...")}}" value="{{$seo_share['twitter']['title'] ?? "" }}">
                            </div>
                            <div class="form-group form-group-image">
                                <label class="control-label">{{__("Hình Twitter ")}}</label>
                                {!! \Modules\Media\Helpers\FileHelper::fieldUpload('news_page_list_seo_share[twitter][image]', $seo_share['twitter']['image'] ?? "" ) !!}
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
        <h3 class="form-group-title">{{__("Tùy chọn thanh bên")}}</h3>
        <p class="form-group-desc">{{__('Cấu hình thanh bên cho tin tức')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label>{{__("Chia sẻ xã hội")}}</label>
                    <div class="form-controls">
                        <div class="form-group-item">
                            <div class="g-items-header">
                                <div class="row">
                                    <div class="col-md-8">{{__("Tiêu đề")}}</div>
                                    <div class="col-md-3">{{__('Loại')}}</div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="g-items">
                                <?php
                                if(!empty($settings['news_sidebar'])){
                                $social_share = json_decode($settings['news_sidebar']);
                                ?>
                                @foreach($social_share as $key=>$item)
                                    <div class="item" data-number="{{$key}}">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input type="text" name="news_sidebar[{{$key}}][title]" class="form-control" placeholder="{{__('Tiêu đề :Giới thiệu')}}" value="{{$item->title}}">
                                                <textarea name="news_sidebar[{{$key}}][content]" rows="2" class="form-control" placeholder="{{__("Nội dung")}}">{{$item->content}}</textarea>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-control" name="news_sidebar[{{$key}}][type]">
                                                    <option @if(!empty($item->type) && $item->type=='search_form') selected @endif value="search_form">{{__("Mẫu tìm kiếm")}}</option>
                                                    <option @if(!empty($item->type) && $item->type=='recent_news') selected @endif value="recent_news">{{__("Tin tức gần đây")}}</option>
                                                    <option @if(!empty($item->type) && $item->type=='category') selected @endif value="category">{{__("Danh mục")}}</option>
                                                    <option @if(!empty($item->type) && $item->type=='tag') selected @endif value="tag">{{__("Thẻ")}}</option>
                                                    <option @if(!empty($item->type) && $item->type=='content_text') selected @endif value="content_text">{{__("Nội dung văn bản")}}</option>
                                                </select>
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
                                        <div class="col-md-8">
                                            <input type="text" __name__="news_sidebar[__number__][title]" class="form-control" placeholder="{{__('Tiêu đề : Giới thiệu')}}">
                                            <textarea __name__="news_sidebar[__number__][content]" rows="3" class="form-control" placeholder="{{__("Content")}}"></textarea>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control" __name__="news_sidebar[__number__][type]">
                                                <option value="search_form">{{__("Mẫu tìm kiếm")}}</option>
                                                <option value="recent_news">{{__("Tin tức gần đây")}}</option>
                                                <option value="category">{{__("Danh mục")}}</option>
                                                <option value="tag">{{__("Thẻ")}}</option>
                                                <option value="content_text">{{__("Nội dung văn bản")}}</option>
                                            </select>
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