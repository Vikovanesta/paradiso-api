<?php

namespace App\Http\Controllers;

use App\Http\Resources\FacilityResource;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index() 
    {
        $facilities = Facility::get();
        
        return FacilityResource::collection($facilities);
    }
}
