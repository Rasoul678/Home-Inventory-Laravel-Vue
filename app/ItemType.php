<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemType extends Model
{
    use SoftDeletes;

    protected $fillable = [];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
