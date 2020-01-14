@extends('admin.layouts.app')
@section('content')
    <form action="" method="post">
        @csrf
        <div class="container">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? 'Sửa: '.$row->name : 'Thêm thẻ mới'}}</h1>
                    @if($row->slug)
                        <p class="item-url-demo"> {{ __('Liên kết vĩnh cửu:')}} {{url('news/tag')}}/<a href="#" class="open-edit-input" data-name="slug">{{$row->slug}}</a>
                        </p>
                    @endif
                </div>
                <div class="">
                    @if($row->slug)
                        <a class="btn btn-primary btn-sm" href="{{$row->getDetailUrl()}}" target="_blank"> {{ __('Xem')}}</a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="panel-body-title"> {{ __('Nội dung thẻ')}}</h3>
                            @include('News::admin/tag/form')
                        </div>
                    </div>
                    @include('Core::admin/seo-meta/seo-meta')
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <span></span>
                <button class="btn btn-primary" type="submit"> {{ __('Lưu thay đổi')}}</button>
            </div>
        </div>
    </form>
@endsection
@section ('script.body')
@endsection