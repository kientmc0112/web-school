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
<div class="d-flex align-items-center justify-content-center">
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
{{-- <div class="row mb-3">
  @foreach ($banners as $banner)
    <div class="col-lg-4 col-md-4 col-sm-12 px-2">
      <a href="{{ $banner->url }}">
        <img class="w-100" src="{{ asset($banner->image_url) }}" style="max-height: 150px; object-fit: contain" />
      </a>
    </div>
  @endforeach
</div> --}}
{{-- <div class="row mb-3">
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
            <div class="col-2" style="padding-left: 0; padding-right: 10px">
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
</div> --}}
<div class="bg-white" style="padding: 20px 0">
  <div class="introduce container position-relative">
    <div class="d-flex">
      <img src="{{ asset('images/introduce.jpg') }}" class="w-50" style="z-index: 1" />
      <div class="text-white w-50" style="padding: 0 25px; z-index: 1">
        <h1 class="introduce__h1 text-center">GIỚI THIỆU CHUNG</h1>
        <p class="introduce__p"><b>Công ty CP Giáo dục Tâm Phước</b> là đơn vị giáo dục đào tạo chuyên
          nghiệp gửi khát vọng, tâm huyết, trí tuệ vào từng sản phẩm, dịch vụ.
          Chúng tôi cung cấp các chương trình đào tạo tiếng Anh toàn diện, theo
          các chứng chỉ Quốc tế như <b>IELTS</b>, <b>TOEFL</b> v.v., phát triển, tổ chức
          chương trình giáo dục STEM cho trẻ nhỏ, học sinh.
          Bên cạnh đó, chúng tôi cung cấp dịch vụ tư vấn du học, định hướng cho
          du học sinh theo quá trình hoàn hảo từ trước, trong và sau khi du học.
          Ngoài ra Tâm Phước còn là đơn vị cung cấp vật tư, thiết bị giáo dục
          phục vụ nhu cầu giảng dạy, học tập chất lượng cao, uy tín trong khu vực.</p>
        <div class="row bg-white text-dark py-3 w-100 mx-0 introduce__div">
          <div class="col-md-3 col-sm-6 text-center">
            <img src="{{ asset('images/icons/book.png') }}" class="introduce__img" />
            <p class="text-center mt-2">Giảng dạy Tiếng Anh</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center">
            <img src="{{ asset('images/icons/config.png') }}" class="introduce__img" />
            <p class="text-center mt-2">Giảng dạy STEM</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center">
            <img src="{{ asset('images/icons/plane.png') }}" class="introduce__img" />
            <p class="text-center mt-2">Tư vấn Du học</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center">
            <img src="{{ asset('images/icons/pen.png') }}" class="introduce__img" />
            <p class="text-center mt-2">Cung cấp thiết bị giảng dạy</p>
          </div>
        </div>
      </div>
    </div>
    <div class="introduce__shape position-absolute"></div>
  </div>
  <div class="service">
    <div class="container">
      <h1 class="service__title text-center mb-0">DỊCH VỤ CỦA CHÚNG TÔI</h1>
      <div class="row" style="justify-content: space-evenly; margin-top: 100px">
        <div class="col-md-3">
          <div class="position-relative text-center text-white service__div d-flex justify-content-center flex-column">
            <h1 class="mb-2 service__h1">ĐÀO TẠO TIẾNG ANH</h1>
            <p class="service__p">Lứa tuổi 4 - 18</p>
            <img class="position-absolute bg-white service__img" src="{{ asset('images/bk-logo.png') }}" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="position-relative text-center text-white service__div service__dark d-flex justify-content-center flex-column">
            <h1 class="mb-2 service__h1">ĐÀO TẠO STEM</h1>
            <img class="position-absolute bg-white service__img" src="{{ asset('images/bk-logo.png') }}" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="position-relative text-center text-white service__div service__dark d-flex justify-content-center flex-column">
            <h1 class="mb-2 service__h1">TƯ VẤN DU HỌC</h1>
            <img class="position-absolute bg-white service__img" src="{{ asset('images/bk-logo.png') }}" />
          </div>
        </div>
      </div>
      <div class="row" style="justify-content: space-evenly; margin-top: 100px">
        <div class="col-md-3">
          <div class="position-relative text-center text-white service__div d-flex justify-content-center flex-column">
            <h1 class="mb-2 service__h1">ĐÀO TẠO TẬP HUẤN TIẾNG ANH/STEM</h1>
            <p class="service__p">Theo yêu cầu Cơ quan, tổ chức, doanh nghiệp</p>
            <img class="position-absolute bg-white service__img" src="{{ asset('images/bk-logo.png') }}" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="position-relative text-center text-white service__div d-flex justify-content-center flex-column">
            <h1 class="mb-2 service__h1">THI VÀ CẤP CHỨNG CHỈ IELTS</h1>
            <p class="service__p">Đối tác chính thức của Hội đồng Anh (British Council)</p>
            <img class="position-absolute bg-white service__img" src="{{ asset('images/bk-logo.png') }}" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="position-relative text-center text-white service__div service__dark d-flex justify-content-center flex-column">
            <h1 class="mb-2 service__h1">CUNG CẤP VÀ PHÂN PHỐI THIẾT BỊ GIẢNG DẠY</h1>
            <img class="position-absolute bg-white service__img__red" src="{{ asset('images/tp-logo.png') }}" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="core container position-relative">
    <div class="d-flex">
      <img src="{{ asset('images/logo-lg.png') }}" class="core__left" />
      <div class="row core__right">
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <img src="{{ asset('images/icons/hand.png') }}" class="core__img mb-3" />
          <h2 class="text-center mb-3"><b>TRÁCH NHIỆM</b></h2>
          <p class="core__p text-center">Có trách nhiệm với bản thân, gia đình và xã hội</p>
        </div>
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <img src="{{ asset('images/icons/ruler.png') }}" class="core__img mb-3" />
          <h2 class="text-center mb-3"><b>CHUẨN MỰC</b></h2>
          <p class="core__p text-center">Luôn tuân theo những chuẩn mực để phù hợp với yêu cầu đào tạo</p>
        </div>
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <img src="{{ asset('images/icons/like.png') }}" class="core__img mb-3" />
          <h2 class="text-center mb-3"><b>CHẤT LƯỢNG</b></h2>
          <p class="core__p text-center">Mọi khóa học đều được đào tạo với chất lượng quốc tế</p>
        </div>
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <img src="{{ asset('images/icons/heart.png') }}" class="core__img mb-3" />
          <h2 class="text-center mb-3"><b>TẬN TÂM</b></h2>
          <p class="core__p text-center">Luôn tận tâm với công việc và quan tâm tới khách hàng</p>
        </div>
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <img src="{{ asset('images/icons/clock.png') }}" class="core__img mb-3" />
          <h2 class="text-center mb-3"><b>TỐC ĐỘ</b></h2>
          <p class="core__p text-center">Xử lý mọi việc trong thời gian nhanh nhất với chất lượng đảm bảo</p>
        </div>
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <img src="{{ asset('images/icons/brain.png') }}" class="core__img mb-3" />
          <h2 class="text-center mb-3"><b>SÁNG TẠO</b></h2>
          <p class="core__p text-center">Luôn đổi mới, học hỏi và tiếp thu để nâng cao chất lượng</p>
        </div>
      </div>
    </div>
    <div class="core__shape position-absolute"></div>
  </div>
