<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProvinceResource;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Get all provinces.
     * 
     * @group Public
     * 
     * @queryParam name string The name of the province. (can be a substring) Example: Jawa
     * @queryParam country_id int The id of the country. Example: 1
     */
    public function index(Request $request)
    {
        $query = $request->query();

        $provinces = Province::when(isset($query['name']), function ($q) use ($query) {
                        $q->where('name', 'like', '%'.$query['name'].'%');
                    })
                    ->when(isset($query['country_id']), function ($q) use ($query) {
                        $q->where('country_id', $query['country_id']);
                    })
                    ->get();
        return ProvinceResource::collection($provinces);
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
    public function show(Province $province)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Province $province)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Province $province)
    {
        //
    }
}
