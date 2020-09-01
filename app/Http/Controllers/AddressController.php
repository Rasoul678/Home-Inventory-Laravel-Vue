<?php

namespace App\Http\Controllers;

use App\Address;
use App\Country;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get All Addresses.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $addresses = Address::all();

        return response()->json($addresses);
    }

    public function create()
    {
        $this->authorize('create', Address::class);

        $countries = Country::all();

        return view('address.create', compact('countries'));
    }

    /**
     * Store New Address In DB.
     *
     * @return JsonResponse
     */
    public function store()
    {
        $this->authorize('create', Address::class);

        try {
            $attributes = request()->validate([
                'state_id'=>'required|exists:states,id',
                'street_address_1'=>'required|max:255',
                'street_address_2'=>'max:255',
                'city'=>'required|max:255',
                'zipcode'=>'required|max:10',
                'latitude'=>'required',
                'longitude'=>'required'
            ]);

            $address = Address::create($attributes);

            return response()->json($address);

        }catch(QueryException $exception)
        {
            return response()->json(['message'=>'Address already exists!']);
        }
    }
}
