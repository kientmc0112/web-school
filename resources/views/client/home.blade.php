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
  <div class="col-lg-9 col-md-9 col-sm-12 d-flex align-items-center px-2">
    <div id="carouselSlider" class="carousel slide w-100" data-ride="carousel">
      <ol class="carousel-indicators">
          <li data-target="#carouselSlider" data-slide-to="0" class="active"></li>
          <li data-target="#carouselSlider" data-slide-to="1"></li>
          <li data-target="#carouselSlider" data-slide-to="2"></li>
        </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100 image-slider" src="{{ asset('images/banner1.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 image-slider" src="{{ asset('images/banner2.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 image-slider" src="{{ asset('images/banner3.jpg') }}" alt="Third slide">
        </div>
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
    <div class="list-group list-group-flush" style="font-size: 14px">
      <a href="#" class="list-group-item list-group-item-action py-2"><i class="bi bi-caret-right-fill"></i> Tin tức ĐHQGHN</a>
      <a href="#" class="list-group-item list-group-item-action py-2"><i class="bi bi-caret-right-fill"></i> Tạp chí Kinh tế và Kinh doanh</a>
      <a href="#" class="list-group-item list-group-item-action py-2"><i class="bi bi-caret-right-fill"></i> Cổng thông tin cán bộ</a>
      <a href="#" class="list-group-item list-group-item-action py-2"><i class="bi bi-caret-right-fill"></i> Cổng thông tin người học</a>
      <a href="#"><img class="w-100" src="{{ asset('images/news.jpg') }}" /></a>
      <a href="#"><img class="w-100" src="{{ asset('images/news.jpg') }}" /></a>
    </div>
  </div>
</div>
<div class="row mb-3">
  <div class="col-lg-4 col-md-4 col-sm-12 px-2">
    <img class="w-100" src="{{ asset('images/news1.jpg') }}" style="height: 150px" />
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12 px-2">
    <img class="w-100" src="{{ asset('images/news1.jpg') }}" style="height: 150px" />
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12 px-2">
    <img class="w-100" src="{{ asset('images/news1.jpg') }}" style="height: 150px" />
  </div>
</div>
<div class="row mb-3">
  <div class="col-lg-4 col-md-4 col-sm-12 px-2">
    <div class="mb-3">
      <strong class="title fw-bold p-2 text-white" style="font-size: 16px">Tin tức</strong>
    </div>
    @foreach ($news as $new)
      <div class="mb-2" style="font-size: 12px; min-height: 100px">
        <a href="#">
          <img class="w-50 mr-2" src="{{ asset($new->thumbnail_url) }}"  style="float: left; border: 2px solid gray; width: 150px; height: 100px; object-fit: cover"/>
          <p class="mb-1" style="font-size: 14px; font-weight: bold">{{ $new->title }}</p>
          <p style="color: #666;">Trường Đại học Kinh tế, ĐHQGHN thực hiện Chiến lược phát triển đội ngũ nhân sự, chào đón các Tiến sĩ (trong nước, nước ngoài) và các Thạc sĩ tốt nghiệp ĐH nước ngoài...</p>
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
      <div class="row" style="font-size: 12px; margin-bottom: 20px">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <a href="#">
            <img class="w-100 mr-2 border-0" src="{{ asset($edu->thumbnail_url) }}" style="width: 400px; height: 250px; object-fit: cover"/>
          </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="border-top: 1px solid #eaeaea">
          <a href="#">
            <h3 style="font-size: 20px; padding-top: 17px; font-weight: bold">{{ $edu->title }}</h3>
            <p style="color: #666; margin-top: 25px; margin-bottom: 22px">Căn cứ Hướng dẫn thực hiện công tác tuyển sinh sau đại học năm 2020 của Đại học Quốc gia Hà Nội (ĐHQGHN) tại công văn số 36/HD-ĐHQGHN, ngày 08/01/2020, Khoa Các khoa học liên ngành thông báo tuyển sinh đào tạo trình độ tiến sĩ như sau: </p>
            <p style="color: #666;">By {{ $edu->user->name }} | {{ $edu->category->name }}</p>
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
