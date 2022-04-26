@extends('portal.layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sửa thông tin</h1>
    </div>
</div>
<div class="row">
    @if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
    @endif
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="display: flex; justify-content: center">
                <img id="avatar" src="{{ $user->avatar ? asset($user->avatar) : asset('images/default-avatar.jpg') }}"
                    style="height: 200px; width: 200px; border-radius: 50%; object-fit: cover">
            </div>
            <div class="panel-body">
                <form role="form" name="user-form" class="form-transparent clearfix" method="POST"
                    action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Họ và tên <a style="color:red">*</a></label>
                                <input class="form-control" name="name" placeholder="Họ và tên ..."
                                    value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label>Email <a style="color:red">*</a></label>
                                <input class="form-control" name="email" placeholder="Email ..."
                                    value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Mật khẩu ..." value="">
                            </div>
                            <div class="form-group">
                                <label>Role <a style="color:red">*</a></label>
                                <select class="form-control" name="role" value="{{ old('role')}}">
                                    <option value="{{ \App\Enums\DBConstant::MOD }}" {{ $user->role ===
                                        \App\Enums\DBConstant::MOD ? "selected" : "" }}>MOD</option>
                                    <option value="{{ \App\Enums\DBConstant::ADMIN }}" {{ $user->role ===
                                        \App\Enums\DBConstant::ADMIN ? "selected" : "" }}>ADMIN</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <input style="display: none" id="input-avatar" type="file" name="avatar"
                                accept="image/*">
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="date" class="form-control" name="date_of_birth"
                                    placeholder="Ngày sinh ..." value="{{ $user->date_of_birth }}">
                            </div>
                            <div class="form-group">
                                <label>Giới tính <a style="color:red">*</a></label>
                                <select class="form-control" name="sex">
                                    <option value="{{ \App\Enums\DBConstant::MALE }}" {{ $user->sex ===
                                        \App\Enums\DBConstant::MALE ? "selected" : "" }}>Nam</option>
                                    <option value="{{ \App\Enums\DBConstant::FEMALE }}" {{ $user->sex ===
                                        \App\Enums\DBConstant::FEMALE ? "selected" : "" }}>Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="phone" placeholder="Số điện thoại ..."
                                    value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Thông tin khác</label>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#info" data-toggle="tab" aria-expanded="false">Vietnamese</a>
                                    </li>
                                    <li class="">
                                        <a href="#info_en" data-toggle="tab" aria-expanded="false">English</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="info">
                                        <textarea name="info" placeholder="Thông tin khác ....." class="form-control" id="editor" rows="10">{{ $user->info }}</textarea>
                                    </div>
                                    <div class="tab-pane fade" id="info_en">
                                        <textarea name="info_en" placeholder="Thông tin khác ....." class="form-control" id="editor_en" rows="10">{{ $user->info_en }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: right">
                                <button type="submit" class="btn btn-default">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $("#avatar").click(function() {
            $("#input-avatar").click()
        })
        $("#input-avatar").on("change", function(e) {
            if (this.files && this.files[0]) {
                if (this.files[0].size > 1024 * 1024 * 5) {
                    return Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Dung lượng ảnh không được vượt quá 5MB!'
                    })
                }
                var tmppath = URL.createObjectURL(e.target.files[0]);
                $("#avatar").fadeIn("fast").attr('src', URL.createObjectURL(e.target.files[0]));
            }
        })
        CKEDITOR.replace('editor', {
            toolbarGroups: [
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                { name: 'styles', groups: [ 'styles' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                { name: 'forms', groups: [ 'forms' ] },
                { name: 'colors', groups: [ 'colors' ] },
                { name: 'tools', groups: [ 'tools' ] },
                '/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                { name: 'links', groups: [ 'links' ] },
                { name: 'insert', groups: [ 'insert' ] },
                '/',
                { name: 'others', groups: [ 'others' ] },
                { name: 'about', groups: [ 'about' ] }
            ],
            removeButtons: 'Source,Save,Templates,NewPage,ExportPdf,Preview,Print,Find,Replace,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,CreateDiv,PageBreak,Iframe,ShowBlocks,About,Smiley,Anchor',
            editorplaceholder: 'Type your content...',
            height: '300'
        });

        CKEDITOR.replace('editor_en', {
            toolbarGroups: [
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                { name: 'styles', groups: [ 'styles' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                { name: 'forms', groups: [ 'forms' ] },
                { name: 'colors', groups: [ 'colors' ] },
                { name: 'tools', groups: [ 'tools' ] },
                '/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                { name: 'links', groups: [ 'links' ] },
                { name: 'insert', groups: [ 'insert' ] },
                '/',
                { name: 'others', groups: [ 'others' ] },
                { name: 'about', groups: [ 'about' ] }
            ],
            removeButtons: 'Source,Save,Templates,NewPage,ExportPdf,Preview,Print,Find,Replace,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,CreateDiv,PageBreak,Iframe,ShowBlocks,About,Smiley,Anchor',
            editorplaceholder: 'Type your content...',
            height: '300'
        });
    })
</script>
@endsection