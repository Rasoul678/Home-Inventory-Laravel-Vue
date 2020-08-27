<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'company_id', 'size_id', 'item_type_id', 'name', 'description', 'sku', 'sparks_joy'
    ];

    public function relatedTo()
    {
        return $this->hasMany(RelatedItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function type()
    {
        return $this->belongsTo(ItemType::class);
    }

    public function products()
    {
        return $this->hasMany(ItemInfo::class);
    }

    public function images()
    {
        return $this->hasMany(ItemImage::class);
    }
}
