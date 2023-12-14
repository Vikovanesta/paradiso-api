<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                'product_status_id' => $validated['product_status_id'] ?? 1,
                'city_id' => $validated['city_id'] ?? null,
                'district_id' => $validated['district_id'],
                'name' => $validated['name'],
                'description' => $validated['description'],
                'start_date' => $validated['start_date'] ?? null,
                'end_date' => $validated['end_date'] ?? null,
                'price' => $validated['price'],
                'price_unit' => $validated['price_unit'],
                'stock' => $validated['stock'] ?? 0,
                'discount' => $validated['discount'] ?? 0,
                'postal_code' => $validated['postal_code'] ?? null, // 'postal_code' => 'nullable|digits:5',
                'address' => $validated['address'],
                'coordinate' => $validated['coordinate'] ?? null,
                'note' => $validated['note'] ?? null,
                'is_published' => 0,
            ]);

            $product->setCategorySpecificFieldByArray($validated);

            if(isset($validated['includes'])) {
                foreach ($validated['includes'] as $include) {
                    $product->includeExcludes()->create([
                        'description' => $include,
                        'is_include' => true,
                    ]);
                }
            }
            // foreach ($validated['includes'] as $include) {
            //     $product->includeExcludes()->create([
            //         'description' => $include,
            //         'is_include' => true,
            //     ]);
            // }
            
            if(isset($validated['excludes'])) {
                foreach ($validated['excludes'] as $exclude) {
                    $product->includeExcludes()->create([
                        'description' => $exclude,
                        'is_include' => false,
                    ]);
                }
            }

            // foreach ($validated['excludes'] as $exclude) {
            //     $product->includeExcludes()->create([
            //         'description' => $exclude,
            //         'is_include' => false,
            //     ]);
            // }
            
            if(isset($validated['terms'])) {
                foreach ($validated['terms'] as $term) {
                    $product->terms()->create([
                        'term' => $term,
                        'is_global' => false,
                    ]);
                }
            }

            // foreach ($validated['terms'] as $term) {
            //     $product->terms()->create([
            //         'term' => $term,
            //         'is_global' => false,
            //     ]);
            // }
            
            if(isset($validated['facilities'])) {
                foreach ($validated['facilities'] as $facility) {
                    $product->facilities()->attach($facility);
                }
            }

            // foreach ($validated['facilities'] as $facility) {
            //     $product->facilities()->attach($facility);
            // }

            if(isset($validated['schedules'])) {
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

            // $schedules = json_decode($validated['schedules']);
            // foreach ($schedules as $schedule) {
            //     $newSchedule = $product->schedules()->create([
            //         'date' => $product->start_date->addDays($schedule->order - 1),
            //         'title' => $schedule->title,
            //     ]);

            //     foreach ($schedule->days as $schedule_day) {
            //         $newSchedule->scheduleDays()->create([
            //             'start_time' => $schedule_day->start_time,
            //             'end_time' => $schedule_day->end_time,
            //             'description' => $schedule_day->description,
            //         ]);
            //     }
            // }

            if(isset($validated['faqs'])) {
                $faqs = json_decode($validated['faqs']);
                foreach ($faqs as $faq) {
                    $product->faqs()->create([
                        'question' => $faq->question,
                        'answer' => $faq->answer,
                    ]);
                }
            }

            // $faqs = json_decode($validated['faqs']);
            // foreach ($faqs as $faq) {
            //     $product->faqs()->create([
            //         'question' => $faq->question,
            //         'answer' => $faq->answer,
            //     ]);
            // }
            
            
            if(isset($validated['thumbnail'])) {
                $thumbnail = $validated['thumbnail'];
                $directory = 'products/thumbnails/';
                $thumbnail->storeAs('public/' . $directory, $thumbnail->hashName(), 'local');
                $thumbnail_url = url('/storage/' . $directory . $thumbnail->hashName());

                $product->update([
                    'thumbnail' => $thumbnail_url,
                ]);
            }
            
            if(isset($validated['images'])) {
                $directory = 'products/images/';
                foreach ($validated['images'] as $image) {
                    $image->storeAs('public/' . $directory, $image->hashName(), 'local');
                    $image_url = url('/storage/' . $directory . $image->hashName());
                    
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
            // 'city',
            'district',
            'district.city',
            'district.city.province',
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
                // 'city',
                'district',
                'district.city',
                'district.city.province',
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
        
        // Update view count if user is customer
        if(auth()->user()->user_level === 2) {
            $productView = $product->productViews()->whereDate('created_at', today())->first();

            if($productView) {
                $productView->increment('count');
            } else {
                $product->productViews()->create([
                    'count' => 1,
                ]);
            }
        }

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
                'district_id' => $validated['district_id'] ?? $product->district_id,
                'name' => $validated['name'] ?? $product->name,
                'description' => $validated['description'] ?? $product->description,
                'start_date' => $validated['start_date'] ?? $product->start_date,
                'end_date' => $validated['end_date'] ?? $product->end_date,
                'price' => $validated['price'] ?? $product->price,
                'price_unit' => $validated['price_unit'] ?? $product->price_unit,
                'stock' => $validated['stock'] ?? $product->stock,
                'discount' => $validated['discount'] ?? $product->discount,
                'postal_code' => $validated['postal_code'] ?? $product->postal_code, // 'postal_code' => 'nullable|digits:5',
                'address' => $validated['address'] ?? $product->address,
                'coordinate' => $validated['coordinate'] ?? $product->coordinate,
                'note' => $validated['note'] ?? $product->note,
            ]);

            $product->setCategorySpecificFieldByArray($validated);

            if(isset($validated['includes'])) {
                $product->includeExcludes()->where('is_include', true)->delete();
                foreach ($validated['includes'] as $include) {
                    $product->includeExcludes()->create([
                        'description' => $include,
                        'is_include' => true,
                    ]);
                }
            }

            if(isset($validated['excludes'])) {
                $product->includeExcludes()->where('is_include', false)->delete();
                foreach ($validated['excludes'] as $exclude) {
                    $product->includeExcludes()->create([
                        'description' => $exclude,
                        'is_include' => false,
                    ]);
                }
            }

            if(isset($validated['terms'])) {
                $product->terms()->delete();
                foreach ($validated['terms'] as $term) {
                    $product->terms()->create([
                        'term' => $term,
                        'is_global' => false,
                    ]);
                }
            }

            if(isset($validated['facilities'])) {
                $product->facilities()->detach();
                foreach ($validated['facilities'] as $facility) {
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
                $directory = 'products/thumbnails/';
                $thumbnail->storeAs('public/' . $directory, $thumbnail->hashName(), 'local');
                $thumbnail_url = url('/storage/' . $directory . $thumbnail->hashName());

                Storage::disk('local')->delete('public/' . $directory . basename($product->thumbnail));
                
                $product->update([
                    'thumbnail' => $thumbnail_url,
                ]);
            }

            // Delete images that are not in the saved_images array
            $saved_images = $validated['saved_images'] ?? [];
            $product->productImages()->whereNotIn('id', $saved_images)->delete();
            
            if(isset($validated['images'])) {
                $directory = 'products/images/';
                foreach ($validated['images'] as $image) {
                    $image->storeAs('public/' . $directory, $image->hashName(), 'local');
                    $image_url = url('/storage/' . $directory . $image->hashName());
                    
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
            // 'city',
            'district.city',
            'district.city.province',
            'district',
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
