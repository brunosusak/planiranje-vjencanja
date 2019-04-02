@extends('layouts.app')

@section('content')
<div class="style-content container">
    <div class="row">
        <div class="card" style="width: 100%;">
            <img class="card-img-top" src="{{ asset('uploads/'.$offer->offer_image) }}" alt="Card image cap">
            <div class="card-body" style="text-align: center;">
                <h1 class="card-title">{{$offer->name}}</h1>

                <div class="w3-content w3-display-container">
                    @foreach($images as $image)
                        <img class="mySlides"  src="{{ asset('uploads/'.$image->image_name) }}">
                    @endforeach

                    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                </div>
                <p class="card-text">{{$offer->description}}</p>
                <h3>{{$offer->offer_price}} KM</h3>
            </div>
        </div>
    </div>

</div>

@endsection