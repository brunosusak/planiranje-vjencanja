@extends('layouts.admin')

@section('content')

    <div class="row">
    @foreach($offers as $offer)
        <div class="col-sm-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('uploads/'.$offer->offer_image) }}" alt="Card image cap">
                <div class="card-body">
                    @if(Auth::user()->id == $offer->user_id || Auth::user()->id == 3)
                        <a class="offer-link" href="{{route('single-offer', ['offer_id' => $offer->id])}}">
                            <h5 class="card-title">{{$offer->name}}</h5>
                        </a>
                    @else
                    <h5 class="card-title">{{$offer->name}}</h5>
                    @endif
                    <h6 class="card-subtitle mb-2 text-muted">{{$offer->offer_price}} KM</h6>
                    <p class="card-text">{{$offer->description}}</p>
                    @if(Auth::user()->id == $offer->user_id || Auth::user()->id == 3)
                        <form action="{{route('offer-delete', ['offer_id' => $offer->id])}}" method="post">
                            @csrf
                            <input type="submit" id="delete-btn" value="Izbriši moju ponudu">
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    </div>

@endsection