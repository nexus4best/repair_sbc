
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>แจ้งซ่อมสาขา</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="./img/technical-support.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">แจ้งซ่อมสาขา</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/customer-support.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }} [<span style="color:red">{{ Auth::user()->id }}</span>]</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Dashboard   -->
          <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>หน้าหลัก</p>
            </router-link>
          </li>
          <!-- แจ้งซ่อม -->
          {{-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog pink"></i>
              <p>
                แจ้งซ่อม
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-desktop blue"></i>
                  <p>
                    แจ้งซ่อม CTS
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-print yellow"></i>
                  <p>แจ้งซ่อม Ricoh</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-laptop green"></i>
                  <p>แจ้งซ่อม IT</p>
                </a>
              </li>   
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon  fas fa-undo"></i>
                  <p>รายการรับของ</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-redo"></i>
                  <p>รายการส่งของ</p>
                </a>
              </li>   
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>รายงานส่งของ</p>
                </a>
              </li>                                                    
            </ul>
          </li> --}}

          <!-- Admin -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-adn pink"></i>
              <p>
              Admin
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/user" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Users</p>
                </router-link>
              </li>              
              <li class="nav-item">
                <router-link to="/area" class="nav-link">
                  <i class="nav-icon fas fa-diagnoses"></i>
                  <p>ผู้จัดการเขต</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/cts" class="nav-link">
                  <i class="nav-icon fas fa-user-secret"></i>
                  <p>CTS</p>
                </router-link>
              </li>
              {{-- <li class="nav-item">
                <router-link to="/it" class="nav-link">
                  <i class="nav-icon fas fa-male"></i>
                  <p>IT</p>
                </router-link>
              </li>   --}}
              <li class="nav-item">
                <router-link to="/setup" class="nav-link">
                  <i class="nav-icon fas fa-male"></i>
                  <p>Setup</p>
                </router-link>
              </li>             
            </ul>
          </li>  

          <!-- สรรพากร -->
          <li class="nav-item">
            <router-link to="/revenue" class="nav-link">
              <i class="nav-icon fas fa-search cyan"></i>
              <p>สรรพากร</p>
            </router-link>
          </li>

          <!-- DHL -->
          <li class="nav-item">
            <router-link to="/dhl" class="nav-link">
              <i class="nav-icon fas fa-search cyan"></i>
              <p>DHL</p>
            </router-link>
          </li>          

          <!-- Profile -->
          <li class="nav-item">
            <router-link to="/profile" class="nav-link">
              <i class="nav-icon fas fa-user teal"></i>
              <p>Profile</p>
            </router-link>
          </li>

          <!-- logout -->
          <li class="nav-item">
            <a href="{{ route('logout') }}" 
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"
              class="nav-link">
              <i class="nav-icon fas fa-power-off red"></i>
              <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>            
          </li>           

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <div class="content">
      <div class="content-fluid">
        <router-view></router-view>
      </div>
    </div>
  </div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>

<script src="/js/app.js"></script>
</body>
</html>
