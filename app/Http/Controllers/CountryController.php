<?php

namespace App\Http\Controllers;

use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Get all countries.
     * 
     * @group Public
     * 
     * @queryParam name string The name of the country. (can be a substring) Example: Ind
     */
    public function index(Request $request)
    {
        $query = $request->query();

        $countries = Country::
                        when(isset($query['name']), function ($q) use ($query) {
                            $q->where('name', 'like', '%'.$query['name'].'%');
                        })
                        ->get()
                        ;
        return CountryResource::collection($countries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        //
    }
}
