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
             <a href="{{ route('user.list') }}"><i class="fa fa-user fa-fw"></i> Users</a>
          </li>
          <li>
            <a href="{{ route('department.list') }}"><i class="fa fa-group fa-fw"></i> Departments</a>
         </li>
       </ul>
    </div>
 </div>