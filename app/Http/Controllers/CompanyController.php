<?php

namespace App\Http\Controllers;

use App\Address;
use App\Company;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Get All Companies.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $companies = Company::all();

        return response()->json($companies);
    }

    public function create()
    {
        $addresses = Address::all();

        return view('company.create', compact('addresses'));
    }

    /**
     * Store New Company In DB.
     *
     * @return JsonResponse
     */
    public function store()
    {
        try {
            $attributes = request()->validate([
                'address_id'=>'required|exists:addresses,id',
                'name'=>'required|max:255',
                'email'=>'nullable|email|max:255',
                'type'=>'required|max:255',
                'description'=>'nullable|max:500',
                'logo_url'=>'nullable|max:255',
                'website_url'=>'nullable|max:255'
            ]);

            $company = Company::create($attributes);

            return response()->json($company);

        }catch(QueryException $exception)
        {
            return response()->json(['message'=>'Company already exists!']);
        }
    }
}
