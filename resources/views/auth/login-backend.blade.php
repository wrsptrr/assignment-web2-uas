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

        <title>Backend | Login</title>
    </head>
    <body class="bg-light">
         <!-- Alert -->
         @if($message = Session::get('failed'))
        <div class="alert alert-danger fixed-top" role="alert">
            {{ $message }}
        </div>
        @endif
        <!-- End Alert -->
        <div class="container col-12 pt-5">

            <div class="bg-white col-4 mx-auto mt-5 p-5 shadow-sm">
                <div>
                    <h3 class="font-weight-light text-center text-uppercase"><strong>Shopping <span class="text-main">House</span><strong></h3>
                    <h6 class="font-weight-light text-center text-uppercase" style="letter-spacing:7pt">Backend Login</h6>    
                </div>
                
                <form action="/backend/login/process" method="POST" class="mx-auto col-11 mt-4">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group">
                        <button class="btn btn-main col-12">LOGIN</button>
                    </div>
                </form>
            </div>

        </div>

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