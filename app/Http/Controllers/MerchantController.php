<?php

namespace App\Http\Controllers;

use App\Http\Resources\MerchantResource;
use App\Http\Resources\ProductResource;
use App\Models\Merchant;
use App\Models\Product;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;


class MerchantController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Get all products from a merchant.
     * 
     * @group Product
     * 
     * @authenticated
     */
    public function productIndex(Request $request, $id)
    {
        $pageSize = $request->query('page_size', 15);
        $products = Product::where('merchant_id', $id)->paginate($pageSize);

        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Get merchant profile
     * 
     * @group Merchant
     * 
     * @authenticated
     */
    public function show(Merchant $merchant)
    {
        $merchant = Merchant::with(
            'merchantProfile',
            'merchantLevel',
            'merchantStatus',
        )->find($merchant->id);

        return new MerchantResource($merchant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merchant $merchant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchant $merchant)
    {
        //
    }
}
