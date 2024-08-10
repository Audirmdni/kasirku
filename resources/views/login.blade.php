<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>LOGIN | KASIRKU</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Login Form, Responsive Web Template, Bootstrap Web Templates, Flat Web Templates">
    <!-- Stylesheets -->
    <link href="{{url('public')}}/admin-asset/css_login/style.css" rel='stylesheet' type='text/css' />
    <!-- Google Fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{url('public')}}/admin-asset/index2.html"><b>KASIR</b>KU</a>
        </div>
        <!-- /.login-logo -->

        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Login</p>

                <form action="{{ url('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="*******************">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-4">
                            <button class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


            </div>
            <div class="agile-field-txt">
                <input type="password" name="password" placeholder="Password" required id="myInput" />
                <div class="agile_label">
                    <input id="check3" name="check3" type="checkbox" value="show password">
                    <label class="check" for="check3">Remember me</label>
                </div>
            </div>
            <div class="w3ls-bot">
                <input type="submit" value="LOGIN">
            </div>
        </form>
        <!-- Form ends here -->
    </div>
</body>

</html>