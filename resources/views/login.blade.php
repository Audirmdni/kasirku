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

<body>
    <!-- Logo -->
    <img src="{{ url('public/admin-asset/dist/img/Kasir.png') }}" alt="Logo Kasirku" class="login-logo">
    <h1>KASIRKU</h1>
    <div class="w3ls-login box">
        <!-- Form starts here -->
        <form id="loginForm" action="{{ url('login') }}" method="POST">
            @csrf
            <div class="agile-field-txt">
                <input type="text" name="username" placeholder="Username" required />
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