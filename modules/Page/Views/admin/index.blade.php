@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{ __('Tất cả trang')}}</h1>
            <div class="title-actions">
                <a href="{{url('admin/module/page/create')}}" class="btn btn-primary">{{ __('Thêm trang mới')}}</a>
            </div>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left"> 
                @if(!empty($rows))
                <form method="post" action="{{url('admin/module/page/bulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-start">
                    {{csrf_field()}}
                    <select name="action" class="form-control">
                        <option value="">{{__(" Nhiều hoạt động ")}}</option>
                        <option value="publish">{{__(" Công bố ")}}</option> 
                        <option value="draft">{{__(" Di chuyển vào thùng rác")}}</option>
                        <option value="delete">{{__(" Xóa ")}}</option> 
                    </select>
                    <button data-confirm="{{__("Bạn có chắc chắn muốn xóa?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="submit">{{__('Chấp nhận')}}</button>
                </form>
               @endif
            </div>
            <div class="col-left">
               <form method="get" action="{{url('/admin/module/page/')}} " class="filter-form filter-form-right d-flex justify-content-end" role="search">
                    <input  type="text" name="page" value="{{ Request()->page }}" placeholder="{{__('Search by name')}}" class="form-control">
                    <button class="btn-info btn btn-icon btn_search"  type="submit">{{__('Tìm kiếm trang')}}</button>
                </form>
            </div>
        </div>
        <div class="panel"> 
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="60px"><input type="checkbox" class="check-all"></th>
                                <th >{{ __('Tiêu đề')}}</th>
                                <th class="author">{{ __('Tác giả')}} </th>
                                <th class="date">{{__('Ngày')}} </th>
                                <th class="status">{{__('Trạng thái')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($rows->total() > 0)
                                @foreach($rows as $row)
                                    <tr>
                                        <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}"></td>
                                        <td class="title">
                                            <a href="{{url('admin/module/page/edit/'.$row->id)}}"> {{$row->title}}  </a>
                                        </td>
                                        <td class="author">{{$row->getAuthor->name ?? ''}} </td>
                                        <td class="date">{{ display_date($row->updated_at)}}</td>
                                        <td> <span class="badge badge-{{ $row->status }}">{{ $row->status }}</span> </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">{{__("Không có dữ liệu")}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </form>
                {{$rows->appends(request()->query())->links()}}
            </div>
        </div>
    </div>
@endsection
