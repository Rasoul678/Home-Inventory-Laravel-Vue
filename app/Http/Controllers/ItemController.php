<?php

namespace App\Http\Controllers;

use App\Company;
use App\Item;
use App\ItemType;
use App\Shape;
use Illuminate\Support\Facades\File;
use JD\Cloudder\Facades\Cloudder;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        $this->authorize('create', Item::class);

        $shapes = Shape::all();
        $companies = Company::where('type', 'producer')->get();
        $types = ItemType::all();

        return view('items.create', compact(['shapes', 'companies', 'types']));
    }

    public function store()
    {
        $this->authorize('create', Item::class);

        try {
            $attributes = request()->validate([
                'company_id'=>'required|exists:companies,id',
                'size_id'=>'required|exists:sizes,id',
                'item_type_id'=>'required|exists:item_types,id',
                'name'=>'required',
                'description'=>'nullable',
            ]);

            $attributes['user_id'] = auth()->id();

            $item = Item::create($attributes);

            return response()->json($item);

        }catch (\Exception $exception)
        {
            return response()->json(['message'=>'Try again!']);
        }
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function destroy(Item $item)
{
    $item->images->each(function($image){
        $image_path = public_path( '/storage/' . $image->image_url);

        if(file_exists($image_path)){
            File::delete($image_path);
        }
    });

    $item->forceDelete();

    return redirect(route('items.index'));
}

    public function upload(Item $item)
    {
        request()->validate([
            'image_url'=>'required|image'
        ]);

        if(config('app.env') === 'local')
        {
            $image = $item->images()->create([
                'image_url'=>request()->file('item-image')->store('itemImages', 'public'),
            ]);

            return response()->json($image);
        }else
        {
            if ($img = request()->file('item-image')) {
                $image_path = $img->getRealPath();
                Cloudder::upload($image_path,  now(). '_' . $item->name, [
                    "folder" => "inventory-laravel/items/". $item->name . '/',
                ]);
                $publicId = Cloudder::getPublicId();
                $imgUrl = Cloudder::secureShow($publicId, [
                    'width'     => 300,
                    'height'    => 300
                ]);
                $image = $item->images()->create([
                    'image_url'=> $imgUrl,
                    'image_public_id'=> $publicId,
                ]);

                return response()->json($image);
            }
        }
    }

    public function remove(Item $item, $imageId)
    {
        $image_path = public_path( '/storage/' . $item->images()->where('id', $imageId)->first()->image_url);

        if(file_exists($image_path)){
            File::delete( $image_path);
        }

        $item->images()->whereId($imageId)->forceDelete();

        return response()->json(['message'=>'Image deleted!']);
    }
}
