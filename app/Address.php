<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'state_id', 'country_id', 'street_address_1', 'street_address_2', 'city', 'zipcode'
    ];
}
