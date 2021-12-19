<div class="col-lg-3 col-md-4 col-sm-12">
    @foreach ($cateParent as $cate)
        <div class="category-item" data-cate_id="{{ $cate->id }}">
            <a href="{{ route('categories') . '?category_id=' . $cate->id }}">{{ $cate->name }}</a>
        </div>
    @endforeach
</div>