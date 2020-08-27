<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'state_id', 'street_address_1', 'street_address_2', 'city', 'zipcode', 'latitude', 'longitude'
    ];

    protected $with = ['state'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
