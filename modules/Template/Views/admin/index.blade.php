@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__('Quản lý mẫu')}}</h1>
            <div class="title-actions">
                <a href="{{url('admin/module/template/create')}}" class="btn btn-primary">{{__('Thêm mẫu mới')}}</a>
            </div>
        </div>
        @include('admin.message')
        <div class="panel">
            <div class="panel-title">{{__('Tất cả mẫu')}}</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="60px"><input type="checkbox" class="check-all"></th>
                        <th>{{__('Tiêu đề')}}</th>
                        <th>{{__('Ngày')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($rows) > 0)
                        @foreach($rows as $row)
                            <tr>
                                <td><input type="checkbox" class="check-item" name="ids[]" value="{{$row->id}}"></td>
                                <td class="title">
                                    <a href="{{url('admin/module/template/edit/'.$row->id)}}">{{$row->title}}</a>
                                </td>
                                <td>{{$row->updated_at}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">{{__("Không có dữ liệu")}}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                {{$rows->links()}}
            </div>
        </div>
    </div>
@endsection
