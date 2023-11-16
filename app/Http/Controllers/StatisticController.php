<?php

namespace App\Http\Controllers;

use App\Http\Resources\StatisticResource;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Get merchant's statistic.
     * 
     * @group Statistic
     * 
     * @authenticated
     */
    public function show(Request $request)
    {
        return $this->success(new StatisticResource(auth()->user()->merchant));
    }
}
