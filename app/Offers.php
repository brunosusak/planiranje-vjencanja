<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $fillable = [
        'name', 'offer_type_id', 'description', 'user_id', 'available_date', 'price', 'offer_image'
    ];

    protected $table = 'offers';
}
