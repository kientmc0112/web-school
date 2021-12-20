<?php

$navbar = '';
foreach ($categoriesHeader as $key => $category) {
  if ($category["id"] === 1) {
    $url = route('home.index');
  } else {
    $url = route('categories') . "?parent_id=". $category["id"];
  }
  if (count($category['child']) > 0) {
    $navbar .= '<li class="nav-item dropdown"><strong class="dropdown-toggle text-white"><a href="' . $url . '" class="d-block px-5 py-3 text-white">' . $category['name'] . '</a></strong><ul class="dropdown-menu" style="margin-top: -1px">';
    getChild($navbar, $category['child'], $category["id"]);
    $navbar .= '</ul></li>';
  } else {
    $navbar .= '<li class="nav-item"><strong class="dropdown-toggle text-white"><a href="' . $url . '" class="d-block px-5 py-3 text-white">' . $category['name'] . '</a></strong></li>';
  }
}

function getChild(&$navbar, $categories, $parentId)
{
  foreach ($categories as $key => $childCategory) {
    if ($childCategory["id"] === 1) {
      $url = route('home.index');
    } else {
      $url = route('categories') . "?parent_id=". $parentId . "&category_id=". $childCategory["id"];
    }
    if (count($childCategory['child']) > 0) {
      $navbar .= '<li class="dropdown-submenu"><a href="' . $url . '" class="text-white d-block py-2 px-3">' . $childCategory['name'] . '</a><ul class="dropdown-menu">';
      getChild($navbar, $childCategory['child'], $parentId);
      $navbar .= '</ul></li>';
    } 
    else {
      $navbar .= '<li><a href="' . $url . '" class="text-white d-block py-2 px-3">' . $childCategory['name'] . '</a></li>';
    }
  }
}
 
?>
<div class="header">
  <div class="bg-vnu-blue">
    <div class="container text-right py-2">
      <ul class="mb-0" style="list-style-type: none; font-size: 11px">
        <li class="d-inline-block"><a href="" class="text-white">Email</a></li>
        <li class="d-inline-block px-2 text-white">|</li>
        <li class="d-inline-block"><a href="" class="text-white">E-office</a></li>
        <li class="d-inline-block px-2 text-white">|</li>
        <li class="d-inline-block"><a href="" class="text-white">Thư viện ảnh</a></li>
    </ul>
    </div>
  </div>
  <div class="container text-right py-2">
    <div class="row d-flex align-items-center">
      <div class="col-md-6 text-left">
        <img style="width: 100%; max-width: 400px; max-height: 150px" alt="" src="{{ asset('images/VNU-SIS-logo(vns).png') }}" />
      </div>
      <div class="col-md-6 text-right">
        <div class="mb-3">
          <img alt="" width="30" height="20" src="{{ asset('images/en.jpg') }}" />
          <img alt="" width="30" height="20" src="{{ asset('images/vi.jpg') }}" />
        </div>
        <div class="mb-3">
          <ul style="list-style-type: none; font-size: 12px">
            <li class="d-inline-block"><a href="" class="text-dark">Search</a></li>
            <li class="d-inline-block px-2">|</li>
            <li class="d-inline-block"><a href="" class="text-dark">A - Z</a></li>
          </ul>
        </div>
        <div class="input-group ml-auto" style="border-radius: 0.25rem; max-width: 300px">
          <input type="text" class="form-control" placeholder="Từ khóa" style="font-size: 15px">
          <button class="btn btn-outline-primary text-white bg-vnu-blue" type="button" style="border:1px solid #0d2c6c"><i class="bi bi-search"></i></button>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-vnu-blue">
    <nav class="navbar navbar-expand-xl navbar-light py-0" style="font-size: 15px">
      <button class="navbar-toggler bg-white ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex align-items-center justify-content-center w-100">
          {!! $navbar !!}
        </ul>
      </div>
    </nav>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('.dropdown-submenu, .dropdown').hover(function (e) {
      if ($(window).width() >= 1200) {
        $(this).children('ul').toggle();
      }
    });
  });
</script>
<style type="text/css">
  ul li a:hover {
    text-decoration: none;
  }
  .dropdown-toggle:after {
    content: none;
  }
  .dropdown-menu {
    width: 200px;
    font-size: 15px;
    padding: 0;
  }
  .nav-item:hover {
    background-color: #46a5e5;
  }
  .dropdown-menu li {
    background-color: #46a5e5;
  }

  .dropdown-menu li a {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .dropdown-menu li:hover {
    color: var(--text-white);
    background-color: #176ac4;
  }
  .dropdown-menu li:hover > a {
    color: white !important;
  }
  .dropdown-submenu {
    position: relative;
    background-color: #46a5e5;
  }
  .dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
  }
</style>