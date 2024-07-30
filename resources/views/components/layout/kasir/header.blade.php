<!--Header Style-->
<style>
    .custom-navbar {
      background-color: #059212;
    }
  
    .custom-navbar .fa,
    .custom-navbar .fas {
      color: #000000;
    }

    .dropdown-item .fas {
      color: #008000;
    }
  
    .dropdown-item:hover {
      background-color: #dcdcdc;
    }
  </style>
  <nav class="main-header navbar navbar-expand navbar-light custom-navbar">
    <!-- Left Navbar Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right Navbar Links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" style="color: font-family: 'Times New Roman', serif;">
          <i class="fas fa-user-alt" style="margin-left: 10px;"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="color: #ffffff; font-family: 'Times New Roman', serif;">
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2" style="color: #008000;"></i> Profil
          </a>
          <a href="#" class="dropdown-item">
            <a class="dropdown-item" href="{{ url('logout') }}" onclick="return confirm('Yakin Akan Keluar Dari Sistem')">Keluar <i class="fas fa-sign-out-alt " style="margin-left: 5px;"></i></a>
          </a>
      </li>
    </ul>
  </nav>