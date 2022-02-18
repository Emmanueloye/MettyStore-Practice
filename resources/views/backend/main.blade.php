<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="{{asset('backend/css/styles.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/responsive.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/pluggins/tagger-master/tagger.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/datatables.min.css')}}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
    <div class="page-wrapper">
        <!----------------- Side Bar ------------------------------>
        <aside class="side-bar">
            @include('backend.layouts.sidebar')
        </aside>
        <!----------------- End Side Bar -------------------------->
        <div class="main-content">
            <!--------------------- Page header-------------------------->
            <div class="page-header">
                <!-- Top navigation -->
                @include('backend.layouts.header')
            </div>
            <!--------------------- End Page header---------------------->
            <!--------------------- Dashboard Main---------------------->
            <div class="inner-content">
                @yield('admin')
            </div>
        </div>
    </div>

    <!-- Plugins-------------->

    <script src="{{asset('backend/pluggins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('backend/pluggins/tagger-master/tagger.js')}}"></script>
    <script src="{{asset('backend/js/datatables.min.js')}}"></script>
    <script src="{{asset('backend/js/custom.js')}}"></script>
    <script src="{{asset('backend/js/editor.js')}}"></script>

    <!-- Page Scripts-------- -->
    <script src="{{asset('backend/js/products.js')}}"></script>
    <script src="{{asset('backend/js/script.js')}}"></script>
</body>

</html>