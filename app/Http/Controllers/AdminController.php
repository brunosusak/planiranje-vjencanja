<?php

namespace App\Http\Controllers;

use App\OfferImages;
use App\Offers;
use App\OfferType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin-middleware');
    }

    public function index()
    {
        return view('admin-pages.index');
    }

    public function UserList()
    {
        $users = DB::table('users')
                    ->join('roles', 'users.role_id', '=', 'roles.id')
                    ->select('roles.name as role_name', 'users.name as user_name', 'users.id', 'users.email', 'users.role_id')
                    ->get();

        return view('admin-pages.users', compact('users'));
    }

    public function SetAsAdmin(Request $request)
    {
        $user_id = $request['user_id'];

        User::where('id', $user_id)->update(['role_id' => 2]);

        return back();
    }

    public function getAllOffers()
    {
        $offers = Offers::all();

        return view('admin-pages.offers.all', compact('offers'));
    }

    public function getOffersCreateTemplate()
    {
        $offer_types = OfferType::all();

        return view('admin-pages.offers.create', compact('offer_types'));
    }

    public function createOffer(Request $request)
    {

        $file = $request->file('offer_image');
        $file_name = '';

        if ( $file != null ){
            $file_name = $file->getClientOriginalName();
            $file->move(base_path().'/public_html/uploads/', $file_name);
        }

        $offer = new Offers;
        $offer->name = $request["offer_name"];
        $offer->offer_type_id = $request["offer_type_id"];
        $offer->description = $request["offer_desc"];
        $offer->available_date = $request["available_date"];
        $offer->offer_price = $request["offer_price"];
        $offer->user_id = Auth::user()->id;
        $offer->offer_image = $file_name;

        $offer->save();

        $images = $request->hasFile("offer_images");

        if ($images != null) {
            foreach ($request->file('offer_images') as $image) {
                $image_name = $image->getClientOriginalName();
                $image->move(base_path().'/public/uploads/', $image_name); //TODO: set public_html
                $offerImage = new OfferImages;
                $offerImage->image_name = $image_name;
                $offerImage->offer_id = $offer->id;

                $offerImage->save();
            }
        }

        return back()->with('status', 'Offer created!');
    }

    public function getSingleOfferAdmin($offer_id) {

        $offer = Offers::where('id', $offer_id)->first();
        $offer_types = OfferType::all();

        return view('admin-pages.offers.single', compact('offer', 'offer_types'));

    }

    public function editOffer(Request $request, $offer_id) {
        $file = $request->file('offer_image');
        $old_file_name = $request["current_filename"];
        $file_name = $old_file_name;

        if ( $file != null ){
            unlink(base_path().'/public_html/uploads/'. $old_file_name);

            $file_name = $file->getClientOriginalName();
            $file->move(base_path().'/public_html/uploads/', $file_name);
        }

        $offer = Offers::find($offer_id);
        $offer->name = $request["offer_name"];
        $offer->offer_type_id = $request["offer_type_id"];
        $offer->description = $request["offer_desc"];
        $offer->available_date = $request["available_date"];
        $offer->offer_price = $request["offer_price"];
        $offer->offer_image = $file_name;

        $offer->save();

        return back()->with('status', 'Offer edited!');
    }

    public function getOffersById($offer_type_id) {
        $offers = Offers::where('offer_type_id', '=', $offer_type_id)->get();

        return view('home-pages.offers', compact('offers'));
    }

    public function deleteOffer($offer_id)
    {
        DB::table("offers")->where('id','=', $offer_id)->delete();

        return back();
    }
}
