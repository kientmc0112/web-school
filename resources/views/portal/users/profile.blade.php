@extends('portal.layouts.main')
@section('title', 'Dashboard')
@section('css')
    <style>
        .panel-heading {
            display: flex;
            justify-content: center;
        }
        .panel-heading #avatar {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 100%;
            cursor: pointer;
            background: white
        }
    </style>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans('messages.user.label.profile') }}</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <img id="avatar" src="{{ isset($user->avatar) ? $user->avatar : "https://www.minervastrategies.com/wp-content/uploads/2016/03/default-avatar.jpg" }}" alt="Flowers in Chania"> 
            </div>
            <div class="panel-body">
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <div class="col-lg-12">
                        <form role="form" name="user-form" class="form-transparent clearfix" method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input style="display: none" id="input-avatar" type="file" name="avatar" accept="image/*">
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.name') }} <a style="color:red">*</a></label>
                                <input class="form-control" name="name" placeholder="{{ trans('messages.user.placeholder.name') }}" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.email') }} <a style="color:red">*</a></label>
                                <input class="form-control" name="email" disabled placeholder="{{ trans('messages.user.placeholder.email') }}" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.date_of_birth') }}</label>
                                <input type="date" class="form-control" name="date_of_birth" placeholder="{{ trans('messages.user.placeholder.date_of_birth') }}" value="{{ $user->date_of_birth }}">
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.sex') }} <a style="color:red">*</a></label>
                                <select class="form-control" name="sex">
                                    <option value="1" {{ $user->sex === 1 ? "selected" : "" }} >{{ trans('messages.sex.male') }}</option>
                                    <option value="2" {{ $user->sex === 2 ? "selected" : "" }} >{{ trans('messages.sex.female') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.phone') }}</label>
                                <input class="form-control" name="phone" placeholder="{{ trans('messages.user.placeholder.phone') }}" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.facebook') }}</label>
                                <input class="form-control" name="facebook_link" placeholder="{{ trans('messages.user.placeholder.facebook') }}" value="{{ $user->facebook_link }}">
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.user.label.department') }} <a style="color:red">*</a></label>
                                <select class="form-control" name="department_id">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" {{ $user->department_id === $department->id ? "selected" : "" }} >{{ $department->name }}</option>
                                    @endforeach
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
    <div class="col-lg-3"></div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#avatar").click(function() {
                $("#input-avatar").click()
            })
            $("#input-avatar").on("change", function(e) {
                var tmppath = URL.createObjectURL(e.target.files[0]);
                $("#avatar").fadeIn("fast").attr('src',URL.createObjectURL(e.target.files[0]));
            })
        })
    </script>
@endsection
