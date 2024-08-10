<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <style>
    .custom-navbar {
      background-color: #059212;
    }

    .navbar-nav .nav-link i {
      color: #FFFFFF;
    }

    .dropdown-menu {
      background-color: #0C0C0C;
      color: #FFFFFF;
    }

    .dropdown-item {
      color: #FFFFFF;
      padding: 10px 20px;
      font-size: 20px;
    }

    .dropdown-item i {
      margin-right: 10px;
    }

    .dropdown-item:hover {
      background-color: #059212;
      color: #FFFFFF;
    }

    .dropdown-item.active,
    .dropdown-item.active i {
      background-color: #0C0C0C;
      color: #FFFFFF;
    }

    .dropdown-item.active:hover {
      background-color: #059212;
    }
  </style>
</head>

<body>
  <nav class="main-header navbar navbar-expand-md navbar-light custom-navbar sticky-top">
    <!-- Tautan Navbar Kanan -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 18px;">
          <i class="fas fa-user-alt" style="margin-left: 10px;"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <!-- Tautan menu dropdown -->
          <a class="dropdown-item" href="#">
            <i class="fas fa-user-circle"></i>
            Profil
          </a>
          <a class="dropdown-item" href="{{ url('logout') }}" onclick="return confirm('Yakin Akan Keluar Dari Sistem')">
            <i class="fas fa-sign-out-alt"></i>
            Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>