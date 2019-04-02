@extends('layouts.admin')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{route('create-offer')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="offerName">Ime ponude</label>
            <input type="text" class="form-control" name="offer_name" id="offerName" placeholder="Iznajmljujem automobil za svadbene prilike" required>
        </div>
        <div class="form-group">
            <label for="offerType">Vrsta ponude</label>
            <select name="offer_type_id">
                @foreach($offer_types as $offer_type)
                    <option value="{{$offer_type->id}}">{{$offer_type->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="offerPrice">Cijena</label>
            <input type="number" class="form-control" name="offer_price" id="offerPrice" placeholder="Cijene u KM" required>
        </div>
        <div class="form-group">
            <label for="offerDate">Datum ponude</label>
            <input type="date" class="form-control" name="available_date" id="offerDate" placeholder="Za koji datum ?" required>
        </div>
        <div class="form-group">
            <label for="offerDescription">Opis ponude</label>
            <textarea class="form-control" name="offer_desc" id="offerDescription" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="offerImage">Slika ponude</label>
            <input type="file" class="form-control-file" name="offer_image" id="offerImage">
        </div>

        <div class="form-group">
            <label for="offer-images">Više slika</label>
            <input type="file" class="form-control-file offer-images" name="offer_images[]">
            <input type="file" class="form-control-file offer-images" name="offer_images[]">
            <input type="file" class="form-control-file offer-images" name="offer_images[]">
        </div>

        <button type="submit" class="btn btn-primary mb-2">Napravi ponudu</button>
    </form>
@endsection