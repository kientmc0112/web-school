@extends('client.layouts.main')
@section('title', 'SIS')
@section('content')
@section('css')
  <link rel="stylesheet" href="{{ asset('OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}">
  <style>
    .image-slider {
      height: 300px;
      object-fit: cover;
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
<div class="row mb-3">
  <div class="col-lg-9 col-md-9 col-sm-12 d-flex align-items-center justify-content-center px-2">
    <div id="carouselSlider" class="carousel slide" data-ride="carousel" style="width: 720px; height: 300px">
      <ol class="carousel-indicators">
        <li data-target="#carouselSlider" data-slide-to="0" class="active"></li>
        <li data-target="#carouselSlider" data-slide-to="1"></li>
        <li data-target="#carouselSlider" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        @foreach ($sliders as $key => $slide)
          @if ($key == 1)
            <div class="carousel-item active">
          @else
            <div class="carousel-item">
          @endif
            <img class="d-block image-slider" src="{{ asset($slide->path . '/' . $slide->filename) }}" alt="First slide" style="width: 720px; height: 300px; object-fit: contain">
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
  <div class="col-lg-3 col-md-3 col-sm-12 px-2">
    <div class="list-group list-group-flush" style="font-size: 13px">
      <a href="{{ route('categories.show', 4) . "?child_id=22" }}" class="list-group-item list-group-item-action py-2"><i class="bi bi-caret-right-fill"></i> Tin tức về ĐHQGHN</a>
      <a href="{{ route('categories.show', 1) . "?child_id=12" }}" class="list-group-item list-group-item-action py-2"><i class="bi bi-caret-right-fill"></i> Chuyên gia từ các khoa học liên ngành</a>
      <a href="{{ route('categories.show', 4) . "?child_id=25" }}" class="list-group-item list-group-item-action py-2 border-bottom-0"><i class="bi bi-caret-right-fill"></i> Báo chí nói gì về khoa học liên ngành</a>
      @foreach ($topBanners as $banner)
        <a href="#"><img class="w-100" src="{{ asset($banner->path . '/' . $banner->filename) }}" style="object-fit: contain; height: 125px" /></a>
      @endforeach
    </div>
  </div>
</div>
<div class="row mb-3">
  @foreach ($botBanners as $banner)
    <div class="col-lg-4 col-md-4 col-sm-12 px-2">
      <img class="w-100" src="{{ asset($banner->path . '/' . $banner->filename) }}" style="height: 150px; object-fit: contain" />
    </div>
  @endforeach
</div>
<div class="row mb-3">
  <div class="col-lg-4 col-md-4 col-sm-12 px-2">
    <div class="mb-3">
      <strong class="title fw-bold p-2 text-white" style="font-size: 16px">Tin tức</strong>
    </div>
    @foreach ($news as $new)
      <div class="post-preview__sm">
        <a href="{{ route('categories.show', $newCate) . '?post_id=' . $new->id }}">
          <img class="w-50 mr-2 float-left post-preview__img__sm" src="{{ asset($new->thumbnail_url) }}"/>
          <h3 class="mb-1 post-preview__h3__sm">{{ $new->title }}</h3>
          <span class="post-preview__p">{!! Str::limit(strip_tags($new->content), $limit = 250, $end = '...') !!}</span>
        </a>
      </div>
    @endforeach
    {{-- <nav aria-label="navigation" style="font-size: 12px">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link text-secondary" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link text-secondary" href="#">1</a></li>
        <li class="page-item"><a class="page-link text-secondary" href="#">2</a></li>
        <li class="page-item"><a class="page-link text-secondary" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link text-secondary" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav> --}}
  </div>
  <div class="col-lg-8 col-md-8 col-sm-12 px-2">
    <div class="mb-3">
      <strong class="title fw-bold p-2 text-white" style="font-size: 16px">Tuyển sinh</strong>
    </div>
    @foreach ($edus as $edu)
      <div class="row post-preview mr-0">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <a href="{{ route('categories.show', $eduCate) . '?post_id=' . $edu->id }}">
            <img class="w-100 border-0 post-preview__img" src="{{ asset($edu->thumbnail_url) }}"/>
          </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 post-preview__div">
          <a href="{{ route('categories.show', $eduCate) . '?post_id=' . $edu->id }}">
            <h3 class="post-preview__h3">{{ $edu->title }}</h3>
            <p class="post-preview__p">{!! Str::limit(strip_tags($edu->content), $limit = 300, $end = '...') !!}</p>
            <span class="post-preview__span">By {{ $edu->user->name }} &nbsp; | &nbsp; {{ $edu->category->name }}</span>
          </a>
        </div>
      </div>
    @endforeach
  </div>
  {{-- <div class="col-lg-4 col-md-4 col-sm-12 px-2">
    <div class="mb-3">
      <div class="mb-3">
        <strong class="title fw-bold p-2 text-white" style="font-size: 16px">Thông báo</strong>
      </div>
      <div class="list-group list-group-flush" style="font-size: 12px">
        @for ($i = 0; $i < 10; $i++)
          <a href="#" class="list-group-item list-group-item-action py-2 px-0"><i class="bi bi-caret-right-fill"></i> Thông báo: Về việc thực hiện thu tiền bảo hiểm y tế (BHYT) sinh viên năm 2022 (đợt tháng 01/2022)</a>
        @endfor
      </div>
    </div>
    <div class="mb-3">
      <div class="mb-3">
        <strong class="title fw-bold p-2 text-white" style="font-size: 16px">Sắp diễn ra</strong>
      </div>
      <div class="list-group list-group-flush" style="font-size: 12px">
        @for ($i = 0; $i < 3; $i++)
          <a href="#" class="list-group-item list-group-item-action px-0">
            <div class="row">
              <div class="col-2 pr-1 d-flex flex-column justify-content-center">
                <strong class="text-center bg-vnu-gray" style="font-size: 15px">23</strong>
                <p class="text-white text-center mb-0 bg-vnu-blue" style="font-size: 10px">NOV</p>
              </div>
              <div class="col-10 px-0">
                UEB JOB FAIR 2021 – Ngày hội tuyển dụng việc làm lớn nhất UEB năm nay có gì khác biệt? 
              </div>
            </div>
          </a>
        @endfor
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12 px-2">
    <div class="mb-3">
      <div class="mb-3">
        <strong class="title fw-bold p-2 text-white" style="font-size: 16px">Tuyển sinh đại học</strong>
      </div>
      <div class="list-group list-group-flush" style="font-size: 12px">
        @for ($i = 0; $i < 5; $i++)
          <a href="#" class="list-group-item list-group-item-action py-2 px-0"><i class="bi bi-caret-right-fill"></i> Những điều cần biết về chương trình đào tạo đại học chất lượng cao - Trường Đại học Kinh tế - ĐHQGHN</a>
        @endfor
      </div>
    </div>
    <div class="mb-3">
      <div class="mb-3">
        <strong class="title fw-bold p-2 text-white" style="font-size: 16px">Tuyển sinh sau đại học</strong>
      </div>
      <div class="list-group list-group-flush" style="font-size: 12px">
        @for ($i = 0; $i < 5; $i++)
          <a href="#" class="list-group-item list-group-item-action py-2 px-0"><i class="bi bi-caret-right-fill"></i> Phương án tổ chức tuyển sinh sau đại học Đợt 2 năm 2021 theo hình thức trực tuyến</a>
        @endfor
      </div>
    </div>
    <div class="mb-3">
      <div class="input-group" style="border-radius: 0.25rem">
        <input type="text" class="form-control" placeholder="Tìm trong thư viện ĐHQG" style="font-size: 15px">
        <button class="btn btn-outline-primary text-white bg-vnu-blue" type="button" style="border:1px solid #0d2c6c"><i class="bi bi-search"></i></button>
      </div>
    </div>
  </div> --}}
</div>
@endsection
