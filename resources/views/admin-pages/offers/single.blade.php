@extends('layouts.admin')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{route('edit-offer', ['offer_id' => $offer->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="offerName">Ime ponude</label>
            <input type="text" class="form-control" name="offer_name" id="offerName" value="{{$offer->name}}">
        </div>
        <div class="form-group">
            <label for="offerType">Vrsta ponude</label>
            <select name="offer_type_id">
                @foreach($offer_types as $offer_type)
                    <option
                            value="{{$offer_type->id}}"
                            @if($offer_type->id == $offer->offer_type_id)
                            selected="selected"
                            @endif
                    >{{$offer_type->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="offerPrice">Cijena</label>
            <input type="number" class="form-control" name="offer_price" id="offerPrice" value="{{$offer->offer_price}}">
        </div>
        <div class="form-group">
            <label for="offerDate">Datum ponude</label>
            <input type="date" class="form-control" name="available_date" id="offerDate" value="{{$offer->available_date}}">
        </div>
        <div class="form-group">
            <label for="offerDescription">Opis ponude</label>
            <textarea class="form-control" name="offer_desc" id="offerDescription" rows="3">{{$offer->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="offerImage">Slika ponude</label>
            <img class="single-image" src="{{ asset('uploads/'.$offer->offer_image) }}">
            <input type="hidden" name="current_filename" value="{{$offer->offer_image}}">
            <input type="file" class="form-control-file" name="offer_image" id="offerImage">
        </div>

        <button type="submit" class="btn btn-primary mb-2">Uredi ponudu</button>
    </form>

@endsection