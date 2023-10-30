<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductTest extends TestCase
{
   
    public function test_get_product_detail_success(): void
    {
        $productId = 1;
        $response = $this->get('/api/v1/products/' . $productId);

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
        )->find($productId);

        $response->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $product->id)
                    ->where('data.name', $product->name)
                    ->where('data.duration', $product->duration)
                    ->where('data.description', $product->description)
                    ->where('data.start_date', $product->start_date->format('d/m/Y'))
                    ->where('data.end_date', $product->end_date->format('d/m/Y'))
                    ->where('data.price', $product->price)
                    ->where('data.unit', $product->unit)
                    ->where('data.discount', $product->discount)
                    ->where('data.thumbnail', $product->thumbnail)
                    ->where('data.address', $product->address)
                    ->where('data.coordinate', $product->coordinate)
                    ->where('data.max_person', $product->max_person)
                    ->where('data.min_person', $product->min_person)
                    ->where('data.note', $product->note)
                    ->where('data.is_published', $product->is_published)
                    ->has('data.sub_category')
                        ->where('data.sub_category.id', $product->productSubCategory->id)
                        ->has('data.sub_category.product_category')
                            ->where('data.sub_category.product_category.id', $product->productSubCategory->productCategory->id)
                    ->has('data.merchant')
                        ->where('data.merchant.id', $product->merchant->id)
                    ->has('data.status')
                        ->where('data.status.id', $product->productStatus->id)
                    ->has('data.schedules', $product->schedules->count())
                    ->has('data.schedules.0', fn(AssertableJson $json)=>
                        $json->where('id', $product->schedules[0]->id)
                             ->where('date', $product->schedules[0]->date->format('d/m/Y'))
                             ->etc()
                             ->has('schedule_days', $product->schedules[0]->scheduleDays->count())
                             ->has('schedule_days.0', fn(AssertableJson $json)=>
                                $json->where('id', $product->schedules[0]->scheduleDays[0]->id)
                                     ->where('start_time', $product->schedules[0]->scheduleDays[0]->start_time->format('H:i'))
                                     ->where('end_time', $product->schedules[0]->scheduleDays[0]->end_time->format('H:i'))
                                     ->etc()
                             )
                    )
                    ->has('data.reviews', $product->reviews->count())
                    ->has('data.reviews.0', fn(AssertableJson $json)=>
                        $json->where('id', $product->reviews[0]->id)
                            ->etc()
                            ->has('user')
                                ->where('user.id', $product->reviews[0]->user->id)
                    )
                    ->has('data.include_excludes', $product->includeExcludes->count())
                    ->has('data.include_excludes.0', fn(AssertableJson $json)=>
                        $json->where('id', $product->includeExcludes[0]->id)
                            ->etc()
                    )
                    ->has('data.facilities', $product->facilities->count())
                    ->has('data.facilities.0', fn(AssertableJson $json)=>
                        $json->where('id', $product->facilities[0]->id)
                            ->etc()
                    )
                    ->has('data.faqs', $product->faqs->count())
                    ->has('data.faqs.0', fn(AssertableJson $json)=>
                        $json->where('id', $product->faqs[0]->id)
                            ->etc()
                    )
                    ->has('data.terms', $product->terms->count())
                    ->has('data.terms.0', fn(AssertableJson $json)=>
                        $json->where('id', $product->terms[0]->id)
                            ->etc()
                    )
                    ->has('data.images', $product->productImages->count())
                    ->has('data.images.0', fn(AssertableJson $json)=>
                        $json->where('id', $product->productImages[0]->id)
                            ->etc()
                    )
            );
    }
}
