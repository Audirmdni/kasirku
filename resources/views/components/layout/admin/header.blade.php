<!DOCTYPE html>
<html lang="en">

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

    .custom-navbar .fa,
    .custom-navbar .fas {
      color: #000000;
    }

    .dropdown-item .fas {
      color: #008000;
    }
  </style>
</head>

<body>
  <nav class="main-header navbar navbar-expand-md navbar-light custom-navbar sticky-top">
    <!-- Left Navbar Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right Navbar Links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;">
          <i class="fas fa-user-alt" style="margin-left: 10px;"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <!-- Dropdown menu links -->
          <a class="dropdown-item" href="#">Profil <i class="fas fa-user-circle" style="margin-left: 5px;"></i></a>
          <a class="dropdown-item" href="{{ url('logout') }}" onclick="return confirm('Yakin Akan Keluar Dari Sistem')">Keluar <i class="fas fa-sign-out-alt" style="margin-left: 5px;"></i></a>
        </div>
      </li>
    </ul>
  </nav>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>