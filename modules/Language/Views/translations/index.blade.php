@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Quản lý dịch")}}</h1>
            <a class="btn btn-primary" href="{{url('admin/module/language/translations/loadStrings')}}"><i class="icon ion-ios-search"></i> {{__("Find Translations")}}</a>
        </div>
        @include('admin.message')
        <div class="alert alert-warning">
            {{__("Sau khi dịch. Bạn phải xây dựng lại tệp ngôn ngữ để áp dụng thay đổi")}}
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-title">{{__("Tất cả ngôn ngữ")}}</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{__("Tên")}}</th>
                                <th>{{__("Phần trăm")}}</th>
                                <th>{{__("Đã dịch")}}</th>
                                <th>{{__("Bản dựng cuối cùng tại")}}</th>
                                <th>{{__("Hoạt động")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($languages) > 0)
                                @foreach($languages as $language)
                                    <tr>
                                        <td class="title">
                                            <a href="{{url('admin/module/language/translations/detail/'.$language->id)}}">
                                                <span class="flag-icon flag-icon-{{$language->flag}}"></span> {{$language->name}}
                                                - ({{$language->locale}})
                                            </a>
                                        </td>
                                        <td>{{$total_text ? $language->translated_percent / $total_text * 100 : 0 }}%</td>
                                        <td>{{$language->translated_number}}/{{$total_text}}</td>
                                        <td>{{$language->last_build_at ? display_datetime($language->last_build_at) : ''}}</td>
                                        <td>
                                            <a href="{{url('admin/module/language/translations/detail/'.$language->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> {{__("Phiên dịch")}}
                                            </a>
                                            <a href="{{url('admin/module/language/translations/build/'.$language->id)}}" class="btn btn-sm btn-info"><i class="fa fa-cubes"></i> {{__("Xây dựng")}}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">{{__("Không có dữ liệu")}}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        </div>
                        <div class="d-flex justify-content-end">{{$languages->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
