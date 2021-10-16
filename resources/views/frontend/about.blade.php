@extends('layouts.theme')
@section('Content')
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>about us</h4>
                            <h2>more about us!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Banner Ends Here -->
    <section class="about-us">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <img src="{{asset('frontend/assets/images/about-us.jpg')}}" alt="">
                    <p>{{$about->option ?? "nothing found"}}</p>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <ul class="social-icons">
                        <li><a href="{{$facebook->option ?? '#'}}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{$twitter->option ?? '#'}}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{$linkedin->option ?? '#'}}"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="{{$youtube->option ?? '#'}}"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>


        </div>
    </section>
@endsection
