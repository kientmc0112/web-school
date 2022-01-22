@extends('client.layouts.main')
@section('title', 'SIS')
@section('content')
<div class="row" style="padding-top: 20px">
  <div class="col-lg-3 col-md-4 col-sm-12">
    @include('client.layouts.sidebar', ['level' => 0])
  </div>

  <div class="col-lg-9 col-md-8 col-sm-12 p-0" style="margin-top: 5px">
    @if (isset($post))
      <div class="post">
        <div class="post__title">
          <a href="">{{ Session::get('website_language') == 'en' && isset($post->title_en) ? $post->title_en : $post->title }}</a>
          <p>Cập nhật lúc {{ $post->updated_at }} </p>
        </div>
        <div class="post__content">
          <img src="{{ asset($post->thumbnail_url) }}" alt="">
          {!! Session::get('website_language') == 'en' && isset($post->content_en) ? $post->content_en : $post->content !!}
        </div>

        @if (count($similarPosts) > 0)
            <div class="post__other">
            <p>CÁC TIN KHÁC</p>
            <div style="margin-left: 30px">
                @foreach ($similarPosts as $similarPost)
                <div class="content__item">
                    <img class="cate__icon" src="{{ asset('images/next_new_category.png') }}">
                    <a href="{{ route('categories.show', $id) . '?post_id=' . $similarPost->id }}" class="cate__title">
                    {{ Session::get('website_language') == 'en' && isset($similarPost->title_en) ? $similarPost->title_en : $similarPost->title }}
                    </a>
                    <img class="cate__icon-new" src="{{ asset('images/newnew.gif') }}">
                </div>
                @endforeach
            </div>
            </div>
        @endif
      </div>
    @else
      @if (Request::get('child_id') == 12)
        @include('client.components.structure')
      @else
        @foreach ($posts as $post)
          <div class="row post-preview">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="{{ route('categories.show', $id) . '?post_id=' . $post->id }}">
                <img class="w-100 mr-2 border-0 post-preview__img" src="{{ asset($post->thumbnail_url) }}"/>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 post-preview__div">
              <a href="{{ route('categories.show', $id) . '?post_id=' . $post->id }}">
                <h3 class="post-preview__h3">{{ Session::get('website_language') == 'en' && isset($post->title_en) ? $post->title_en : $post->title }}</h3>
                @if (Session::get('website_language') == 'en' && isset($post->content_en))
                    <p class="post-preview__p">{!! Str::limit(strip_tags($post->content_en), $limit = 300, $end = '...') !!}</p>
                @else
                    <p class="post-preview__p">{!! Str::limit(strip_tags($post->content), $limit = 300, $end = '...') !!}</p>
                @endif
                <span class="post-preview__span">By {{ $post->user->name }} | {{ Session::get('website_language') == 'en' && isset($post->category->name_en) ? $post->category->name_en : $post->category->name }}</span>
              </a>
            </div>
          </div>
        @endforeach
        @php $posts = $posts->toArray() @endphp
        @if ($posts['last_page'] > 1)    
          <nav aria-label="navigation" style="margin-top: 20px;">
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <a class="page-link" href="{{ $posts['prev_page_url'] !== null ?  $posts['prev_page_url'] : "#"}}" aria-label="Previous">
                <span aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                <span class="sr-only">Previous</span>
                </a>
              </li>
              @for ($i = 1; $i <= $posts["last_page"]; $i++)  
                <li class="page-item {{ $posts["current_page"] === $i ? "active" : "" }}">
                  <a class="page-link" href="{{ route('categories.show', $id) . "?page=" . $i }}">{{ $i }}</a>
                </li>
              @endfor
              <li class="page-item">
                <a class="page-link" href="{{ $posts['next_page_url'] !== null ?  $posts['next_page_url'] : "#"}}" aria-label="Next">
                <span aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
                <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
        @endif
      @endif
    @endif
  </div>
</div>
@endsection
@section('js')
  <script>
    $(document).ready(function() {
        $(".b-all").on("click", function(e) {
            e.preventDefault();
            let _this = $(this)
            const level = _this.data("id")
            const title  = _this.html()

            $("#exampleModalLongTitle").text(title)

            $.ajax({
                url: '/api/user',
                type: 'GET',
                data: {
                    level: level
                }
            }).done(function(res) {
                if (res.length > 0) {
                    let html = ""
                    res.map(user => {
                        const htmlUser = `<div class="col-6 col-md-6 col-lg-4 col-xl-4">
                                            <a href="/user/info?uid=${user.id}">
                                              <div class=user-popup-item>
                                                  <div class=user-avatar>
                                                      <div class=inner>
                                                          <img src="${user.avatar || 'https://iupac.org/wp-content/uploads/2018/05/default-avatar.png'}">
                                                      </div>
                                                  </div>
                                                  <div class=ho-ten>${user.name}</div>
                                                  <div class=chuc-vu>${user.position}</div>
                                              </div>
                                            </a>
                                        </div>`
                        html += htmlUser
                    })
                    $(".row-eq-height").html(html)
                    $("#ReactModalPortal").modal('toggle')
                }
            });
        })
    })
    function onClickCategory(e) {
      const cateId = e.target.dataset.cate_id;
      const cateChild = document.querySelector('div[data-child="' + cateId +'"]');
      if (cateChild) {    
        if (cateChild.style.display === "none") {
          cateChild.style.display = "block";
          e.target.children[1].innerText = "-";
        } else {
          cateChild.style.display = "none";
          e.target.children[1].innerText = "+";
        }
      }
    }
    
  </script>
@endsection