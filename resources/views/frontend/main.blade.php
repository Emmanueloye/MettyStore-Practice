<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('frontend/asset/css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/asset/css/owl.theme.default.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/asset/css/styles.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/asset/css/responsive.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
    <!------------- Navigation Menu ------------->
    <div class="page-header">
        @include('frontend.layouts.header')
    </div>
    <!------------End Navigation Menu ----------->

    <div class="home-content">
        @yield('content')

    </div>

    <!--------------- Footer Section ------------>
    <footer class="page-footer">
        @include('frontend.layouts.footer')
    </footer>
    <!------------End Footer Section ------------>

    <script src="{{asset('frontend/asset/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/asset/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/asset/js/custom.js')}}"></script>
    <script src="{{asset('frontend/ajax/addToCart.js')}}"></script>
    <script src="{{asset('frontend/ajax/cart.js')}}"></script>

    <script src="{{asset('frontend/asset/js/product.js')}}"></script>
    <script src="{{asset('frontend/asset/js/script.js')}}"></script>
</body>

</html>