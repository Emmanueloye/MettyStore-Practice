<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MettyHair - Login</title>
    <link rel="stylesheet" href="{{asset('frontend/asset/css/styles.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/asset/css/responsive.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
    <div class="container form">
        <div class="login-form-main">
            <!-- Session Status -->
            <x-auth-session-status class="reset-msg" :status="session('status')" />

            <div class="form-card">
                <div class="brand-logo footer-logo">
                    <a href="index.html" class="brand">Metty<span>hair</span></a>
                </div>
            </div>
            <form class="login-form" method="POST" action="{{ route('password.email') }}">
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
                <p class="info">Forget your Password? Please enter your email address and we will email you reset password link</p>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-input" id="email" name="email" placeholder="Email Address" />
                </div>

                <input type="submit" value="Email Password Reset Link" class="btn btn-login" />
            </form>
        </div>
    </div>
</body>

</html>