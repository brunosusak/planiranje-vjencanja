<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OfferImages;
use App\Offers;
use App\OfferType;

class MainController extends Controller
{
    public function home()
    {
        return view('home-pages.home');
    }

    public function getOffersById($offer_type_id) {
        $offers = Offers::where('offer_type_id', '=', $offer_type_id)->get();

        return view('home-pages.offers', compact('offers'));
    }

    public function getSingleOffer($offer_id) {
        $offer = Offers::where('id', '=', $offer_id)->first();
        $offer_type = OfferType::where('id', '=', $offer->offer_type_id)->pluck('name')->first();

        $images = OfferImages::where('offer_id', '=', $offer_id)->get();

        return view('home-pages.single-offer', compact('offer', 'offer_type', 'images'));
    }
}
