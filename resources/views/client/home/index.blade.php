@extends('client.layouts.main')
@section('title', 'SIS')
@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}">
    <style>
        .image-slider {
            height: 300px;
            object-fit: cover
        }
        #carouselSlider ol li {
            width: 7px;
            height: 7px;
            border-radius: 100%;
        }
    </style>
@endsection
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
        <div id="carouselSlider" class="carousel slide" data-ride="carousel">
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
</div>
@endsection
