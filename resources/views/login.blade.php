<!doctype html>
<html lang="en">

<head>
    <title>Admin-Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <style>
        .body {
            background-image: url("{{asset('images/bg_login.png')}}");

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .text-sha {
            color: whitesmoke;
            text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
             0px 8px 13px rgba(0,0,0,0.1),
             0px 18px 23px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body class="body">
    <div class="wrapper fadeInDown">
        <div class="container text-center mb-3">
            <h1 class="text-uppercase font-weight-bold text-sha">なにぬね会社</h1>
        </div>
        <div id="formContent">
            <!-- Icon -->
            <div class="fadeIn first" style="margin-top: 20px;">
                <h3 class="font-weight-bold">管理者</h3>
                <h3 class="font-weight-bold">ロクイン</h3>
            </div>

            <!-- Login Form -->
            <form action="{{route('admin.login.post')}}" method="POST">
                @csrf
                @if(Session::has('message'))
                <div class="alert alert-danger">
                    {{ Session::get('message')}}
                </div>
                @endif
                <input type="email" id="login" class="fadeIn second" name="email" placeholder="メールアドレスを入力してください" value="{{old('email')}}">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="パスワードを入力してください" value="{{old('password')}}">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>