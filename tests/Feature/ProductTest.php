<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
                        ->etc()
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

    public function test_add_product_success() {
        $user = User::where('id', 1)->first();

        $thumbnailFile = UploadedFile::fake()->image('thumbnail.png');
        $image1 = UploadedFile::fake()->image('image1.png');
        $image2 = UploadedFile::fake()->image('image2.png');

        $response = $this->actingAs($user)->post('/api/v1/merchants/products', [
            'merchant_id' => 1,
            'product_sub_category_id' => 1,
            'product_status_id' => 1,
            'city_id' => 1,
            'name' => 'Product name',
            'description' => 'Product description',
            'duration_type' => 'time',
            'duration' => 3,
            'start_date' => '2023-10-16',
            'end_date' => '2023-10-18',
            'price' => 100000,
            'unit' => 'person',
            'discount' => 0,
            'thumbnail' => $thumbnailFile,
            'address' => 'Product address',
            'coordinate' => 'Product coordinate',
            'max_person' => 10,
            'min_person' => 1,
            'note' => 'Product note',
            'is_published' => false,
            'facilities' => json_encode(['1', '2']),
            'includes' => json_encode(['Include 1', 'Include 2']),
            'excludes' => json_encode(['Exclude 1', 'Exclude 2']),
            'terms' => json_encode(['Term 1', 'Term 2']),
            'faqs' => json_encode([
                [
                    'question' => 'Question 1',
                    'answer' => 'Answer 1',
                ],
                [
                    'question' => 'Question 2',
                    'answer' => 'Answer 2',
                ],
            ]),
            'schedules' => json_encode([
                [  
                    'order' => 1,
                    'title' => 'Day 1',
                    'days' => [
                        [
                            'start_time' => '08:00',
                            'end_time' => '10:00',
                            'description' => 'Schedule day 1',
                        ],
                        [
                            'start_time' => '10:00',
                            'end_time' => '12:00',
                            'description' => 'Schedule day 2',
                        ],
                    ],
                ],
                [   
                    'order' => 2,
                    'title' => 'Day 2',
                    'days' => [
                        [
                            'start_time' => '08:00',
                            'end_time' => '10:00',
                            'description' => 'Schedule day 1',
                        ],
                        [
                            'start_time' => '10:00',
                            'end_time' => '12:00',
                            'description' => 'Schedule day 2',
                        ],
                    ],
                ],
            ]),
            'images' => [
                $image1,
                $image2,
            ],
        ]);

        Storage::assertExists('public/products/thumbnail/' . $thumbnailFile->hashName());
        Storage::assertExists('public/products/images/' . $image1->hashName());
        Storage::assertExists('public/products/images/' . $image2->hashName());

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
        )->find($user->merchant->products->last()->id);

        $response->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.name', 'Product name')
                    ->where('data.description', 'Product description')
                    ->where('data.duration', 3)
                    ->where('data.start_date', '16/10/2023')
                    ->where('data.end_date', '18/10/2023')
                    ->where('data.price', 100000)
                    ->where('data.unit', 'person')
                    ->where('data.discount', 0)
                    ->where('data.thumbnail', $product->thumbnail)
                    ->where('data.address', 'Product address')
                    ->where('data.coordinate', 'Product coordinate')
                    ->where('data.max_person', 10)
                    ->where('data.min_person', 1)
                    ->where('data.note', 'Product note')
                    ->where('data.is_published', 0)
                    ->has('data.sub_category')
                        ->where('data.sub_category.id', 1)
                        ->has('data.sub_category.product_category')
                            ->where('data.sub_category.product_category.id', 1)
                    ->has('data.merchant')
                        ->where('data.merchant.id', 1)
                    ->has('data.status')
                        ->where('data.status.id', 1)
                        ->etc()
                    ->has('data.schedules', 2)
                    ->has('data.schedules.0', fn(AssertableJson $json)=>
                        $json->where('id', $product->schedules[0]->id)
                             ->where('date', '16/10/2023')
                             ->etc()
                             ->has('schedule_days', 2)
                             ->has('schedule_days.0', fn(AssertableJson $json)=>
                                $json->where('id', $product->schedules[0]->scheduleDays[0]->id)
                                     ->where('start_time', '08:00')
                                     ->where('end_time', '10:00')
                                     ->etc()
                             )
                    )
                    ->has('data.reviews', 0)
                    ->has('data.include_excludes', 4)
                    ->has('data.facilities', 2)
                    ->has('data.facilities.0', fn(AssertableJson $json)=>
                        $json->where('id', $product->facilities[0]->id)
                            ->etc()
                    )
                    ->has('data.faqs', 2)
                    ->has('data.faqs.0', fn(AssertableJson $json)=>
                        $json->where('id', $product->faqs[0]->id)
                            ->etc()
                    )
                    ->has('data.terms', 2)
                    ->has('data.terms.0', fn(AssertableJson $json)=>
                        $json->where('id', $product->terms[0]->id)
                            ->etc()
                    )
                    ->has('data.images', 2)
            );
    }
}
