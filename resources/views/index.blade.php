@extends('inc/master')
@section('content')

    <!-- Header -->
    <header id="header">
        <div class="intro">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="intro-text">
                            <h1>{{ $res->name }}</h1>
                            <p>Restaurant / Coffee / Pub</p>
                            <a href="#about" class="btn btn-custom btn-lg page-scroll">Discover Story</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- About Section -->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 ">
                    <div class="about-img"><img src="img/about.jpg" class="img-responsive" alt=""></div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="about-text">
                        <h2>Our Restaurant</h2>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare diam commodo nibh.</p>
                        <h3>Awarded Chefs</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Restaurant Menu Section -->
    <div id="restaurant-menu">
        <div class="section-title text-center center">
            <div class="overlay">
                <h2>Menu</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                @if(count($categories) === 0)
                    <h2 class="text-center my-2">NO Menu To Show</h2>
                @endif
                @foreach ($categories as $category)
                
                    <div class="col-xs-12 col-sm-6">
                        <div class="menu-section">
                            <h2 class="menu-section-title">{{ $category->name }}</h2>
                            <hr>
                                @foreach ($dishes as $dish)
                                @if ($dish->category->name === $category->name)
                                    <div class="menu-item">
                                        <div class="menu-item-name"> {{ $dish->name }} </div>
                                        <div class="menu-item-price"> {{ $dish->price }} </div>
                                        <div class="menu-item-description"> {{ $dish->content }} </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
   <!-- Portfolio Section -->
   <div id="portfolio">
    <div class="section-title text-center center">
        <div class="overlay">
            <h2>Gallery</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="categories">
                <ul class="cat">
                    <li>
                        <ol class="type">
                            @if(count($dishes) > 0)
                            <li><a href="#" data-filter="*" class="active">All</a></li>
                            @foreach ($categories as $item)
                            <li><a href="#" data-filter="{{ '.'.$item->name }}">{{ $item->name }}</a></li>
                            @endforeach
                            @else
                            <h2 class="text-center my-2">NO Dishes To Show</h2>
                            @endif
                        </ol>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="row">
            <div class="portfolio-items">
                @foreach ($dishes as $item)
                    <div class="col-sm-6 col-md-4 col-lg-4 {{ $item->category->name }}">
                        <div class="portfolio-item">
                            <div class="hover-bg">
                                <a href="{{ asset('img/dishes/'.$item->image) }}" title="{{ $item->name }}" data-lightbox-gallery="gallery1">
                                <div class="hover-text">
                                    <h4>{{ $item->name }}</h4>
                                </div>
                                <img src="{{ asset('img/dishes/'.$item->image) }}" class="img-responsive w-100" alt="Project Title"> </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
    <!-- Team Section -->
    <div id="team" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="col-md-10 col-md-offset-1 section-title">
                    <h2>Meet Our Chefs</h2>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed dapibus leonec.</p>
                </div>
                <div id="row">
                    @foreach ($chefs as $chef)
                        <div class="col-md-4 team">
                            <div class="thumbnail">
                                <div class="team-img"><img src="{{ asset('img/users/'. $chef->image) }}" alt="..."></div>
                                <div class="caption">
                                    <h3>{{ $chef->name }}</h3>
                                    <p>{!! substr($chef->description, 0,15) !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- Call Reservation Section -->
    <div id="call-reservation" class="text-center">
        <div class="container">
            <h2>Want to make a reservation? Call <strong>1-887-654-3210</strong></h2>
        </div>
    </div>
    
@endsection