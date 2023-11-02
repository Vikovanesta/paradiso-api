<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Traits\HttpResponses;
use DB;
use Gate;
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
     * Create new product.
     * 
     * @group Product
     * 
     * @authenticated
     */
    public function store(ProductStoreRequest $request)
    {
        $validated = $request->validated();

        $merchant = $request->user()->merchant;

        DB::transaction(function () use($merchant, $validated) {
            $product = Product::create([
                'merchant_id' => $merchant->id,
                'product_sub_category_id' => $validated['product_sub_category_id'],
                'product_status_id' => $validated['product_status_id'],
                'city_id' => $validated['city_id'],
                'name' => $validated['name'],
                'description' => $validated['description'],
                'duration' => $validated['duration'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'price' => $validated['price'],
                'unit' => $validated['unit'],
                'discount' => $validated['discount'] ?? 0,
                'address' => $validated['address'],
                'coordinate' => $validated['coordinate'],
                'max_person' => $validated['max_person'],
                'min_person' => $validated['min_person'],
                'note' => $validated['note'] ?? null,
                'is_published' => 0,
            ]);

            
            $includes = json_decode($validated['includes']);
            foreach ($includes as $include) {
                $product->includeExcludes()->create([
                    'description' => $include,
                    'is_include' => true,
                ]);
            }
            
            $excludes = json_decode($validated['excludes']);
            foreach ($excludes as $exclude) {
                $product->includeExcludes()->create([
                    'description' => $exclude,
                    'is_include' => false,
                ]);
            }
            
            $terms = json_decode($validated['terms']);
            foreach ($terms as $term) {
                $product->terms()->create([
                    'term' => $term,
                    'is_global' => false,
                ]);
            }
            
            $facilities = json_decode($validated['facilities']);
            foreach ($facilities as $facility) {
                $product->facilities()->attach($facility);
            }

            $schedules = json_decode($validated['schedules']);
            foreach ($schedules as $schedule) {
                $newSchedule = $product->schedules()->create([
                    'date' => $product->start_date->addDays($schedule->order - 1),
                    'title' => $schedule->title,
                ]);

                foreach ($schedule->days as $schedule_day) {
                    $newSchedule->scheduleDays()->create([
                        'start_time' => $schedule_day->start_time,
                        'end_time' => $schedule_day->end_time,
                        'description' => $schedule_day->description,
                    ]);
                }
            }

            $faqs = json_decode($validated['faqs']);
            foreach ($faqs as $faq) {
                $product->faqs()->create([
                    'question' => $faq->question,
                    'answer' => $faq->answer,
                ]);
            }
            
            
            
            if($validated['thumbnail'] != null && $validated['thumbnail'] != '') {
                $thumbnail = $validated['thumbnail'];
                $thumbnail->storeAs('public/products/thumbnail', $thumbnail->hashName());
                $thumbnail_url = url('/storage/products/thumbnail/' . $thumbnail->hashName());
                
                $product->update([
                    'thumbnail' => $thumbnail_url,
                ]);
            }
            
            $validated['images'] = $validated['images'] ?? [];
            if($validated['images'] != null && $validated['images'] != '') {
                foreach ($validated['images'] as $image) {
                    $image->storeAs('public/products/images', $image->hashName());
                    $image_url = url('/storage/products/images/' . $image->hashName());
                    
                    $product->productImages()->create([
                        'image' => $image_url,
                    ]);
                }
            }
        });
        
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
        )->find($merchant->products->last()->id);
        
        return $this->success(new ProductResource($product), 'Product created successfully', 201);
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

        return $this->success(new ProductResource($product), 'Product retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Delete a product.
     * 
     * @group Product
     * 
     * @authenticated
     */
    public function destroy(Product $product)
    {
        Gate::authorize('delete-product', $product);

        $product->delete();

        return $this->success(null, 'Product deleted successfully');
    }
}
