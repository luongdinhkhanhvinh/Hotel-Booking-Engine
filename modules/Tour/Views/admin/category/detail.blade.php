@extends('admin.layouts.app')
@section('content')
    <form action="" method="post">
        @csrf
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? __('Sửa: ').$row->name : __('Thêm mới danh mục')}}</h1>
                </div>
                <div class="">
                    @if($row->slug)
                        {{--<a class="btn btn-primary btn-sm" href="{{$row->detail_url}}" target="_blank">{{__("Xem")}}</a>--}}
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="panel-body-title">{{__("Nội dung danh mục")}}</h3>
                            @include('News::admin/category/form')
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel">
                        <div class="panel-title"><strong>{{__('Công bố')}}</strong></div>
                        <div class="panel-body">
                            <div>
                                <label><input @if($row->status=='publish') checked @endif type="radio" name="status" value="publish"> {{__("Công bố")}}</label>
                            </div>
                            <div>
                                <label><input @if($row->status=='draft') checked @endif type="radio" name="status" value="draft"> {{__("Nháp")}}</label>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary" type="submit">{{__('Lưu thay đổi')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section ('script.body')
@endsection