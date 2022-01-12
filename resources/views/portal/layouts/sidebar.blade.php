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
            <a href="{{ route('categories.index') }}"><i class="fa fa-th-list fa-fw"></i> {{ trans('messages.category.name') }}<span
                  class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
               <li>
                  <a href="{{ route('categories.create') }}">{{ trans('messages.category.label.create') }}</a>
               </li>
               <li>
                  <a href="{{ route('categories.index') }}">{{ trans('messages.category.label.list') }}</a>
               </li>
            </ul>
         </li>
         <li>
            <a href="#"><i class="fa fa-book fa-fw"></i> {{ trans('messages.post.name') }}<span class="fa arrow"></span></a>
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
            <a href="{{ route('user.list') }}"><i class="fa fa-user fa-fw"></i> {{ trans('messages.user.name') }}</a>
         </li>
         <li>
            <a href="{{ route('department.list') }}"><i class="fa fa-group fa-fw"></i> {{ trans('messages.departments.name') }}</a>
         </li>
         <li>
            <a href="#"><i class="fa fa-image fa-fw"></i> {{ trans('messages.gallery.name') }}<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
               <li>
                  <a href="{{ route('galleries.create') }}">{{ trans('messages.gallery.label.create') }}</a>
               </li>
               <li>
                  <a href="{{ route('galleries.index') }}">{{ trans('messages.gallery.label.list') }}</a>
               </li>
            </ul>
         </li>
      </ul>
   </div>
</div>