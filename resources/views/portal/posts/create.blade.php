@extends('portal.layouts.main')
@section('title', 'Dashboard')
@section('content')
@include('ckfinder::setup')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Forms</h1>
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
                        <form role="form" name="user-form" class="form-transparent clearfix" enctype="multipart/form-data" method="POST" action="{{ route('posts.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#title" data-toggle="tab" aria-expanded="false">Vietnamese</a>
                                    </li>
                                    <li class="">
                                        <a href="#title_en" data-toggle="tab" aria-expanded="false">English</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="title">
                                        <input class="form-control" name="title" placeholder="Name....." value="{{ old('title') }}">
                                    </div>
                                    <div class="tab-pane fade" id="title_en">
                                        <input class="form-control" name="title_en" placeholder="Name....." value="{{ old('title_en') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category['id'] }}">{!! $category['name'] !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <button type="button" class="btn btn-primary" onclick="document.getElementById('uploadImage').click()" style="display: block">Upload thumbnail</button>
                                <input name="thumbnail_url" id="uploadImage" type="file" style="display: none">
                                <img style="max-width: 400px; max-height: 400px" />
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#content" data-toggle="tab" aria-expanded="false">Vietnamese</a>
                                    </li>
                                    <li class="">
                                        <a href="#content_en" data-toggle="tab" aria-expanded="false">English</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="content">
                                        <textarea name="content" placeholder="Content....." class="form-control" id="editor" rows="10">{{ old('content') }}</textarea>
                                    </div>
                                    <div class="tab-pane fade" id="content_en">
                                        <textarea name="content_en" placeholder="Content....." class="form-control" id="editor_en" rows="10">{{ old('content_en') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script> --}}
<script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $("#uploadImage").val(null);
        
        CKEDITOR.replace('editor', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
            filebrowserImageUploadUrl: '{{ route('ckfinder_browser') . '?_token=' . csrf_token() }}',
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
            height: '500'
        });

        CKEDITOR.replace('editor_en', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
            filebrowserImageUploadUrl: '{{ route('ckfinder_browser') . '?_token=' . csrf_token() }}',
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
            height: '500'
        });
        
        $('#uploadImage').on('change', function () {
            if (this.files && this.files[0]) {
                var image = $(this).parents(".form-group").children("img");
                var reader = new FileReader();
                reader.onload = function (e) {
                    image.attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        })
    });
</script>
@endsection
