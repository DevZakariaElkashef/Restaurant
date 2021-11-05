@extends('inc/master')
@section('content')

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

@endsection