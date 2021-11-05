<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login Boxed | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link href="{{ ('assets/img/favicon.ico') }}" rel="icon" type="image/x-icon" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ ('https://fonts.googleapis.com/css?family=Nunito:400,600,700') }}" rel="stylesheet">
    <link href="{{ ('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ ('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ ('assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="{{ ('assets/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ ('assets/css/forms/switches.cs') }}s" rel="stylesheet" type="text/css" >
    <link href="{{ ('assets/css/elements/alert.css') }}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <script src="{{ ('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js') }}" defer></script>

</head>
<body class="form">
    

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Sign In</h1>
                        <p class="">Log in to your account to continue.</p>
                        
                        <form class="text-left"method="POST" action="{{ route('login') }}">
                            @csrf

                            @if(count($errors) > 0)
                                @foreach( $errors->all() as $message )
                                <div class="alert alert-danger mb-4" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                    <strong>Error!</strong> {{ $message }}</button>
                                </div> 
                                @endforeach
                            @endif

                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <label for="email">Email</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="email" name="email" type="email" class="form-control" placeholder="e.g mail@mail.com">
                                </div>

                                <!-- Password -->
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>
                                        <a href="{{ route('password.request') }}" class="forgot-pass-link">Forgot Password?</a>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </div>

                                 <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                <div class="d-sm-flex justify-content-between mt-3">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Log In</button>
                                    </div>
                                </div>

                                <div class="division">
                                      <span>OR</span>
                                </div>

                                <div class="social">
                                    <a href="{{ url('login/facebook') }}" class="btn social-fb">
                                        <i class="fab fa-facebook-f"></i>
                                        <span class="brand-name">Facebook</span>
                                    </a>
                                   <a href="{{ url('login/google') }}" class="btn social-github">
                                    <i class="fab fa-google"></i>
                                        <span class="brand-name">Google</span>
                                    </a>
                                </div>

                                <p class="signup-link">Not registered ? <a href="{{ route('register') }}">Create an account</a></p>

                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ ('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ ('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ ('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ ('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ ('assets/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ ('assets/js/authentication/form-2.js') }}"></script>
    <script src="{{ ('assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>

</body>
</html>