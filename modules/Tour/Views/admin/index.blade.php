@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("All Tour")}}</h1>
            <div class="title-actions">
                <a href="{{url('admin/module/tour/create')}}" class="btn btn-primary">{{__("Thêm chuyến đi mới")}}</a>
            </div>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($rows))
                    <form method="post" action="{{url('admin/module/tour/bulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-start">
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
                <form method="get" action="{{url('/admin/module/tour/')}} " class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    @if(!empty($rows) and $tour_manage_others)
                        <?php
                        $user = !empty(Request()->vendor_id) ? App\User::find(Request()->vendor_id) : false;
                        \App\Helpers\AdminForm::select2('vendor_id', [
                            'configs' => [
                                'ajax'        => [
                                    'url'      => url('/admin/module/user/getForSelect2'),
                                    'dataType' => 'json'
                                ],
                                'allowClear'  => true,
                                'placeholder' => __('-- Nhà cung cấp --')
                            ]
                        ], !empty($user->id) ? [
                            $user->id,
                            $user->name_or_email . ' (#' . $user->id . ')'
                        ] : false)
                        ?>
                    @endif
                    <input type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Tìm kiếm theo tên')}}" class="form-control">
                    <select name="cate_id" class="form-control">
                        <option value="">{{ __('--Tất cả danh mục --')}} </option>
                        <?php
                        foreach ($tour_categories as $category) {
                            printf("<option value='%s' >%s</option>", $category->id, $category->name);
                        }
                        ?>
                    </select>
                    <button class="btn-info btn btn-icon btn_search" type="submit">{{__('Tìm kiếm')}}</button>
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
                            <th> {{ __('Tên')}}</th>
                            <th class="category"> {{ __('Danh mục')}}</th>
                            <th class="author"> {{ __('Tác giả')}}</th>
                            <th width="100px"> {{ __('Trạng thái')}}</th>
                            <th width="100px"> {{ __('Đánh giá')}}</th>
                            <th class="date"> {{ __('Ngày')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($rows->total() > 0)
                            @foreach($rows as $row)
                                <tr class="{{$row->status}}">
                                    <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}">
                                    </td>
                                    <td class="title">
                                        <a href="{{url('admin/module/tour/edit/'.$row->id)}}">{{$row->title}}</a>
                                    </td>
                                    <td>{{$row->category_tour->name ?? '' }}</td>
                                    <td>{{ $row->getAuthor->name ?? 'Author' }}</td>
                                    <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span></td>
                                    <td>
                                        <a target="_blank" href="{{ url("/admin/module/review?service_id=".$row->id) }}" class="review-count-approved">
                                            {{ $row->getNumberReviewsInService() }}
                                        </a>
                                    </td>
                                    <td>{{ display_date($row->updated_at)}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">{{__("Không có dữ liệu")}}</td>
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
@endsection
