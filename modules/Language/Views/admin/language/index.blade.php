@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Ngôn ngữ")}}</h1>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-4 mb40">
                <div class="panel">
                    <div class="panel-title">{{__("Tất cả ngôn ngữ")}}</div>
                    <div class="panel-body">
                        <form action="" class="needs-validation" novalidate method="post">
                            @csrf
                            @include('Language::admin.language.form')
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
                            <form method="post" action="{{url('admin/module/language/editBulk')}}" class="filter-form filter-form-left d-flex justify-content-start">
                                {{csrf_field()}}

                                <select name="action" class="form-control">
                                    <option value="">{{__(" Nhiều hoạt động ")}}</option>
                                    <option value="publish">{{__(" Công bố ")}}</option>
                                    <option value="draft">{{__(" Chuyển vào thư mục nháp ")}}</option>
                                    <option value="delete">{{__(" Xóa ")}}</option>
                                </select>
                                <button data-confirm="{{__("Bạn có chắc chắn muốn xóa?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="submit">{{__('Chấp nhận')}}</button>
                            </form>
                        @endif
                    </div>
                    <div class="col-left">
                        <form method="get" action="{{url('/admin/module/language')}}" class="filter-form filter-form-right d-flex justify-content-end" role="search">
                            <input type="text" name="s" value="{{ Request()->s }}" class="form-control" placeholder="{{__("Tìm kiếm theo tên")}}">
                            <button class="btn-info btn btn-icon btn_search" id="search-submit" type="submit">{{__('Tìm kiếm')}}</button>
                        </form>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-title">{{__("Tất cả ngôn ngữ")}}</div>
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th width="60px"><input type="checkbox" class="check-all"></th>
                                        <th>{{__("Tên")}}</th>
                                        <th>{{__("Địa phương")}}</th>
                                        <th>{{__("Trạng thái")}}</th>
                                        <th>{{__("Ngày")}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($rows) > 0)
                                        @foreach($rows as $row)
                                            <tr>
                                                <td><input type="checkbox" class="check-item" name="ids[]" value="{{$row->id}}">
                                                </td>
                                                <td class="title">
                                                    <a href="{{url('/admin/module/language/edit/'.$row->id)}}">
                                                        @if($row->flag)
                                                            <span class="flag-icon flag-icon-{{$row->flag}}"></span>
                                                        @endif
                                                        {{$row->name}}
                                                    </a>
                                                </td>
                                                <td>{{$row->locale}}</td>
                                                <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span></td>
                                                <td>{{ display_date($row->updated_at)}}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">{{__("Không có dữ liệu")}}</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        {{$rows->appends(request()->query())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
