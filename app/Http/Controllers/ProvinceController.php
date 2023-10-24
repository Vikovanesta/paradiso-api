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
     */
    public function index()
    {
        $provinces = Province::with('country')->get();
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
