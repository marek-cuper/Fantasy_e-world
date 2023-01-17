<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/web.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            background: url("images/backgPixelSky.jpg")
            no-repeat fixed;
            background-size:cover;
            padding-top: 45px;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="loginnav">
    <a class="navName">Magic e-World</a>
    <div class="login-box">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <input id='emailL' type='email' placeholder='Username' @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" >
            <input id='passwordL' type='password' placeholder='Password' @error('password') is-invalid @enderror name="password" required autocomplete="current-password">
            <button type="submit">
                {{ __('Login') }}
            </button>
            @error('email')
            <p>{{ $message }}</p>
            @enderror
        </form>
    </div>
</div>

<div class="registration">
    <div class="row">
        <div class="col">
            <div class="regBox">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <input id="name" type="text" placeholder="Username" @error('name') is-invalid @enderror name="name" value="{{ old('name') }}" required autocomplete="name" >
                        @error('name')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input id="email" type="email" placeholder="Email" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input id="password" type="password" placeholder="Password" @error('password') is-invalid @enderror name="password" required autocomplete="new-password">
                        @error('password')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input id="password-confirm" type="password" placeholder="Repeat Password" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class>
                        Show password<input class="checkbox" type="checkbox" onclick="checkBoxfunc()">
                    </div>
                    <div>
                        <button type="submit">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function checkBoxfunc() {
        var x = document.getElementById("password");
        var y = document.getElementById("password-confirm");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
</script>

</body>
</html>
