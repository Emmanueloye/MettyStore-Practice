<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MettyHair - Register</title>
    <link rel="stylesheet" href="{{asset('frontend/asset/css/styles.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/asset/css/responsive.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
    <div class="container form">
        <div class="login-form-main">
            <div class="form-card">
                <div class="brand-logo footer-logo">
                    <a href="index.html" class="brand">Metty<span>hair</span></a>
                </div>
            </div>
            <form class="register-form" method="POST" action="{{ route('register') }}">
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
                <div class="form-group">
                    <input type="text" class="form-input" id="name" name="name" placeholder="Full Name*" />
                </div>
                <div class="form-group">
                    <input type="email" class="form-input" id="email" name="email" placeholder="Email Address*" />
                </div>
                <div class="form-group">
                    <input type="password" class="form-input" id="password" name="password" placeholder="Password*" />
                </div>
                <div class="form-group">
                    <input type="password" class="form-input" id="confirm-password" name="password_confirmation" placeholder="Confirm Password*" />
                </div>
                <div class="login-action">
                    <a href="{{ route('login') }}">Already have account? Login here</a>
                </div>
                <input type="submit" value="Register" class="btn btn-login" />
            </form>
        </div>
    </div>
</body>

</html>