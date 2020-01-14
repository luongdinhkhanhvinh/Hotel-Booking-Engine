@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Thuộc tính chuyến đi")}}</h1>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-4 mb40">
                <div class="panel">
                    <div class="panel-title">{{__("Thêm thuộc tính")}}</div>
                    <div class="panel-body">
                        <form action="{{url('admin/module/tour/attribute/store')}}" method="post">
                            @csrf
                            @include('Tour::admin/attribute/form',['parents'=>$rows])
                            <div class="">
                                <button class="btn btn-primary" type="submit">{{__("Thêm mới")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-title">{{__("Tất cả thuộc tính")}}</div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th width="60px"><input type="checkbox" class="check-all"></th>
                                <th>{{__("Tên")}}</th>
                                <th class="">{{__("Hoạt động")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($rows) > 0)
                                @foreach($rows as $row)
                                    <tr>
                                        <td><input type="checkbox" class="check-item" name="ids[]" value="{{$row->id}}">
                                        </td>
                                        <td class="title">
                                            <a href="{{url('admin/module/tour/attribute/edit/'.$row->id)}}">{{$row->name}}</a>
                                        </td>
                                        <td>
                                            <a href="{{url('admin/module/tour/attribute/edit/'.$row->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Sửa')}}
                                            </a>
                                            <a href="{{url('admin/module/tour/attribute/terms/'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa"></i> {{__("Quản lý điều kiện")}}
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">{{__("Không có dữ liệu")}}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
