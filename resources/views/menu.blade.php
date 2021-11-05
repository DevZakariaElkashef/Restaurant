@extends('inc/master')
@section('content')

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
            <div class="row">
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
                                    <div class="menu-item-price"> ${{ $dish->price }} </div>
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

@endsection