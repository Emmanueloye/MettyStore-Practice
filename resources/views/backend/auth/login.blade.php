<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MettyHair - Login</title>
    <link rel="stylesheet" href="{{asset('backend/css/styles.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/responsive.css')}}" />
</head>

<body>
    <div class="container form">
        <div class="login-form-main">
            <div class="form-card">
                <div class="brand-logo">
                    <a href="#" class="brand">Metty<span>hair</span></a>
                </div>
            </div>
            <form action="{{route('admin.sign.in')}}" class="login-form" method="post">
                @csrf
                @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(Session('success'))
                <div class="error">
                    <ul>
                        <li>{{ Session('success') }}</li>
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-input" name="email" placeholder="Email Address" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-input" name="password" placeholder="Password" />
                </div>
                <div class="login-action">
                    <a href="#">Forget Password?</a>
                    <a href="{{route('admin.register')}}">Don't have an account? Create One</a>
                </div>
                <input type="submit" value="Login" class="btn btn-login" />
            </form>
        </div>
    </div>
</body>

</html>