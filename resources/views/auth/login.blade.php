<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LOGIN | KASIRKU</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public') }}/admin-asset/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('public') }}/admin-asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public') }}/admin-asset/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo text-center">
            <a href="{{ url('public') }}/admin-asset/index2.html"><b style="color: #008000; font-weight: bold;">Kasir</b><span style="font-weight: bold; color: black;">Ku</span></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg" style="font-weight: bold; color: black; font-size: 25px;">LOGIN AKUN</p>
                <p class="login-box-msg info-msg text-center"><strong>Belum punya akun?</strong> <a href="/register" style="color: #008000; font-weight: bold;">Daftar disini</a></p>
                <form action="{{ url('public') }}/admin-asset/index3.html" method="post">
                    <div class="input-group mb-3">
                        <select class="form-control" name="role">
                            <option value="admin">OWNER</option>
                            <option value="kasir">KASIR</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block">MASUK</button>
                        </div>
                    </div>
                </form>
                <p class="mb-1 mt-3 text-right">
                    <a href="forgot-password.html" style="color: #008000; font-weight: bold;">Lupa password?</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ url('public') }}/admin-asset/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('public') }}/admin-asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('public') }}/admin-asset/dist/js/adminlte.min.js"></script>

</body>

</html>