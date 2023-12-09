<?php

namespace Tests\Feature;

use App\Models\Merchant;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use Carbon\Carbon;

class MerchantTest extends TestCase
{

    
    public function test_update_merchant_detail_success()
    {
        Carbon::setTestNow(now());
        Storage::fake('local');

        $user = User::find(8);
        $merchant = $user->merchant;

        $logo = UploadedFile::fake()->image('logo.jpg');
        $banner = UploadedFile::fake()->image('banner.jpg');

        $response = $this->actingAs($user)->put('/api/v1/merchants', [
            'name' => 'merchant 2',
            'notes' => 'New merchant notes',
            'address' => 'New merchant address',
            'description' => 'New merchant description',
            'ktp_number' => '1234567890123456',
            'npwp_number' => '123456789012345',
            'siup_number' => '1234567890123',
            'logo' => $logo,
            'banner' => $banner,
        ]);

        $merchant->refresh();

        $response->assertStatus(201)
            ->assertJson([
                'status' => true,
                'message' => 'Merchant profile updated successfully',
                'data' => [
                    'name' => 'merchant 2',
                    'is_highlight' => $merchant->is_highlight,
                    'logo' => 'https://127.0.0.1:8000/storage/merchants/logo/' . $logo->hashName(),
                    'notes' => 'New merchant notes',
                    'profile' => [
                        'address' => 'New merchant address',
                        'description' => 'New merchant description',
                        'ktp_number' => '1234567890123456',
                        'npwp_number' => '123456789012345',
                        'siup_number' => '1234567890123',
                    ],
                ],
            ]);

        $this->assertEquals('merchant 2', $merchant->name);
        $this->assertEquals('New merchant notes', $merchant->notes);
        $this->assertEquals('New merchant address', $merchant->merchantProfile->address);
        $this->assertEquals('New merchant description', $merchant->merchantProfile->description);
        $this->assertEquals('1234567890123456', $merchant->merchantProfile->ktp_number);
        $this->assertEquals('123456789012345', $merchant->merchantProfile->npwp_number);
        $this->assertEquals('1234567890123', $merchant->merchantProfile->siup_number);

        Storage::disk('local')->assertExists('public/merchants/logo/' . $logo->hashName());
        Storage::disk('local')->assertExists('public/merchants/banners/' . $banner->hashName());

        Carbon::setTestNow();
    }

    public function test_update_merchant_detail_without_logo_and_banner_success()
    {
        $user = User::find(8);
        $merchant = $user->merchant;

        $response = $this->actingAs($user)->put('/api/v1/merchants', [
            'name' => 'merchant 2',
            'notes' => 'New merchant notes',
            'address' => 'New merchant address',
            'description' => 'New merchant description',
            'ktp_number' => '1234567890123456',
            'npwp_number' => '123456789012345',
            'siup_number' => '1234567890123',
        ]);

        $merchant->refresh();

        $response->assertStatus(201)
            ->assertJson([
                'status' => true,
                'message' => 'Merchant profile updated successfully',
                'data' => [
                    'name' => 'merchant 2',
                    'is_highlight' => $merchant->is_highlight,
                    'notes' => 'New merchant notes',
                    'profile' => [
                        'address' => 'New merchant address',
                        'description' => 'New merchant description',
                        'ktp_number' => '1234567890123456',
                        'npwp_number' => '123456789012345',
                        'siup_number' => '1234567890123',
                    ],
                ],
            ]);

        $this->assertEquals('merchant 2', $merchant->name);
        $this->assertEquals('New merchant notes', $merchant->notes);
        $this->assertEquals('New merchant address', $merchant->merchantProfile->address);
        $this->assertEquals('New merchant description', $merchant->merchantProfile->description);
        $this->assertEquals('1234567890123456', $merchant->merchantProfile->ktp_number);
        $this->assertEquals('123456789012345', $merchant->merchantProfile->npwp_number);
        $this->assertEquals('1234567890123', $merchant->merchantProfile->siup_number);
    }

    public function test_get_merchant_detail_success()
    {
        $user = User::find(8);
        $merchant = $user->merchant;

        $response = $this->actingAs($user)->get('/api/v1/merchants/me');

        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
                'data' => [
                    'id' => $merchant->id,
                    'name' => $merchant->name,
                    'logo' => $merchant->logo,
                    'is_highlight' => $merchant->is_highlight,
                    'notes' => $merchant->notes,
                    'profile' => [
                        'id' => $merchant->merchantProfile->id,
                        'description' => $merchant->merchantProfile->description,
                        'address' => $merchant->merchantProfile->address,
                        'banner' => $merchant->merchantProfile->banner,
                        'ktp_number' => $merchant->merchantProfile->ktp_number,
                        'npwp_number' => $merchant->merchantProfile->npwp_number,
                        'siup_number' => $merchant->merchantProfile->siup_number,
                        'ktp' => $merchant->merchantProfile->ktp,
                        'npwp' => $merchant->merchantProfile->npwp,
                        'siup' => $merchant->merchantProfile->siup,
                    ],
                    'level' => [
                        'id' => $merchant->merchantLevel->id,
                        'name' => $merchant->merchantLevel->name,
                        'icon' => $merchant->merchantLevel->icon,
                    ],
                    'status' => [
                        'id' => $merchant->merchantStatus->id,
                        'name' => $merchant->merchantStatus->name,
                        'icon' => $merchant->merchantStatus->icon,
                        'color' => $merchant->merchantStatus->color,
                    ],
                ],
            ]);
    }

    public function test_get_merchant_detail_unauthorized()
    {
        $user = User::find(7);

        $response = $this->actingAs($user)->get('/api/v1/merchants/me');

        $response->assertStatus(401)
            ->assertJson([
                'status' => false,
                'message' => 'Unauthorized',
                'data' => null,
            ]);
    }
}
