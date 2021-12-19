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
          <img class="d-block w-100 image-slider" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/1200px-Image_created_with_a_mobile_phone.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 image-slider" src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 image-slider" src="https://jes.edu.vn/wp-content/uploads/2017/10/h%C3%ACnh-%E1%BA%A3nh.jpg" alt="Third slide">
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
    @for ($i = 0; $i < 4; $i++)
      <div style="font-size: 12px">
        <img class="w-50 mr-2" src="{{ asset('images/news2.jpg') }}"  style="float: left; border: 2px solid gray"/>
        <strong>Trường ĐH Kinh tế, ĐHQGHN - Nơi chào đón và nâng bước giảng viên tài năng</strong>
        <p>Trường Đại học Kinh tế, ĐHQGHN thực hiện Chiến lược phát triển đội ngũ nhân sự, chào đón các Tiến sĩ (trong nước, nước ngoài) và các Thạc sĩ tốt nghiệp ĐH nước ngoài trở thành giảng viên - thành viên ...</p>
      </div>
    @endfor
    <nav aria-label="navigation" style="font-size: 12px">
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
    </nav>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12 px-2">
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
                <strong class="text-center" style="background-color: #7a7979; font-size: 15px">23</strong>
                <p class="text-white text-center mb-0" style="background-color: #0d2c6c; font-size: 10px">NOV</p>
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
      <div class="input-group" style="border:1px solid #0d2c6c; border-radius: 0.25rem">
        <input type="text" class="form-control" placeholder="Tìm trong thư viện ĐHQG" style="font-size: 15px">
        <button class="btn btn-outline-primary text-white" type="button" style="background-color:#0d2c6c; border:1px solid #0d2c6c"><i class="bi bi-search"></i></button>
      </div>
    </div>
  </div>
</div>
@endsection
