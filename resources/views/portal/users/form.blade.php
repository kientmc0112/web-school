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
                @if (isset($user))
                    {{ trans('messages.user.label.edit') }}
                @else
                    {{ trans('messages.user.label.create') }}
                @endif
                
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" name="user-form" class="form-transparent clearfix" method="POST" action="{{ isset($user) ? route('user.updateUser', $user->id) : route('user.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.name') }} <a style="color:red">*</a></label>
                                <input class="form-control" name="name" placeholder="{{ trans('messages.user.placeholder.name') }}" value="{{ isset($user) ? $user->name : old('name') }}">
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.email') }} <a style="color:red">*</a></label>
                                <input class="form-control" name="email" placeholder="{{ trans('messages.user.placeholder.email') }}" value="{{ isset($user) ? $user->email : old('email') }}">
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.phone') }}</label>
                                <input class="form-control" name="phone" placeholder="{{ trans('messages.user.placeholder.phone') }}" value="{{ isset($user) ? $user->phone : old('phone') }}">
                            </div>
                            {{-- <div class="form-group">
                                <label>{{ trans('messages.user.label.department') }} <a style="color:red">*</a></label>
                                <select class="form-control" name="department_id">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" {{ isset($user) ? ($user->department_id === $department->id ? "selected" : "") : "" }}>{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.structure') }}</label>
                                <select class="form-control" name="level">
                                    <option value="">--- {{ trans('messages.user.label.structure') }} ----</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}" {{ isset($user) ? ($user->level === $level->id ? "selected" : "") : "" }}>{{ $level->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.position') }}</label>
                                <select class="form-control" name="position">
                                    <option value="">--- {{ trans('messages.user.label.position') }} ----</option>
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}" {{ isset($user) ? ($user->position === $position->id ? "selected" : "") : "" }}>{{ $position->name }}</option>
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
                                    <option value="{{ \App\Enums\DBConstant::TEACHER }}" {{ Auth::user()->role === \App\Enums\DBConstant::TEACHER ? "selected" : "" }}>{{ trans('messages.role.teacher') }}</option>
                                    <option value="{{ \App\Enums\DBConstant::SUPPER_ADMIN  }}" {{ Auth::user()->role === \App\Enums\DBConstant::SUPPER_ADMIN ? "selected" : "" }}>{{ trans('messages.role.sp_admin') }}</option>
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