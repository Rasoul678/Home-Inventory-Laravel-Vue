<?php

namespace App\Http\Controllers;

use App\Company;
use App\Item;
use App\ItemImage;
use App\ItemType;
use App\Shape;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use JD\Cloudder\Facades\Cloudder;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show All Items.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $items = Item::all();

        return view('items.index', compact('items'));
    }

    /**
     * Show Single Item.
     *
     * @param  Item  $item
     * @return Application|Factory|View
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Create Item.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Item::class);

        $shapes = Shape::all();
        $companies = Company::where('type', 'producer')->get();
        $types = ItemType::all();

        return view('items.create', compact(['shapes', 'companies', 'types']));
    }

    /**
     * Store Item in DB.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
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

    /**
     * Edit Item.
     *
     * @param  Item  $item
     * @return Application|Factory|View
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Delete Item Record From DB.
     *
     * @param  Item  $item
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Item $item)
{
    if(config('app.env') === 'local')
    {
        $item->images->each(function($image){
            $image_path = public_path( $image->image_url);

            if(file_exists($image_path)){
                File::delete($image_path);
            }
        });
    }else
    {
        $publicIds = $item->images->pluck('image_public_id');

        $publicIds->each(function($id) {
            Cloudder::destroyImages($id);
        });
    }

    $item->forceDelete();

    return redirect(route('items.index'));
}

    /**
     * Upload Image For Item.
     *
     * @param  Item  $item
     * @return JsonResponse
     */
    public function upload(Item $item)
    {
        request()->validate([
            'item-image'=>'required|image'
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

    /**
     * Remove Item Image.
     *
     * @param  Item  $item
     * @param $imageId
     * @return JsonResponse
     */
    public function remove(Item $item, $imageId)
    {
        $image = ItemImage::where('id', $imageId)->first();

        if(config('app.env') === 'local')
        {
            $image_path = public_path( $image->image_url);

            if(file_exists($image_path)){
                File::delete( $image_path);
            }
        }else
        {
            Cloudder::destroyImage($image->image_public_id);
        }

        $item->images()->whereId($imageId)->forceDelete();

        return response()->json(['message'=>'Image has been deleted!']);
    }
}
