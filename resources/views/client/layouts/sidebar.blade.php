@forelse ($categories as $category)
    <div class="category-item" data-cate_id="{{ $category->id }}" data-parent_id="{{ $category->parent_id }}" style="margin-left: {{ $level * 10 }}px;" onclick="onClickCategory(event)">
        <a style="max-width: 90%" href="{{ route('categories') . '?parent_id='.$parentId.'&category_id=' . $category->id }}">{{ $category->name }}</a>
        <span style="color: white; pointer-events: none;">+</span>
    </div>
    <div data-child="{{ $category->id }}" style="display: none">
        @includeWhen($category->sub->count() ,'client.layouts.sidebar', ['categories' => $category->sub, 'level' => $level + 1])
    </div>
@empty
<div class="item-menu"><span></span></div> 
@endforelse