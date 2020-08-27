<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shape extends Model
{
    use SoftDeletes;

    protected $fillable = [];

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }
}
