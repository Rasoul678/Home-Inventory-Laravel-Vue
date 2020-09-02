<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemImage extends Model
{
    use SoftDeletes;

    protected $fillable = ['image_url', 'image_public_id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function getImageUrlAttribute($value)
    {
        if(config('app.env') === 'local')
        {
            return '/storage/' . $value;
        }else{
            return $value;
        }
    }
}
