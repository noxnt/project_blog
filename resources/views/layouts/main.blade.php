<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>lifeleck BLOG || HOME</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/liner_icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/search.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
<!--::header part start::-->
<header class="main_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="/"> <img src="{{ asset('assets/img/logo.png') }}" alt="logo"> </a>

                    <div class="navbar-collapse main-menu-item"
                         id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            @can('manager-admin-access')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.index') }}">Admin</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                    <div class="header_social_icon d-none d-lg-block">
                        <ul>
                            @cannot('auth-user')
                                <li><a href="login" class="d-none d-lg-block">Sign in</a></li>
                                <li><a href="register" class="d-none d-lg-block">Sign up</a></li>
                            @endcannot
                            @can('auth-user')
                                <li>
                                    <form action="logout" method="POST">
                                        @csrf
                                        <input type="submit" class="p-2 badge-warning" value="Log out" style="border: 0;">
                                    </form>
                                </li>
                                <li class="p-2 badge-secondary">{{ Auth::user()->name }}</li>
                            @endcan
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header part end-->

@yield('content')

@include('includes.post.social_images')

<script src="{{ asset('assets/js/jquery-1.12.1.min.js') }}></script>
<!-- popper js -->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}></script>
<!-- custom js -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>

