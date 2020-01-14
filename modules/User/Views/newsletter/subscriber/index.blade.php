@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Người đăng ký")}}</h1>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-title">{{__("Thêm người đăng ký")}}</div>
                    <div class="panel-body">
                        <form action="{{url('/admin/module/user/subscriber/store')}}" method="post">
                            @csrf
                            @include('User::newsletter/subscriber/form')
                            <div class="">
                                <button class="btn btn-primary" type="submit">{{__("Thêm mới")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="filter-div d-flex justify-content-between ">
                    <div class="col-left">
                        @if(!empty($rows))
                            <form method="post" action="{{url('admin/module/user/subscriber/editBulk')}}" class="filter-form filter-form-left d-flex justify-content-start">
                                {{csrf_field()}}
                                <select name="action" class="form-control">
                                    <option value="">{{__(" Nhiều hoạt động ")}}</option>
                                    <option value="delete">{{__(" Xóa ")}}</option>
                                </select>
                                <button data-confirm="{{__("Bạn có chắc chắn muốn xóa?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="submit">{{__('Chấp nhận')}}</button>
                            </form>
                        @endif
                    </div>
                    <div class="col-left">
                        <form method="get" action="{{url('/admin/module/user/subscriber')}} " class="filter-form filter-form-right d-flex justify-content-end" role="search">
                            <a class="btn btn-warning btn-icon" href="{{url('/admin/module/user/subscriber/export')}}" target="_blank" title="{{__("Xuất ra excel")}}"><i class="icon ion-md-cloud-download"></i>&nbsp;{{__('Xuất')}}
                            </a>
                            <input type="text" name="s" value="{{ Request()->s }}" class="form-control" placeholder="{{__("Tìm kiếm theo tên hoặc email")}}">
                            <button class="btn-info btn btn-icon btn_search" id="search-submit" type="submit">{{__('Tìm kiếm')}}</button>
                        </form>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <form class="bravo-form-item">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="60px"><input type="checkbox" class="check-all"></th>
                                    <th>{{__("Tên")}}</th>
                                    <th>{{__("Họ")}}</th>
                                    <th>{{__("Tên")}}</th>
                                    <th class="date">{{__("Ngày")}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rows as $row)
                                    <tr>
                                        <td><input type="checkbox" name="ids[]" value="{{$row->id}}" class="check-item">
                                        <td class="title">
                                            <a href="{{url('admin/module/user/subscriber/edit/'.$row->id)}}">{{$row->email}}</a>
                                        </td>
                                        <td>{{$row->first_name}}</td>
                                        <td>{{$row->last_name}}</td>
                                        <td>{{ display_date($row->updated_at)}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="d-flex justify-content-center">{{$rows->links()}}</div>
            </div>
        </div>
    </div>
@endsection
