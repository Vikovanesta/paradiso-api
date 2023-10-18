<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_product_detail_success(): void
    {
        $response = $this->get('/api/products/1');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'description',
                    'start_date',
                    'end_date',
                    'price',
                    'unit',
                    'discount',
                    'thumbnail',
                    'address',
                    'coordinate',
                    'max_person',
                    'min_person',
                    'note',
                    'is_published',
                    'created_at',
                    'updated_at',
                    'sub_category' => [
                        'id',
                        'name',
                        'icon',
                        'product_category' => [
                            'id',
                            'name',
                            'icon',
                        ]
                    ],
                    'merchant' => [
                        'id',
                        'name',
                        'ktp',
                        'npwp',
                        'siup',
                        'status',
                        'created_at',
                        'updated_at',
                    ],
                    'status' => [
                        'id',
                        'name',
                        'color',
                        'icon',
                    ],
                    'schedules' => [
                        '*' => [
                            'id',
                            'date',
                            'title',
                            'schedule_days' => [
                                '*' => [
                                    'id',
                                    'start_time',
                                    'end_time',
                                    'description',
                                ],
                            ],
                        ],
                    ],
                    'reviews' => [
                        '*' => [
                            'id',
                            'review',
                            'rating',
                            'user' => [
                                'id',
                                'name',
                                'user_level',
                                'email',
                                'phone',
                                'status',
                                'created_at',
                                'updated_at'
                            ],
                        ],
                    ],
                    'include_excludes' => [
                        '*' => [
                            'id',
                            'description',
                            'is_include',
                        ],
                    ],
                    'facilities' => [
                        '*' => [
                            'id',
                            'name',
                            'icon',
                        ],
                    ],
                    'faqs' => [
                        '*' => [
                            'id',
                            'question',
                            'answer',
                            'is_global',
                        ],
                    ],
                    'terms' => [
                        '*' => [
                            'id',
                            'term',
                            'is_global',
                        ],
                    ],
                    'images' => [
                        '*' => [
                            'id',
                            'image',
                        ],
                    ],
                ],
            ]);
    }
}
