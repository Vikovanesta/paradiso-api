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

        $response = $this->actingAs($user)->get('/api/merchants/1');

        $response->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', 1)
                    ->where('data.name', 'merchant')
                    ->where('data.ktp', '1234567890123456')
                    ->where('data.npwp', null)
                    ->where('data.siup', null)
                    ->has('data.profile')
                        ->where('data.profile.id', 1)
                        ->where('data.profile.address', 'Jl. Test')
                        ->where('data.profile.description', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.')
                        ->where('data.profile.logo', 'logo.png')
                        ->where('data.profile.banner', 'banner.png')
                    ->has('data.level')
                        ->where('data.level.id', 1)
                        ->where('data.level.name', 'standart')
                    ->has('data.status')
                        ->where('data.status.id', 3)
                        ->where('data.status.name', 'Accepted')
        );
    }
}
