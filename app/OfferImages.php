<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferImages extends Model
{
    protected $fillable = [
        'image_name', 'offer_id'
    ];

    protected $table = 'offer_images';
}
