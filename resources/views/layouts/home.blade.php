<!DOCTYPE html>
<html lang="zxx">

    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
        <meta name="author" content="Yusuf Küçükgökgözoğlu">
        <link rel="icon" type="image/x-icon" href="@yield('icon')">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Fashi | Template</title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

        <!-- Css Styles -->
        <link rel="stylesheet" href="{{asset('assets')}}/home/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="{{asset('assets')}}/home/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="{{asset('assets')}}/home/css/themify-icons.css" type="text/css">
        <link rel="stylesheet" href="{{asset('assets')}}/home/css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="{{asset('assets')}}/home/css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="{{asset('assets')}}/home/css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="{{asset('assets')}}/home/css/jquery-ui.min.css" type="text/css">
        <link rel="stylesheet" href="{{asset('assets')}}/home/css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="{{asset('assets')}}/home/css/style.css" type="text/css">

        @yield('css')
        @yield('js')
    </head>
    <body>
        <div id="preloder">
            <div class="loader"></div>
        </div>
        <div class="wrapper">
            @include('home.elements._header')
            @yield('content')
            @include('home.elements._footer')
            @yield('footer')
    </body>
</html>