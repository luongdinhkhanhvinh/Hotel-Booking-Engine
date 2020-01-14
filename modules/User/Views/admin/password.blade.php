@extends('admin.layouts.app')

@section('content')
    <form action="{{url('admin/module/user/changepass/'.$row->id)}}" method="post">
        @csrf
        <div class="container">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? 'Thay đổi mật khẩu: '.$row->getDisplayName() : 'Thêm mới thành viên'}}</h1>
                </div>
            </div>
            @include('admin.message')

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-title">
                            @if($row->id)
                                <strong class="">{{ __('Thay đổi mật khẩu')}}</strong>
                            @else
                                <strong class="">{{ __('Mật khẩu')}}</strong>
                            @endif
                        </div>
                        <div class="panel-body">

                            @if($row->id and $row->id != $currentUser->id and !$currentUser->hasPermissionTo('user_update') )
                                <div class="form-group">
                                    <label>{{ __('Mật khẩu cũ')}}</label>
                                    <input type="password" value="" placeholder="{{ __('Mật khẩu cũ')}}" name="old_password" class="form-control" >
                                </div>
                            @endif
                            <div class="form-group">
                                <label>{{ __('Mật khẩu mới')}}</label>
                                <input type="password" value="" placeholder="{{ __('Mật khẩu')}}" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>{{ __('Nhập lại mật khẩu')}}</label>
                                <input type="password" value="" placeholder="{{ __('Nhập lại mật khẩu')}}" name="password_confirmation" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary"> {{ __('Thay đổi mật khẩu')}} </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
