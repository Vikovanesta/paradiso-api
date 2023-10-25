<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class MerchantTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_merchant_detail_success(): void
    {
        $user = User::where('email', 'merchant@mail.com')->first();

        $response = $this->actingAs($user)->get('/api/v1/merchants/1');

        $response->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', 1)
                    ->where('data.name', 'merchant')
                    ->where('data.logo', 'https://picsum.photos/100/100')
                    ->where('data.is_highlight', 0)
                    ->where('data.notes', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.')
                    ->has('data.profile')
                        ->where('data.profile.id', 1)
                        ->where('data.profile.description', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.')
                        ->where('data.profile.address', 'Jl. Test')
                        ->where('data.profile.banner', 'https://picsum.photos/500/250')
                        ->where('data.profile.ktp_number', '1234567890123456')
                        ->where('data.profile.ktp', 'https://picsum.photos/500/250')
                        ->etc()
                    ->has('data.level')
                        ->where('data.level.id', 1)
                        ->where('data.level.name', 'standart')
                    ->has('data.status')
                        ->where('data.status.id', 3)
                        ->where('data.status.name', 'Accepted')
        );
    }
}
