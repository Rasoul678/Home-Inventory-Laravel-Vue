<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemImage extends Model
{
    use SoftDeletes;

    protected $fillable = ['image_url'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
