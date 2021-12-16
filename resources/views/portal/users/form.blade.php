@extends('portal.layouts.main')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Forms</h1>
    </div>
</div
<div class="row">
    <div class="col-lg-6">
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ trans('messages.user.label.title_form') }}
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" name="user-form" class="form-transparent clearfix" method="POST" action="{{ route('user.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.name') }} <a style="color:red">*</a></label>
                                <input class="form-control" name="name" placeholder="{{ trans('messages.user.placeholder.name') }}" value="{{ old('name')}}">
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.email') }} <a style="color:red">*</a></label>
                                <input class="form-control" name="email" placeholder="{{ trans('messages.user.placeholder.email') }}" value="{{ old('email')}}">
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.phone') }}</label>
                                <input class="form-control" name="phone" placeholder="{{ trans('messages.user.placeholder.phone') }}" value="{{ old('phone')}}">
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.department') }} <a style="color:red">*</a></label>
                                <select class="form-control" name="department_id">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.password') }} <a style="color:red">*</a></label>
                                <input type="password" class="form-control" name="password" placeholder="{{ trans('messages.user.placeholder.password') }}" value="{{ old('password')}}">
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.role') }} <a style="color:red">*</a></label>
                                <select class="form-control" name="role" value="{{ old('role')}}">
                                    <option value="{{ \App\Enums\DBConstant::ADMIN }}">{{ trans('messages.role.admin') }}</option>
                                    <option value="{{ \App\Enums\DBConstant::SUPPER_ADMIN  }}">{{ trans('messages.role.sp_admin') }}</option>
                                </select>
                            </div>
                            <div style="text-align: right">
                                <button type="submit" class="btn btn-default">{{ trans('messages.user.button.submit') }}</button>
                                <button type="reset" class="btn btn-default">{{ trans('messages.user.button.reset') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection