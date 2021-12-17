@extends('portal.layouts.main')
@section('title', 'Dashboard')
@section('content')
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
                        <form role="form" name="user-form" class="form-transparent clearfix" enctype="multipart/form-data" method="POST" action="{{ route('posts.update', $post->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" placeholder="Name....."
                                    value="{{ $post->title }}">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                        @if ($category->id === $post->category_id)
                                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <button type="button" class="btn btn-primary" onclick="document.getElementById('uploadImage').click()" style="display: block">Upload thumbnail</button>
                                <input name="thumbnail_url" id="uploadImage" type="file" style="display: none">
                                <img src="{{ asset($post->thumbnail_url) }}" style="max-width: 400px; max-height: 400px" />
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" placeholder="Content....." class="form-control" id="editor" rows="10">{!! $post->content !!}</textarea>
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
