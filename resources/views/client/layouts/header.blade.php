<div class="header">
  <div class="bg-vnu-blue">
    <div class="container text-right py-2">
      <ul class="mb-0" style="font-size: 11px">
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
        <a href="{{ route('home.index') }}">
          <img style="width: 100%; max-width: 400px; max-height: 150px" alt="" src="{{ asset('images/VNU-SIS-logo(vns).png') }}" />
        </a>
      </div>
      <div class="col-md-6 text-right">
        <div class="mb-3">
          <a href="{{ route('user.change-language', 'en') }}">
            <img alt="" width="30" height="20" src="{{ asset('images/en.jpg') }}" />
          </a>
          <a href="{{ route('user.change-language', 'vi') }}">
            <img alt="" width="30" height="20" src="{{ asset('images/vi.jpg') }}" />
          </a>
        </div>
        <div class="mb-3">
          <ul style="font-size: 12px">
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
    <nav class="navbar navbar-expand-xl navbar-light py-0" style="font-size: 13px">
      <div class="py-1 ml-auto">
        <button class="navbar-toggler bg-white ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex align-items-center justify-content-center w-100">
          @foreach ($categoriesHeader as $category)
            @if (count($category['child']) > 0)
              <li class="nav-item dropdown">
                <strong class="dropdown-toggle text-white">
                  <a href="{{ route('categories.show', $category["id"]) }}" class="d-block px-4 py-3 text-white">
                    {{  Session::get('website_language') == 'en' && isset($category['name_en']) ? $category['name_en'] : $category['name'] }}
                  </a>
                </strong>
                <ul class="dropdown-menu" style="margin-top: -1px">
                  @include('client.layouts.navbar', ['categories' => $category['child'], 'parentId' => $category["id"]])
                </ul>
              </li>
            @else
              <li class="nav-item">
                <strong class="dropdown-toggle text-white">
                  <a href="{{ route('categories.show', $category["id"]) }}" class="d-block px-4 py-3 text-white">
                    {{ Session::get('website_language') == 'en' && isset($category['name_en']) ? $category['name_en'] : $category['name'] }}
                  </a>
                </strong>
              </li>
            @endif
          @endforeach
        </ul>
      </div>
    </nav>
  </div>
</div>
<style type="text/css">
  .header ul li a:hover {
    text-decoration: none;
  }
  .header .dropdown-toggle:after {
    content: none;
  }
  .header .dropdown-menu {
    width: 250px;
    font-size: 13px;
    padding: 0;
  }
  .header .nav-item:hover {
    background-color: #46a5e5;
  }
  .header .dropdown-menu li {
    background-color: #46a5e5;
  }

  .header .dropdown-menu li a {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .header .dropdown-menu li:hover {
    color: var(--text-white);
    background-color: #176ac4;
  }
  .header .dropdown-menu li:hover > a {
    color: white !important;
  }
  .header .dropdown-submenu {
    position: relative;
    background-color: #46a5e5;
  }
  .header .dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
  }
</style>