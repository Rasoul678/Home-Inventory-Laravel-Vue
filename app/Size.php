<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'shape_id', 'name', 'length', 'width', 'height', 'volume',
    ];

    public function shape()
    {
        return $this->belongsTo(Shape::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