</div>
@endsection

<style>
  .introduce {
    padding: 50px 0;
  }
  .introduce__shape {
    width: 70%;
    background-color: #f53b57;
    top: 0;
    right: 0;
    bottom: 0;
  }
  .introduce__h1 {
    font-size: 40px;
    font-weight: bold;
    margin-bottom: 40px;
  }
  .introduce__p {
    font-size: 20px;
  }
  .introduce__div {
    border-radius: 5px;
    font-size: 15px;
    margin-top: 20px;
  }
  .introduce__img {
    width: 50px;
    height: 50px;
    border-radius: 5px;
    background-color: #f53b57;
    padding: 7px;
  }
  .service {
    padding: 40px 0;
    margin-top: 20px;
    background-position: center;
    background-image: url({{url('images/service-bg.png')}});
  }
  .service__title {
    font-size: 40px;
    font-weight: bold;
    margin-bottom: 40px;
    color: #f53b57;
  }
  .service__div {
    padding: 20px;
    border-radius: 10px;
    height: 100%;
    background-color: #f53b57;
  }
  .service__h1 {
    font-size: 35px;
    font-weight: bold;
    margin-bottom: 40px;
  }
  .service__p {
    font-size: 20px;
  }
  .service__img {
    top: -40px;
    right: -40px;
    width: 80px;
    border-radius: 5px;
    padding: 10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
  .service__img__red {
    top: -40px;
    right: -40px;
    width: 80px;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
  .service__dark {
    background-color: #3b3838 !important;
  }
  .core {
    padding: 50px 0;
    margin-top: 20px;
  }
  .core__left {
    width: 30%;
    z-index: 1;
    margin-left: 50px;
  }
  .core__right {
    width: 70%;
    font-size: 15px;
  }
  .core__img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background-color: #f53b57;
    padding: 7px;
  }
  .core__shape {
    width: 15%;
    background-color: #f53b57;
    top: 0;
    left: 0;
    bottom: 0;
  }
  .core__p {
    font-size: 15px;
  }
</style>
