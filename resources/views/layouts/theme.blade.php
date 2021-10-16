@php

    $name =  \App\Models\setting::where("setting",'siteName')->first();
    $facebook = \App\Models\setting::where("setting",'facebook')->first();
    $twitter = \App\Models\setting::where("setting",'twitter')->first();
    $linkedin = \App\Models\setting::where("setting",'linkedin')->first();
    $youtube = \App\Models\setting::where("setting",'youtube')->first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title> {{$name->option ?? 'Stand Blog '}} </title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/templatemo-stand-blog.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.css')}}">
</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}"><h2>{{$name->option ?? 'Stand Blog '}}<em>.</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item  {{ (request()->is('/')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('/')}}">Home
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('about-us')) ? 'active' : '' }}">
                        <a class="nav-link"  href="{{url('/about-us')}}">About Us</a>
                    </li>
                    <li class="nav-item {{ (request()->is('post')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('/post')}}">Blog Entries</a>
                    </li>
                    <li class="nav-item {{ (request()->is('contact')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('/contact')}}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Page Content -->
@yield('Content')

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="social-icons">
                    <li><a href="{{$facebook->option ?? '#'}}">Facebook</a></li>
                    <li><a href="{{$twitter->option ?? '#'}}">Twitter</a></li>
                    <li><a href="{{$linkedin->option ?? '#'}}">Linkedin</a></li>
                    <li><a href="{{$youtube->option ?? '#'}}">Youtube</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="copyright-text">
                    <p>Copyright 2021 {{$name->option ?? 'Stand Blog '}}
                        | Developed by Abdullah Zahid</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Additional Scripts -->
<script src="{{asset('frontend/assets/js/custom.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.js')}}"></script>
<script src="{{asset('frontend/assets/js/slick.js')}}"></script>
<script src="{{asset('frontend/assets/js/isotope.js')}}"></script>
<script src="{{asset('frontend/assets/js/accordions.js')}}"></script>

<script language = "text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value='';         // with more chance of typos
            t.style.color='#fff';
        }
    }
</script>

</body>
</html>
