<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class ProductController extends Controller
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Get product details.
     * 
     * @group Product
     */
    public function show(Product $product)
    {
        $product = Product::with(
                'merchant',
                'productSubCategory',
                'productSubCategory.productCategory',
                'productStatus',
                'schedules',
                'schedules.scheduleDays',
                'reviews',
                'reviews.user',
                'includeExcludes',
                'facilities',
                'faqs',
                'terms',
                'productImages',
            )->find($product->id);

        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
