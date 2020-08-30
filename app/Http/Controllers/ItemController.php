<?php

namespace App\Http\Controllers;

use App\Company;
use App\Item;
use App\ItemType;
use App\Shape;
use Illuminate\Database\QueryException;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $items = Item::all();

        return view('items.index', compact('items'));
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function create()
    {
        $shapes = Shape::all();
        $companies = Company::all();
        $types = ItemType::all();

        return view('items.create', compact(['shapes', 'companies', 'types']));
    }

    public function store()
    {
        try {
            $attributes = request()->validate([
                'user_id'=> 'required|exists:users,id',
                'company_id'=>'required|exists:companies,id',
                'size_id'=>'required|exists:sizes,id',
                'item_type_id'=>'required|exists:item_types,id',
                'name'=>'required',
                'description'=>'nullable',
            ]);

            $item = Item::create($attributes);

            return response()->json($item);

        }catch (QueryException $exception)
        {
            return response()->json($exception);
        }
    }

    public function upload(Item $item)
    {
        request()->validate([
            'image_url'=>'required|image'
        ]);

        $item->images()->create([
            'image_url'=>request()->file('image_url')->store('itemImages', 'public'),
        ]);

        return back();
    }
}
