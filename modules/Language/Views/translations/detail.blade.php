@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Quản lý dịch cho: :name",['name'=>$lang->name])}}</h1>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-12">
                <div class="filter-div d-flex justify-content-between">
                    <div class="col-left">
                        <form method="get" action="" class="filter-form filter-form-left d-flex justify-content-start flex-column flex-sm-row">
                            <select name="type" class="form-control">
                                <option value="">{{__("Tất cả văn bản")}}</option>
                                <option @if(Request()->type == 'not_translated') selected @endif value="not_translated">{{__("Không được dịch")}}</option>
                                <option @if(Request()->type == 'translated') selected @endif value="translated">{{__("Dịch")}}</option>
                            </select>
                            <input type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Search by key ...')}}" class="form-control">
                            <button class="btn-info btn btn-icon" type="submit">{{__('Lọc')}}</button>
                        </form>
                    </div>
                    <div class="col-left">
                        <p><i>{{__('Tìm thấy :total văn bản',['total'=>$origins->total()])}}</i></p>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-title">{{__("Dịch")}}</div>
                    <div class="panel-body">
                        <form action="{{url('admin/module/language/translations/store/'.$lang->id)}}" method="post">
                            @csrf
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="50px"></th>
                                    <th width="50%">{{__("Gốc")}}</th>
                                    <th>{{__("Đã dịch")}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($origins as $k=>$item)
                                    <tr>
                                        <td>{{$origins->firstItem() + $k}}</td>
                                        <td>
                                            {{$item->string}}
                                        </td>
                                        <td>
                                            <textarea name="translate[{{$item->id}}]" class="form-control">{{$item->translate}}</textarea>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                <button class="btn btn-success">{{__('Lưu thay đổi')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="d-flex justify-content-end">{{$origins->links()}}</div>
            </div>
        </div>
    </div>
@endsection
