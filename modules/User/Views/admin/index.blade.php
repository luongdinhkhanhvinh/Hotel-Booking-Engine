@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{ __('Tất cả thành viên')}}</h1>
            <div class="title-actions">
                <a href="{{url('admin/module/user/create')}}" class="btn btn-primary">{{ __('Thêm thành viên mới')}}</a>
            </div>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($rows))
                    <form method="post" action="{{url('admin/module/user/bulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-start">
                        {{csrf_field()}}
                        <select name="action" class="form-control">
                            <option value="">{{__(" Nhiều hoạt động ")}}</option>
                            {{--<option value="publish">{{__(" Công bố ")}}</option>--}}
                            {{--<option value="draft">{{__(" Chuyển sang thư mục nháp ")}}</option>--}}
                            <option value="delete">{{__(" Xóa ")}}</option>
                        </select>
                        <button data-confirm="{{__("Bạn có chắc chắn muốn xóa?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="submit">{{__('Chấp nhận')}}</button>
                    </form>
                @endif
            </div>
            <div class="col-left">
                <form method="get" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    <select class="form-control" name="role">
                        <option value="">{{ __('-- Chọn --')}}</option>
                        @foreach($roles as $role)
                            <option value="{{$role->name}}" @if(Request()->role == $role->name) selected @endif >{{ucfirst($role->name)}}</option>
                        @endforeach
                    </select>
                    <input type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Tìm kiến theo địa chỉ email')}}" class="form-control">
                    <button class="btn-info btn btn-icon btn_search" type="submit">{{__('Tìm kiếm thành viên')}}</button>
                </form>
            </div>
        </div>
        <div class="text-right">
            <p><i>{{__('Tìm thấy :total mục',['total'=>$rows->total()])}}</i></p>
        </div>
        <div class="panel">
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="60px"><input type="checkbox" class="check-all"></th>
                            <th>{{__('Tên')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Số điện thoại')}}</th>
                            <th>{{__('Vai trò')}}</th>
                            <th class="date">{{ __('Ngày')}}</th>
{{--                            <th class="status">{{__('Hoạt động')}}</th>--}}
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $row)
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="{{$row->id}}" class="check-item"></td>
                                <td class="title">
                                    <a href="{{url('admin/module/user/edit/'.$row->id)}}">{{$row->getDisplayName()}}</a>
                                </td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->phone}}</td>
                                <td>
                                    @php $roles = $row->getRoleNames();
                                    if(!empty($roles[0])){
                                        echo e(ucfirst($roles[0]));
                                    }
                                    @endphp
                                </td>
                                <td>{{ display_date($row->created_at)}}</td>
                                {{--<td class="status">{{$row->status}}</td>--}}
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{url('admin/module/user/password/'.$row->id)}}">{{__('Thay đổi mật khẩu')}}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </form>
                {{$rows->appends(request()->query())->links()}}
            </div>
        </div>
    </div>
@endsection
