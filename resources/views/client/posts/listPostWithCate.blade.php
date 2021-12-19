@extends('client.layouts.main')
@section('title', 'SIS')
@section('css')
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
        }
        a {
            color: #fff;
            font: bold 12px arial;
            text-decoration: none
        }
        a:hover {
            text-decoration: none
        }
        .left-sidebar {
            width: 197px;
            background: red;
        }
        .category-item {
            height: auto; 
            background: #0d2c6c; 
            display: flex;
            align-items: center;
            padding-left: 10px;
            margin: 5px 0;
            border-radius: 3px;
            cursor: pointer;
            flex-direction: row;
            justify-content: space-between;
            padding-right: 5px;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .header-content {
            height: 30px;
            background-image: linear-gradient(180deg, #fefefe, #f3f3f3);
            border-bottom: solid 1px #ddd;
            margin-bottom: 10px;
        }
        .right-content {
            padding: 0;
            margin-top: 5px;
            border: solid 1px #ddd;
        }
        .cate {
            display: flex;
            flex-direction: column;
        }
        .cate .cate__header {
            display: flex;
            flex-direction: row;
        }
        .cate .cate__header .cate__title {
            background: #0d2c6c; 
            height: 30px; 
            width: 200px;
            display: flex;
            padding-left: 5px;
        }
        .cate .cate__header .cate__title label{
            color: #fff;
            font: bold 12px arial;
            display: flex;
            align-items: center;
        }
        .cate .cate__header .cate__bg {
            background-image: url("../../../../images/bg_1111.png");
            height: 30px; 
            width: 100%;
            margin-left: -1px;
        }
        .cate .cate__content {
            padding: 10px;
        }
        .content__item {
            margin: 5px 0;
        }
        .content__item .cate__icon {
            margin-top: -3px;
        }
        .content__item .cate__icon-new {
            margin-top: -10px;
        }
        .content__item .cate__title {
            color: #0d2c6c;
        }
        .content__item .cate__title:hover {
            color: red;
        }
        .post {
            padding: 10px;
        }
        .post .post__title a {
            color: #0d2c6c;
            font-family: Arial,Tahoma,Times New Roman;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
        }
        .post .post__title a:hover {
            color: red;
        }
        .post__content img {
            width: 100%;
            margin-bottom: 10px;
        }
        .post__other {
            margin-left: 10px;
            margin-top: 30px;
        }
        .home_news_category_bar
        {
            float:left;
            background: #dd8d00 repeat-x;
            height: auto;
            width: 85%;
            border-radius: 0 50px 0 0;
            padding-bottom: 5px;
        }
        .home_parent_category
        {
            color: #0d2c6c;
            text-transform: uppercase;
            font-size: 9pt;
            font-weight: bold;
            float: left;
            margin: 8px 13px 0 5px;
            display: inline;
        }
        .home_parent_category:hover
        {
            color: red;
        }
        .home_news_sub_panel
        {
            /*border-bottom: solid 1px #b7402a;*/
            float: left;
            font-size: 8px;
            height: auto;
            margin-left: 4px;
            padding-top: 8px;
            white-space: nowrap;
        }
        .home_news_sub_panel a
        {
            color: #000;
            font-size: 9pt;
        }
        .home_news_sub_panel a:hover
        {
            color: #444;
            font-weight:bold;
        }
    </style>
@endsection

@section('content')
<div class="row">
    {{-- @include('client.components.listCate', $cateParent) --}}
    <div class="col-lg-3 col-md-4 col-sm-12">
        @include('client.partials.categories_rows', ['level' => 0])
    </div>

    <div class="col-lg-9 col-md-8 col-sm-12 right-content">
        @if (!$isSingle)
            @foreach ($categories as $key => $cate)
                <div class="cate">
                    <div style="width: 100%;">
                        <div class="home_news_category_bar">
                            <a class="home_parent_category" href=''>{{ $cate->name }}</a>
                            <div class="home_news_sub_panel">
                                {{-- <a id="194" rel='67' href=''>Tuyển sinh</a>
                                &nbsp;|&nbsp;
                                <a id="76" rel='67' href=''>Đại học</a>
                                &nbsp;|&nbsp;
                                <a id="77" rel='67' href=''>Sau đại học</a>
                                &nbsp;|&nbsp;
                                <a id="75" rel='67' href=''>Đào tạo ngắn hạn</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="cate__content">
                        @foreach ($arryPosts[$key] as $post)
                            <div class="content__item">
                                <img class="cate__icon" src="{{ asset('images/next_new_category.png') }}">
                                <a href="{{ route('categories') . '?category_id=' . $cate->id . "&post_id=" . $post->id }}" class="cate__title">{{ $post->title }}</a>
                                <img class="cate__icon-new" src="{{ asset('images/newnew.gif') }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @else
            @if (isset($post))
                <div class="post">
                    <div class="post__title">
                        <a href="">{{ $post->title }}</a>
                        <p>Cập nhật lúc {{ $post->updated_at }} </p>
                    </div>
                    <div class="post__content">
                        <img src="{{ $post->thumbnail_url }}" alt="">
                        {!! $post->content !!}
                    </div>

                    <div class="post__other">
                        <p>CÁC TIN KHÁC</p>
                        <div style="margin-left: 30px">
                            @foreach ($arryPosts['data'] as $post)
                                <div class="content__item">
                                    <img class="cate__icon" src="{{ asset('images/next_new_category.png') }}">
                                    <a href="{{ route('categories') . '?category_id=' . $cateSelect->id . "&post_id=" . $post->id }}" class="cate__title">
                                        {{ $post->title }}
                                    </a>
                                    <img class="cate__icon-new" src="{{ asset('images/newnew.gif') }}">
                                </div>
                            @endforeach
                            @if ($arryPosts['last_page'] > 1)    
                                <nav aria-label="Page navigation example" style="margin-top: 20px;">
                                    <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $arryPosts['prev_page_url'] !== null ?  $arryPosts['prev_page_url'] . '&category_id=' . $cateSelect->id . "&post_id=" . $post->id : "#"}}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $arryPosts["last_page"]; $i++)  
                                        <li class="page-item {{ $arryPosts["current_page"] === $i ? "active" : "" }}">
                                            <a class="page-link" href="{{ route('categories') . '?category_id=' . $cateSelect->id . "&post_id=" . $post->id . "&page=" . $i }}">{{ $i }}</a></li>
                                    @endfor
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $arryPosts['next_page_url'] !== null ?  $arryPosts['next_page_url'] . '&category_id=' . $cateSelect->id . "&post_id=" . $post->id : "#"}}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                    </ul>
                                </nav>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="cate">
                    <div style="width: 100%;">
                        <div class="home_news_category_bar">
                            <a class="home_parent_category" href=''>{{ $cateSelect->name }}</a>
                            <div class="home_news_sub_panel">
                                @if (count($subPanel) > 1)
                                    @foreach ($subPanel as $panel)    
                                        <a href=''>{{ $panel->name }}</a>
                                        &nbsp;|&nbsp;
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="cate__content">
                        @foreach ($arryPosts['data'] as $post)
                            <div class="content__item">
                                <img class="cate__icon" src="{{ asset('images/next_new_category.png') }}">
                                <a href="{{ route('categories') . '?category_id=' . $cateSelect->id . "&post_id=" . $post->id }}" class="cate__title">
                                    {{ $post->title }}
                                </a>
                                <img class="cate__icon-new" src="{{ asset('images/newnew.gif') }}">
                            </div>
                        @endforeach
                        @if ($arryPosts['last_page'] > 1)    
                            <nav aria-label="Page navigation example" style="margin-top: 20px;">
                                <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $arryPosts['prev_page_url'] !== null ?  $arryPosts['prev_page_url'] . '&category_id=' . $cateSelect->id : "#"}}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $arryPosts["last_page"]; $i++)  
                                    <li class="page-item {{ $arryPosts["current_page"] === $i ? "active" : "" }}">
                                        <a class="page-link" href="{{ route('categories') . '?category_id=' . $cateSelect->id . "&page=" . $i }}">{{ $i }}</a></li>
                                @endfor
                                <li class="page-item">
                                    <a class="page-link" href="{{ $arryPosts['next_page_url'] !== null ?  $arryPosts['next_page_url'] . '&category_id=' . $cateSelect->id : "#"}}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                    </a>
                                </li>
                                </ul>
                            </nav>
                        @endif
                    </div>
                </div>
            @endif
        @endif
        
    </div>
</div>
@endsection
@section('js')
    <script>
        function onClickCategory(e) {
            const cateId = e.target.dataset.cate_id
            const cateChild = document.querySelector('div[data-child="' + cateId +'"]');
            if (cateChild.style.display === "none") {
                cateChild.style.display = "block"
                e.target.children[1].innerText = "-"
            } else {
                cateChild.style.display = "none"
                e.target.children[1].innerText = "+"
            }
        }
    </script>
@endsection
