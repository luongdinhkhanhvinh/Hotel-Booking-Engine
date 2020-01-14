@extends ('admin.layouts.app')
@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="d-flex justify-content-between mb20">
                    <h1 class="title-bar">{{__('Công cụ')}}</h1>
                </div>
                <div class="panel">
                    <div class="panel-body pd15">
                        <div class="row area-setting-row">
                            <div class="col-md-4">
                                <div class="area-setting-item">
                                    <a class="setting-item-link" href="{{url('admin/module/language')}}">
                                        <span class="setting-item-media">
                                            <i class="icon ion-ios-globe"></i>
                                        </span>
                                        <span class="setting-item-info">
                                            <span class="setting-item-title">{{__("Ngôn ngữ")}}</span>
                                            <span class="setting-item-desc">{{__("Quản lý ngôn ngữ của trang web của bạn")}}</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="area-setting-item">
                                    <a class="setting-item-link" href="{{url('admin/module/language/translations')}}">
                                        <span class="setting-item-media">
                                            <i class="icon ion-ios-globe"></i>
                                        </span>
                                        <span class="setting-item-info">
                                            <span class="setting-item-title">{{__("Bản dịch")}}</span>
                                            <span class="setting-item-desc">{{__("Quản lý dịch trang web của bạn")}}</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="area-setting-item">
                                    <a class="setting-item-link" href="{{url('admin/logs')}}">
                                        <span class="setting-item-media">
                                            <i class="icon ion-ios-nuclear"></i>
                                        </span>
                                        <span class="setting-item-info">
                                            <span class="setting-item-title">{{__("Trình xem nhật ký hệ thống")}}</span>
                                            <span class="setting-item-desc">{{__("Lượt xem và quản lý nhật ký hệ thống của trang web của bạn")}}</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection