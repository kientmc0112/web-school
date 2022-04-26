@extends('portal.layouts.main')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sửa thông tin</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" name="user-form" class="form-transparent clearfix" method="POST" action="{{ route('contacts.update', $contact->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Họ và tên</label>
                                        <input class="form-control" name="name" disabled placeholder="Họ và tên ....." value="{{ $contact->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" name="email" disabled placeholder="Email ....." value="{{ $contact->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" name="telephone" disabled placeholder="Số điện thoại ....." value="{{ $contact->telephone }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input class="form-control" name="subject" disabled placeholder="Ngày sinh ....." value="{{ $contact->date_of_birth }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Ghi chú</label>
                                        <textarea name="note" placeholder="Ghi chú ....." class="form-control" rows="3">{{ $contact->note }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Trạng thái</label><br/>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="0" {{ $contact->status == 0 ? 'checked' : '' }}>Mới
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="1" {{ $contact->status == 1 ? 'checked' : '' }}>Đang xử lí
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="2" {{ $contact->status == 2 ? 'checked' : '' }}>Hoàn thành
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
