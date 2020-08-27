<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'address_id', 'name', 'email', 'description', 'logo_url', 'website_url'
    ];

    public function address()
    {
        return $this->belongsTo(Company::class);
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
