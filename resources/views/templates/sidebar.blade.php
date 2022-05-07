<div class="wrapper">

<!-- Preloader -->
<!-- <div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div> -->

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">    
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <!-- <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li> -->
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    
     <ul>
       <li> 
         <form method="POST" id="logout-form" action="{{ route('logout') }}">
         {{Auth::user()->first_name}} <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
            </a>
            @csrf  
          </form> 
        </li>
     </ul>
   
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="/dist/img/logo.png" alt="Swimming Gala" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Swimming Gala</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->first_name}} {{Auth::user()->last_name}}<br/>
        {{ showUserType('users', Auth::user()->id) }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas  "></i>
            </p>
          </a>
        </li>
        <li class="nav-item {{ request()->is('users/*') ? 'menu-open' : '' }} ?>">
          <a href="#" class="nav-link  {{ request()->is('users/*') ? 'active' : '' }} ">
          <i class="nav-icon  fa-solid fa-person"></i>
            <p>
              Users
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">{{countAllUsers()}}</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('/')}}/users/view-users" class="nav-link {{ request()->is('users/view-users') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Users</p>
              </a>
            </li>
            @if(Auth::user()->user_type == 'Administrator')
            <li class="nav-item">
              <a href="{{url('/')}}/users/add-user" class="nav-link {{ request()->is('users/add-user') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add User</p>
              </a>
            </li>
            @endif
          </ul>
        </li>
        
        <li class="nav-item {{ request()->is('swimmers/*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('view-swimmers') ? 'active' : '' }}">
          <i class="nav-icon  fa-solid fa-person-swimming"></i>
            <p>
              Swimmers
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">{{countUsers('Swimmer')}}</span>
            </p>
          </a>
          <ul class="nav nav-treeview ">
            <li class="nav-item {{ request()->is('swimmers/*') ? 'active' : '' }}">
              <a href="{{url('/')}}/swimmers/view-swimmers" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Swimmers</p>
              </a>
            </li>
            
          </ul>
        </li>
        <li class="nav-item {{ request()->is('parents/*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link">
             <i class="nav-icon  fa-solid fa-user-gear"></i>
            <p>
              Parents
              <i class="fas fa-angle-left right"></i>
            
              <span class="badge badge-info right">{{countUsers('Parent')}}</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item {{ request()->is('parents/*') ? 'active' : '' }}">
              <a href="{{url('/')}}/parents/view-parents" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Parents</p>
              </a>
            </li> 
          </ul>
        </li>
        <li class="nav-item {{ (request()->is('coaches/*')) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link">
          <i class="nav-icon fa-solid fa-user-tie"></i>
            <p>
              Coaches
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">{{countUsers('Coach')}}</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item {{ (request()->is('coaches/*')) ? 'active' : '' }}">
              <a href="{{url('/')}}/coaches/view-coaches" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Coaches</p>
              </a>
            </li>
             
          </ul>
        </li>
        
        <li class="nav-item {{ request()->is('races/*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link">
          <i class="nav-icon fa-solid fa-medal"></i>
            <p>
              Race
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">{{countRaces()}}</span>
              
            </p>
          </a>
          <ul class="nav nav-treeview">
          @if(Auth::user()->user_type == 'Administrator')
          <li class="nav-item">
              <a href="{{url('/')}}/races/add-race" class="nav-link {{ request()->is('races/add-race') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Race </p>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a href="{{url('/')}}/races/view-races" class="nav-link {{ request()->is('races/view-races') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Race</p>
              </a>
            </li>
             
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


