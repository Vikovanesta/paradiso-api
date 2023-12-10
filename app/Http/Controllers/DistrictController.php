<?php

namespace App\Http\Controllers;

use App\Http\Resources\DistrictResource;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Get all districts.
     * district = kecamatan
     *
     * @group Public
     * 
     * @queryParam name string The name of the district. (can be a substring) No-example
     * @queryParam city_id int The id of the city. Example: 3401
     */
    public function index(Request $request)
    {
        $query = $request->query();

        $districts = District::when(isset($query['name']), function ($q) use ($query) {
                        $q->where('name', 'like', '%'.$query['name'].'%');
                    })
                    ->when(isset($query['city_id']), function ($q) use ($query) {
                        $q->where('city_id', $query['city_id']);
                    })
                    ->get();
        return DistrictResource::collection($districts);
    }
}
