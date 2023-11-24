<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCategoryResource;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::with(['productSubCategories'])
                        ->get();

        return $this->success(ProductCategoryResource::collection($categories), 'Product categories');    
    }
}
