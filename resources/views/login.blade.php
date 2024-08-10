<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>LOGIN | KASIRKU</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Login Form, Responsive Web Template, Bootstrap Web Templates, Flat Web Templates">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{url('public')}}/admin-asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link href="{{url('public')}}/admin-asset/css_login/style.css" rel='stylesheet' type='text/css' />
    <!-- Google Fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <style>

        .error{
          
            display: flex;
            align-items: center;
            align-self: center;
            justify-content: center;
        }
        .alert{

            background-color: red;
            width: 32%;
           padding: 1rem;
            color: white;
              font-size: 18px;
              font-weight: bold;
              border-radius: 0.5rem ;

        }
    </style>
</head>

<body>
    <!-- Logo -->
    <img src="{{ url('public/admin-asset/dist/img/Kasir.png') }}" alt="Logo Kasirku" class="login-logo">
    <h1>KASIRKU</h1>
    @if ($errors->any())
    <div class="error">
        <div class="alert "  id="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    </div>
@endif
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