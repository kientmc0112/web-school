@extends('client.layouts.main')
@section('title', 'SIS')
@section('content')
@section('css')
  <link rel="stylesheet" href="{{ asset('OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}">
  <style>
    .image-slider {
      /* max-width: 720px; */
      /* max-height: 300px; */
      object-fit: contain;
    }
    #carouselSlider ol li {
      width: 7px;
      height: 7px;
      border-radius: 100%;
    }

    .title {
      position: relative;
      background-color: var(--blue-vnu);
    }
    .title::after {
      background-color: var(--blue-vnu);
      font-size: 16px;
      content: "";
      position: absolute;
      top: 0;
      bottom: 0;
      left: 100%;
      width: 1em;
      clip-path: polygon(0 0, 100% 50%, 0 100%, 0 50%);
      transform: translateX(-0.1px);
    }
    .bg-vnu-gray {
      background-color: #e6e6e8;
    }

    .bg-vnu-blue {
      background-color: var(--blue-vnu);
    }
  </style>
@endsection
<div class="row mb-3 mt-3">
  <div class="col-lg-12 col-md-12 col-sm-12 d-flex align-items-center justify-content-center px-2">
    <div id="carouselSlider" class="carousel slide" data-ride="carousel" style="width: 100%">
      <ol class="carousel-indicators">
        @foreach ($sliders as $key => $slide)
          @if ($key == 0)
            <li data-target="#carouselSlider" data-slide-to="{{ $key }}" class="active"></li>
          @else
            <li data-target="#carouselSlider" data-slide-to="{{ $key }}"></li>
          @endif
        @endforeach
      </ol>
      <div class="carousel-inner">
        @foreach ($sliders as $key => $slide)
          @if ($key == 0)
            <div class="carousel-item active">
          @else
            <div class="carousel-item">
          @endif
            <a href="{{ $slide->url }}">
              <img class="d-block image-slider w-100" src="{{ asset($slide->image_url) }}" alt="First slide">
            </a>
          </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselSlider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselSlider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  {{-- <div class="col-lg-3 col-md-3 col-sm-12 px-2">
    <div class="list-group list-group-flush" style="font-size: 13px">
      @foreach ($textBanners as $textBanner)
        <a href="{{ $textBanner->url }}" class="list-group-item list-group-item-action py-2"><i class="bi bi-caret-right-fill"></i> {{ $textBanner->filename }}</a>
      @endforeach
      @foreach ($topBanners as $banner)
        <a href="{{ $banner->url }}"><img class="w-100" src="{{ asset($banner->path . '/' . $banner->filename) }}" style="object-fit: contain; max-height: 125px" /></a>
      @endforeach
    </div>
  </div> --}}
</div>
<div class="row mb-3">
  @foreach ($banners as $banner)
    <div class="col-lg-4 col-md-4 col-sm-12 px-2">
      <a href="{{ $banner->url }}">
        <img class="w-100" src="{{ asset($banner->image_url) }}" style="max-height: 150px; object-fit: contain" />
      </a>
    </div>
  @endforeach
</div>
<div class="row mb-3">
  <div class="col-lg-4 col-md-4 col-sm-12 px-2">
    <div class="mb-3">
      <strong class="title fw-bold p-2 text-white" style="font-size: 16px">Giới thiệu</strong>
    </div>
    @foreach ($intros as $intro)
      <div class="post-preview__sm">
        <a href="{{ route('posts.show', $intro->slug) . '?category_id=' . $introCate }}">
          <img class="w-50 mr-2 float-left post-preview__img__sm" src="{{ asset($intro->thumbnail) }}"/>
          <h3 class="mb-1 post-preview__h3__sm">{{ $intro->title }}</h3>
          <span class="post-preview__p">{!! Str::limit(strip_tags($intro->content), $limit = 250, $end = '...') !!}</span>
        </a>
      </div>
    @endforeach
    <div class="mb-3" style="margin-top: 25px">
      <strong class="title fw-bold p-2 text-white" style="font-size: 16px">Đội ngũ và hoạt động</strong>
    </div>
    <div class="list-group list-group-flush" style="font-size: 12px; margin-bottom: 20px">
      @foreach ($teams as $team)
        <a href="{{ route('posts.show', $team->slug) . '?category_id=' . $teamCate }}" class="list-group-item list-group-item-action px-0">
          <div class="row w-100 mx-0">
            <div class="col-2 d-flex flex-column justify-content-center" style="padding-left: 0; padding-right: 10px">
              <strong class="text-center bg-vnu-gray" style="font-size: 15px">{{ $team->created_at->format('d') }}</strong>
              <p class="text-white text-center mb-0 bg-vnu-blue" style="font-size: 10px; text-transform: uppercase">{{ $team->created_at->format('M') }}</p>
            </div>
            <div class="col-10 px-0">{{ $team->title }}</div>
          </div>
        </a>
      @endforeach
    </div>
  </div>
  <div class="col-lg-8 col-md-8 col-sm-12 px-2">
    <div class="mb-3">
      <strong class="title fw-bold p-2 text-white" style="font-size: 16px">Sản phẩm và dịch vụ</strong>
    </div>
    @foreach ($services as $service)
      <div class="row post-preview mr-0">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <a href="{{ route('posts.show', $service->slug) . '?category_id=' . $serviceCate }}">
            <img class="w-100 border-0 post-preview__img" src="{{ asset($service->thumbnail) }}"/>
          </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 post-preview__div">
          <a href="{{ route('posts.show', $service->slug) . '?category_id=' . $serviceCate }}">
            <h3 class="post-preview__h3">{{ $service->title }}</h3>
            <p class="post-preview__p">{!! Str::limit(strip_tags($service->content), $limit = 300, $end = '...') !!}</p>
            <span class="post-preview__span">By {{ $service->user->name }} &nbsp; | &nbsp; {{ $service->category->name }}</span>
          </a>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
