
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Iniciar sesion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{asset('assets/login/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
                    <center><h3 class ="text-white">La mejor herramienta para divertirse aprendiendo</h3></center>

            @if ($errors->has('email'))
                        <div class="alert alert-danger" role="alert">
                            <i class="fa fa-window-close" aria-hidden=true></i>
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                 @endif
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <span class="login100-form-title">
                        <h1 style="color:#AB2DD5 ; margin-right: 10px;">LOBED</h1>
                    </span>
                    <img src="{{asset('assets/imagenes/lobo.png')}}" alt="Responsive image" class="img-fluid" width="430" height="390">
                    {{-- <img src="{{ asset('assets/imagenes/MANADA.svg')}}" alt="" width="250" height="180px"> --}}
                    {{-- <img src="{{asset('assets/login/images/img-01.png')}}" alt="IMG"> --}}
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <span class="login100-form-title">
                        Ingresa tu correo y tu contraseña
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input class="input100" type="text" name="email" placeholder="Email" id="email" value="{{ old('email') }}">
                        
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required" {{ $errors->has('password') ? ' has-error' : '' }}>
                        <input class="input100" type="password" name="password" placeholder="Password" required id="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Iniciar sesión
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
<!--===============================================================================================-->  
    <script src="{{asset('assets/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('assets/login/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('assets/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('assets/login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('assets/login/vendor/tilt/tilt.jquery.min.js')}}"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>

