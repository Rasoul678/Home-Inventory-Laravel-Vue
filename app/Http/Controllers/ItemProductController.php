<?php

namespace App\Http\Controllers;

use App\Company;
use App\InventoryLocation;
use App\Item;

class ItemProductController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create(Item $item)
    {
        $locations = InventoryLocation::all();

        $companies = Company::where('type', 'retailer')->get();

        return view('products.create', compact(['item', 'locations', 'companies']));
    }

    public function store(Item $item)
    {
        $attributes = request()->validate([
            'retailer_id'=>'required|exists:companies,id',
            'inventory_location_id'=>'required|exists:inventory_locations,id',
            'purchase_price'=>'required',
            'msrp'=>'nullable',
            'purchase_date'=>'required',
            'expiration_date'=>'nullable'
        ]);

        $attributes['user_id'] = auth()->id();

        $item->products()->create($attributes);

        return redirect(route('items.show', $item));
    }
}
