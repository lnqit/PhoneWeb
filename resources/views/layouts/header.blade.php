<ul class="navbar-nav bg-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="https://laravel.com/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
            @if (Auth::check())
                  <form class="float-right" id="logout-form" action="{{ url('logout') }}" method="POST">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger">Logout</button>
                  </form>
                  <form class="float-right mt-2 mr-3">
                    {{Auth::user()->name}}
                  </form>
                @endif
        <div class="sidebar-brand-text mx-3">Laravel</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href=""> 
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>City</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href=""> 
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Brands</span></a>
      </li>
  
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href=""> 
          <i class="fas fa-fw fa-table"></i>
          <span>Category</span></a>
      </li>
    
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href=""> 
          <i class="fas fa-fw fa-table"></i>
          <span>Color</span></a>
      </li>


      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Tables -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>