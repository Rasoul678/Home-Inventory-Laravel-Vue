<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelatedItem extends Model
{
    use SoftDeletes;

    protected $fillable = ['item_id', 'related_item_id'];
}
