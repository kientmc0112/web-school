<div class="navbar-default sidebar" role="navigation">
   <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">
         {{-- <li class="sidebar-search">
            <div class="input-group custom-search-form">
               <input type="text" class="form-control" placeholder="Search...">
               <span class="input-group-btn">
                  <button class="btn btn-default" type="button">
                     <i class="fa fa-search"></i>
                  </button>
               </span>
            </div>
         </li> --}}
         <li>
            <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
         </li>
         <li>
            <a href="{{ route('categories.index') }}"><i class="fa fa-th-list fa-fw"></i> Danh mục<span
                  class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
               <li>
                  <a href="{{ route('categories.create') }}">Tạo mới</a>
               </li>
               <li>
                  <a href="{{ route('categories.index') }}">Danh sách</a>
               </li>
            </ul>
         </li>
         <li>
            <a href="#"><i class="fa fa-book fa-fw"></i> {{ trans('messages.post.name') }}<span
                  class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
               <li>
                  <a href="{{ route('posts.create') }}">{{ trans('messages.post.label.create') }}</a>
               </li>
               <li>
                  <a href="{{ route('posts.index') }}">{{ trans('messages.post.label.list') }}</a>
               </li>
            </ul>
         </li>
         <li>
            <a href="#"><i class="fa fa-wechat fa-fw"></i> Liên hệ<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
               <li>
                  <a href="{{ route('contacts.index') . '?status=0' }}">Mới</a>
               </li>
               <li>
                  <a href="{{ route('contacts.index')  . '?status=1'}}">Đang xử lí</a>
               </li>
               <li>
                  <a href="{{ route('contacts.index')  . '?status=2'}}">Hoàn thành</a>
               </li>
            </ul>
         </li>
         <li>
            <a href="#"><i class="fa fa-user fa-fw"></i> Quản trị viên<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
               <li>
                  <a href="{{ route('users.create') }}">Tạo mới</a>
               </li>
               <li>
                  <a href="{{ route('users.index') }}">Danh sách</a>
               </li>
            </ul>
         </li>
      </ul>
   </div>
</div>