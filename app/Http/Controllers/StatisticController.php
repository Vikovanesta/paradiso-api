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
     * 
     * @queryParam product_time_range string The time range of the product statistic. Example: week
     * @queryParam transaction_time_range string The time range of the transaction statistic. Example: week
     */
    public function show(Request $request)
    {
        return $this->success(new StatisticResource(auth()->user()->merchant), 'Merchant\'s statistic retrieved successfully.');
    }
}
