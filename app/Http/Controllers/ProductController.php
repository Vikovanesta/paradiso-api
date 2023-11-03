<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

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
     * Update a product.
     * 
     * @group Product
     * 
     * @authenticated
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        Gate::authorize('update-product', $product);

        $validated = $request->validated();

        DB::transaction(function () use($product, $validated) {
            $product->update([
                'product_sub_category_id' => $validated['product_sub_category_id'] ?? $product->product_sub_category_id,
                'product_status_id' => $validated['product_status_id'] ?? $product->product_status_id,
                'city_id' => $validated['city_id'] ?? $product->city_id,
                'name' => $validated['name'] ?? $product->name,
                'description' => $validated['description'] ?? $product->description,
                'duration' => $validated['duration'] ?? $product->duration,
                'start_date' => $validated['start_date'] ?? $product->start_date,
                'end_date' => $validated['end_date'] ?? $product->end_date,
                'price' => $validated['price'] ?? $product->price,
                'unit' => $validated['unit'] ?? $product->unit,
                'discount' => $validated['discount'] ?? $product->discount,
                'address' => $validated['address'] ?? $product->address,
                'coordinate' => $validated['coordinate'] ?? $product->coordinate,
                'max_person' => $validated['max_person'] ?? $product->max_person,
                'min_person' => $validated['min_person'] ?? $product->min_person,
                'note' => $validated['note'] ?? $product->note,
            ]);

            if(isset($validated['includes'])) {
                $product->includeExcludes()->where('is_include', true)->delete();
                $includes = json_decode($validated['includes']);
                foreach ($includes as $include) {
                    $product->includeExcludes()->create([
                        'description' => $include,
                        'is_include' => true,
                    ]);
                }
            }

            if(isset($validated['excludes'])) {
                $product->includeExcludes()->where('is_include', false)->delete();
                $excludes = json_decode($validated['excludes']);
                foreach ($excludes as $exclude) {
                    $product->includeExcludes()->create([
                        'description' => $exclude,
                        'is_include' => false,
                    ]);
                }
            }

            if(isset($validated['terms'])) {
                $product->terms()->delete();
                $terms = json_decode($validated['terms']);
                foreach ($terms as $term) {
                    $product->terms()->create([
                        'term' => $term,
                        'is_global' => false,
                    ]);
                }
            }

            if(isset($validated['facilities'])) {
                $product->facilities()->detach();
                $facilities = json_decode($validated['facilities']);
                foreach ($facilities as $facility) {
                    $product->facilities()->attach($facility);
                }
            }

            if(isset($validated['schedules'])) {
                $product->schedules()->delete();
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
            }

            if(isset($validated['faqs'])) {
                $product->faqs()->delete();
                $faqs = json_decode($validated['faqs']);
                foreach ($faqs as $faq) {
                    $product->faqs()->create([
                        'question' => $faq->question,
                        'answer' => $faq->answer,
                    ]);
                }
            }

            if(isset($validated['thumbnail'])) {
                $thumbnail = $validated['thumbnail'];
                $thumbnail->storeAs('public/products/thumbnail', $thumbnail->hashName());
                $thumbnail_url = url('/storage/products/thumbnail/' . $thumbnail->hashName());

                Storage::delete('public' . (str_replace(url('/storage'), '', $product->thumbnail)));
                
                $product->update([
                    'thumbnail' => $thumbnail_url,
                ]);
            }

            // Delete images that are not in the saved_images array
            $saved_images = $validated['saved_images'] ?? [];
            $product->productImages()->whereNotIn('id', $saved_images)->delete();
            
            if(isset($validated['images'])) {
                foreach ($validated['images'] as $image) {
                    $image->storeAs('public/products/images', $image->hashName());
                    $image_url = url('/storage/products/images/' . $image->hashName());

                    $product->productImages()->create([
                        'image' => $image_url,
                    ]);
                }
            }
        });

        $product->refresh()->load(
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
        );

        return $this->success(new ProductResource($product), 'Product updated successfully', 201);
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
