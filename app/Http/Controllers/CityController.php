<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Get all cities.
     * 
     * @group Public
     * 
     * @queryParam name string The name of the city. (can be a substring) Example: Ja
     */
    public function index(Request $request)
    {
        $query = $request->query();

        $cities = City::with('province')
                    ->when(isset($query['name']), function ($q) use ($query) {
                        $q->where('name', 'like', '%'.$query['name'].'%');
                    })
                    ->get();
        return CityResource::collection($cities);
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
    public function show(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
    }
}
