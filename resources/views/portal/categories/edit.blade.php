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
                    <div class="col-lg-6">
                        <form role="form" name="user-form" class="form-transparent clearfix" method="POST"
                            action="{{ route('categories.update', $category->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Name....."
                                    value="{{ $category->name }}">
                            </div>
                            <div class="form-group">
                                <label>Parent Category</label>
                                <select class="form-control" name="parent_id">
                                    <option></option>
                                    @foreach ($categories as $category)
                                    @if ($category->id === $category->parent_id)
                                    <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                    @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" placeholder="Description....." class="form-control" rows="3">{{ $category->description }}</textarea>
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
@endsection
