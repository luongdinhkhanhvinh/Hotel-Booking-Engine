@extends('admin.layouts.app')
@section('title','News')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Tất cả tin tức")}}</h1>
            <div class="title-actions">
                <a href="{{url('admin/module/news/create')}}" class="btn btn-primary">{{__("Thêm bài đăng mới")}}</a>
            </div>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($rows))
                    <form method="post" action="{{url('admin/module/news/bulkEdit')}}"
                          class="filter-form filter-form-left d-flex justify-content-start">
                        {{csrf_field()}}
                        <select name="action" class="form-control">
                            <option value="">{{__(" Nhiều hoạt động ")}}</option>
                            <option value="publish">{{__(" Công bố ")}}</option>
                            <option value="draft">{{__(" Di chuyển vào thư mục nháp ")}}</option>
                            <option value="delete">{{__(" Xóa")}}</option>
                        </select>
                        <button data-confirm="{{__("Bạn có chắc chắn muốn xóa?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="submit">{{__('Chấp nhận')}}</button>
                    </form>
                @endif
            </div>
            <div class="col-left">
                <form method="get" action="{{url('/admin/module/news/')}} " class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    <input type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Tìm kiếm theo tên')}}"
                           class="form-control">
                    <select name="cate_id" class="form-control">
                        <option value="">{{ __('--Tất cả danh mục --')}} </option>
                        <?php
                        if (!empty($categories)) {
                            foreach ($categories as $category) {
                                printf("<option value='%s' >%s</option>", $category->id, $category->name);
                            }
                        }
                        ?>
                    </select>
                    <button class="btn-info btn btn-icon btn_search" type="submit">{{__('Tìm tin tức')}}</button>
                </form>
            </div>
        </div>
        <div class="text-right">
            <p><i>{{__('Tìm thấy :total mục',['total'=>$rows->total()])}}</i></p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="60px"><input type="checkbox" class="check-all"></th>
                                    <th class="title"> {{ __('Tên')}}</th>
                                    <th class="category"> {{ __('Danh mục')}}</th>
                                    <th class="author"> {{ __('Tác giả')}}</th>
                                    <th class="date"> {{ __('Ngày')}}</th>
                                    <th width="100px">{{  __('Trạng thái')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($rows->total() > 0)
                                    @foreach($rows as $row)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check-item" name="ids[]" value="{{$row->id}}">
                                            </td>
                                            <td class="title">
                                                <a href="{{url('admin/module/news/edit/'.$row->id)}}">{{$row->title}}</a>
                                            </td>
                                            <td>{{$row->getCategory->name ?? '' }}</td>
                                            <td> {{$row->getAuthor->name ?? ''}} </td>
                                            <td> {{ display_date($row->updated_at)}}</td>
                                            <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">{{__("Không có dữ liệu")}}</td>
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
