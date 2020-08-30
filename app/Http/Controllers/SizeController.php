<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Database\QueryException;

class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    {
        try {
            $attributes = request()->validate([
                'shape_id'=>'required|exists:shapes,id',
                'name'=>'required',
                'length'=>'required',
                'width'=>'required',
                'height'=>'required',
                'volume'=>'required'
            ]);

            $size = Size::create($attributes);

            return response()->json($size);

        }catch(QueryException $exception)
        {
            return response()->json(['message'=>'Size already exists!']);
        }
    }
}
