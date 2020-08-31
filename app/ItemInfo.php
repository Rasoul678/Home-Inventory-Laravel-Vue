<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemInfo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'item_id', 'retailer_id', 'inventory_location_id', 'purchase_date', 'expiration_date', 'purchase_price', 'msrp', 'last_used'
    ];

    protected $dates = ['purchase_date', 'expiration_date'];

    protected $with = ['retailer'];

    public function buyer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function retailer()
    {
        return $this->belongsTo(Company::class, 'retailer_id');
    }

    public function inventoryLocation()
    {
        return $this->belongsTo(InventoryLocation::class, 'inventory_location_id');
    }

    public function setPurchaseDateAttribute($value) {
        $this->attributes['purchase_date'] = date('Y-m-d', strtotime($value) );
    }

    public function setExpirationDateAttribute($value) {
        $this->attributes['expiration_date'] = date('Y-m-d', strtotime($value) );
    }
}
