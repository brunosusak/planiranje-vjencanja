@extends('layouts.app')

@section('content')
    <div class="style-content container">
        <div class="row">
            @foreach($offers as $offer)
                <a href="{{route('offer-single', ['offer_id' => $offer->id])}}">
                    <div class="col-sm-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('uploads/'.$offer->offer_image) }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$offer->name}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{$offer->offer_price}} KM</h6>
                                <p class="card-text">{{$offer->description}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>

@endsection