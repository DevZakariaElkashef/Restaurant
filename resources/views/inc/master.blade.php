<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $res->name }}</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ asset('img/'.$res->logo) }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/apple-touch-icon-114x114.png') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nivo-lightbox/nivo-lightbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nivo-lightbox/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalerts/sweetalert.css') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation
    ==========================================-->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand page-scroll" href="#page-top">{{ $res->name }}</a> </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('home') }}" class="page-scroll">Home</a></li>
                    <li><a href="{{ route('our_menu') }}" class="page-scroll">Menu</a></li>
                    <li><a href="{{ route('our_gallery') }}" class="page-scroll">Gallery</a></li>
                    <li><a href="{{ route('our_chefs') }}" class="page-scroll">Chefs</a></li>
                    <li><a href="{{ route('contact') }}" class="page-scroll">Contact</a></li>
                    @if (Route::has('login'))
                        @auth
                            @can('admins')
                                <li><a href="{{ url('/dashboard') }}" class="page-scroll text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a></li>
                            @endcan

                        <li class="nav-item dropdown user-profile-dropdown">
                            <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="userProfileDropdown">
                                <div class="">
                                    <div class="dropdown-item my-3">
                                        <form method="POST" action="{{ route('logout') }}" class="my-3 p-4">
                                            @csrf
                                            <a href="route('logout')"  onclick="event.preventDefault(); this.closest('form').submit();" class=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>Sign Out</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>


                    @else
                        <li><a href="{{ route('login') }}" class="page-scroll">Log IN</a></li>

                    @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="page-scroll ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                    @endif
                        @endauth
                    @endif

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>

    @yield('content')

    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            <div class="section-title text-center">
                <h2>Contact Form</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <form name="sentMessage" id="send-message" novalidate action="{{ route('contactme') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="name" type="text" id="name" class="form-control" placeholder="Name" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="email" type="email" id="email" class="form-control" placeholder="Email" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <div id="footer">
        <div class="container text-center">
            <div class="col-md-4">
                <h3>Address</h3>
                <div class="contact-item">
                    <p>{{ $res->address }}</p>
                    <p>{{ $res->another_address }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <h3>Opening Hours</h3>
                <div class="contact-item">
                    <p>Mon-Thurs: 10:00 AM - 11:00 PM</p>
                    <p>Fri-Sun: 11:00 AM - 02:00 AM</p>
                </div>
            </div>
            <div class="col-md-4">
                <h3>Contact Info</h3>
                <div class="contact-item">
                    <p>Phone: {{ $res->phone }}
                        @if (!empty($res->another_phone))
                         <br>    
                        {{ $res->another_phone }}
                        @endif
                    </p>

                    <p>Email: {{ $res->email }}</p>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center copyrights">
            <div class="col-md-8 col-md-offset-2">
                <div class="social">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
                <p>&copy; 2016 Touché. All rights reserved. Designed by <a href="http://www.templatewire.com" rel="nofollow">TemplateWire</a></p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/jquery.1.11.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/SmoothScroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/nivo-lightbox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.isotope.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jqBootstrapValidation.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
    <script>
        $('body').ready(function(){
            $('#send-message').submit(function (e) {
                e.preventDefault();
                var addAction = $(this).attr('action');
                var addData = $(this).serialize();
                
                $.ajax({
                    url:addAction,
                    type: "POST",
                    data: addData,
                    success: function (data) {

                        swal({
                            title: data.message,
                            text: "We Will Response Soon",
                            type: 'success',
                            padding: '2em'
                        })
                        
                    },error:function(err){
                        $.each(err.responseJSON.errors,function(key,item){
                            toastr.error(item);
                        })

                    }
                    
                });
            })
        })
        
    </script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>

</html>