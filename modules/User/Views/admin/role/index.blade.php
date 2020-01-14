@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{ __('Vai trò')}}</h1>
            <div class="title-actions">
                <a href="{{url('admin/module/user/role/permission_matrix/')}}" class="btn btn-info">{{ __('Ma trận cho phép')}}</a>
                <a href="{{url('admin/module/user/role/create')}}" class="btn btn-primary">{{ __('Thêm mới vai trò')}}</a>
            </div>
        </div>
        @include('admin.message')
        <div class="panel">
            <div class="panel-title">{{ __('Tất cả vai trò')}}</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="60px"><input type="checkbox" class="check-all"></th>
                        <th>{{ __('Tên')}}</th>
                        <th>{{ __('Ngày')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rows as $row)
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="{{$row->id}}"></td>
                            <td class="title">
                                <a href="{{url('admin/module/user/role/edit/'.$row->id)}}">{{ucfirst($row->name)}}</a>
                            </td>
                            <td>{{ display_date($row->updated_at)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$rows->links()}}
            </div>
        </div>
    </div>
@endsection
