<?php
$meta_seo = $row->getSeoMeta();
$seo_share = $meta_seo['seo_share'] ?? false;
?>
<div class="panel">
    <div class="panel-title"><strong>{{__("Quản lý Seo")}}</strong></div>
    <div class="panel-body">
        <div class="form-group">
            <label class="control-label">
                {{__("Cho phép các công cụ tìm kiếm hiển thị dịch vụ này trong kết quả tìm kiếm?")}}
            </label>
            <select name="seo_index" class="form-control">
                <option value="1" @if(isset($meta_seo['seo_index']) and $meta_seo['seo_index'] == 1) selected @endif>{{__("Có")}}</option>
                <option value="0" @if(isset($meta_seo['seo_index']) and $meta_seo['seo_index'] == 0) selected @endif>{{__("Không")}}</option>
            </select>
        </div>
        <ul class="nav nav-tabs" data-condition="seo_index:is(1)">
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
        <div class="tab-content" data-condition="seo_index:is(1)">
            <div class="tab-pane active" id="seo_1">
                <div class="form-group" >
                    <label class="control-label">{{__("Tiêu đề Seo")}}</label>
                    <input type="text" name="seo_title" class="form-control" placeholder="{{ $row->title ?? $row->name ?? __("Để trống để sử dụng tiêu đề dịch vụ")}}" value="{{ $meta_seo['seo_title'] ?? ""}}">
                </div>
                <div class="form-group">
                    <label class="control-label">{{__("Mô tả Seo")}}</label>
                    <textarea name="seo_desc" rows="3" class="form-control" placeholder="{{$row->short_desc ?? __("Nhập mô tả...")}}">{{$meta_seo['seo_desc'] ?? ""}}</textarea>
                </div>
                <div class="form-group form-group-image">
                    <label class="control-label">{{__("Hình nổi bật")}}</label>
                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('seo_image', $meta_seo['seo_image'] ?? "" ) !!}
                </div>
            </div>
            <div class="tab-pane" id="seo_2">
                <div class="form-group">
                    <label class="control-label">{{__("Tiêu đề Facebook")}}</label>
                    <input type="text" name="seo_share[facebook][title]" class="form-control" placeholder="{{ $row->title ?? $row->name ?? __("Nhập tiêu đề...")}}" value="{{$seo_share['facebook']['title'] ?? "" }}">
                </div>
                <div class="form-group">
                    <label class="control-label">{{__("Mô tả Facebook")}}</label>
                    <textarea name="seo_share[facebook][desc]" rows="3" class="form-control" placeholder="{{$row->short_desc ?? __("Nhập mô tả...")}}">{{$seo_share['facebook']['desc'] ?? "" }}</textarea>
                </div>
                <div class="form-group form-group-image">
                    <label class="control-label">{{__("Hình Facebook")}}</label>
                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('seo_share[facebook][image]',$seo_share['facebook']['image'] ?? "" ) !!}
                </div>
            </div>
            <div class="tab-pane" id="seo_3">
                <div class="form-group">
                    <label class="control-label">{{__("Tiêu đề Twitter")}}</label>
                    <input type="text" name="seo_share[twitter][title]" class="form-control" placeholder="{{ $row->title ?? $row->name ?? __("Nhập tiêu đề...")}}" value="{{$seo_share['twitter']['title'] ?? "" }}">
                </div>
                <div class="form-group">
                    <label class="control-label">{{__("Mô tả Twitter")}}</label>
                    <textarea name="seo_share[twitter][desc]" rows="3" class="form-control" placeholder="{{$row->short_desc ?? __("Nhập mô tả...")}}">{{$seo_share['twitter']['desc'] ?? "" }}</textarea>
                </div>
                <div class="form-group form-group-image">
                    <label class="control-label">{{__("Hình Twitter")}}</label>
                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('seo_share[twitter][image]', $seo_share['twitter']['image'] ?? "" ) !!}
                </div>
            </div>
        </div>
    </div>
</div>