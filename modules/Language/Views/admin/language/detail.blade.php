@extends('admin.layouts.app')
@section('content')
    <form action="" method="post">
        @csrf
        <div class="container">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? 'Sửa: '.$row->name : __("'Thêm địa điểm mới'")}}</h1>
                    @if($row->slug)
                        <p class="item-url-demo">{{__("Liên kết vĩnh cửu")}}: {{url('news-category')}}/<a href="#" class="open-edit-input" data-name="slug">{{$row->slug}}</a>
                        </p>
                    @endif
                </div>
                <div class="">
                    @if($row->slug)
                        <a class="btn btn-primary btn-sm" href="{{$row->detail_url}}" target="_blank">{{__("Xem")}}</a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    @include('admin.message')
                    <div class="panel">
                        <div class="panel-title">{{__("Nội dung ngôn ngữ")}}</div>
                        <div class="panel-body">
                            @include('Language::admin.language.form')
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span></span>
                        <button class="btn btn-primary" type="submit">{{__("Lưu thay đổi")}}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section ('script.body')
@endsection