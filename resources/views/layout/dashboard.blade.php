<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }} ">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">

        <!-- My CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <title>Dashboard | @yield('title')</title>
    </head>
    <body class="bg-light">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">SHOPPING HOUSE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="/dashboard">DASHBOARD</a>
                    <a class="nav-item nav-link" href="/dashboard/purchase">PURCHASE HISTORY</a>
                    <a class="nav-item nav-link" href="/dashboard/product">PRODUCT</a>
                    <a class="nav-item nav-link" href="/dashboard/category">CATEGORY</a>
                    <a class="nav-item nav-link" href="/dashboard/size">SIZE</a>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ACCOUNT
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        LOGOUT
                        </a>
                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            @csrf
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </nav>
        <!-- End Navbar -->

        <!-- Content -->
        <section class="mt-5 pt-4 col-12" style="min-height:100vh;">
            <div class="container">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-3">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    @yield('breadcrumb')
                </ol>
            </nav>
            <!-- End Breadcrumb -->

            <!-- Alert -->
            @if($message = Session::get('success'))
            <div class="alert alert-primary" role="alert">
                {{ $message }}
            </div>
            @endif
            <!-- End Alert -->
            
            <!-- Main Content -->
            @yield('content')
            <!-- End Main Content -->

            </div>
        </section>
        <!-- End Content -->

        <!-- Footer -->
        <footer class="bg-secondary shadow-sm">
            <div class="container">
            <div class="row py-3">
                <div class="col-4 pt-2">
                    <span class="text-light">COPYRIGHT 2019 | SHOPPING HOUSE</span> 
                </div>
                <div class="col-8">
                    <div class="text-right text-decoration-none">
                        <h4>
                        <a class="text-light" href=""><i class="fab fa-facebook-square"></i></a>
                        <a class="text-light" href=""><i class="fab fa-instagram"></i></a>
                        <a class="text-light" href=""><i class="fab fa-twitter-square"></i></a>
                        </h4>
                    </div>
                </div>
            </div>
            </div>
        </footer>
        <!-- End Footer -->

        <!-- JavaScript -->
        <!-- JQuery -->
        <script src="{{ asset('jquery/jquery.js') }}"></script>
        <!-- Popper -->
        <script src="{{ asset('popper/popper.js') }}"></script>
        <!-- Bootstrap JS -->
        <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
        <!-- My JS -->
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>