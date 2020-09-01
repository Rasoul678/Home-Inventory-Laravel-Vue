<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'address_id', 'type', 'name', 'email', 'description', 'logo_url', 'website_url'
    ];

    protected $with = ['address'];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function products()
    {
        return $this->hasMany(ItemInfo::class, 'retailer_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
