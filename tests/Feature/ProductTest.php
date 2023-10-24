<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_product_detail_success(): void
    {
        $response = $this->get('/api/v1/products/1');

        $response->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', 1)
                    ->where('data.name', 'product')
                    ->where('data.duration', 1)
                    ->where('data.description', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.')
                    ->where('data.start_date', '16/10/2023')
                    ->where('data.end_date', '17/10/2023')
                    ->where('data.price', 100000)
                    ->where('data.unit', 'unit')
                    ->where('data.discount', null)
                    ->where('data.thumbnail', 'https://picsum.photos/200/200')
                    ->where('data.address', 'Jl. Test')
                    ->where('data.coordinate', '123,123')
                    ->where('data.max_person', 10)
                    ->where('data.min_person', 1)
                    ->where('data.note', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.')
                    ->where('data.is_published', 0)
                    ->has('data.sub_category')
                        ->where('data.sub_category.id', 1)
                        ->has('data.sub_category.product_category')
                            ->where('data.sub_category.product_category.id', 1)
                    ->has('data.merchant')
                        ->where('data.merchant.id', 1)
                        ->where('data.merchant.name', 'merchant')
                    ->has('data.status')
                        ->where('data.status.id', 1)
                        ->where('data.status.name', 'draft')
                    ->has('data.schedules', 1)
                    ->has('data.schedules.0', fn(AssertableJson $json)=>
                        $json->where('id', 1)
                             ->where('date', '16/10/2023')
                             ->where('title', 'day 1')
                             ->has('schedule_days', 2)
                             ->has('schedule_days.0', fn(AssertableJson $json)=>
                                $json->where('id', 1)
                                     ->where('start_time', '08:00')
                                     ->where('end_time', '10:00')
                                     ->where('description', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.')
                             )
                    )
                    ->has('data.reviews', 1)
                    ->has('data.reviews.0', fn(AssertableJson $json)=>
                        $json->where('id', 1)
                            ->where('review', 'revieww')
                            ->where('rating', 5)
                            ->has('user')
                                ->where('user.id', 1)
                                ->where('user.name', 'merchant')
                    )
                    ->has('data.include_excludes', 2)
                    ->has('data.include_excludes.0', fn(AssertableJson $json)=>
                        $json->where('id', 1)
                            ->where('description', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.')
                            ->where('is_include', 1)
                    )
                    ->has('data.facilities', 2)
                    ->has('data.facilities.0', fn(AssertableJson $json)=>
                        $json->where('id', 2)
                            ->where('name', 'parkir')
                            ->etc()
                    )
                    ->has('data.faqs', 2)
                    ->has('data.faqs.0', fn(AssertableJson $json)=>
                        $json->where('id', 1)
                            ->where('question', 'question1')
                            ->where('answer', 'answer1')
                            ->where('is_global', 0)
                    )
                    ->has('data.terms', 2)
                    ->has('data.terms.0', fn(AssertableJson $json)=>
                        $json->where('id', 1)
                            ->where('term', 'term1')
                            ->where('is_global', 0)
                    )
                    ->has('data.images', 2)
                    ->has('data.images.0', fn(AssertableJson $json)=>
                        $json->where('id', 1)
                            ->etc()
                    )
            );
    }
}
