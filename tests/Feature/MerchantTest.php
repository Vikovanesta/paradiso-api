<?php

namespace Tests\Feature;

use App\Models\Merchant;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class MerchantTest extends TestCase
{
    
    public function test_get_merchant_detail_success(): void
    {
        $user = User::where('email', 'merchant@mail.com')->first();
        $merchantId = $user->merchant->id;

        $response = $this->actingAs($user)->get('/api/v1/merchants/' . $merchantId);

        $merchant = Merchant::with('merchantProfile', 'merchantLevel', 'merchantStatus')->find($merchantId);

        $response->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $merchant->id)
                    ->where('data.name', $merchant->name)
                    ->where('data.logo', $merchant->logo)
                    ->where('data.is_highlight', $merchant->is_highlight)
                    ->where('data.notes', $merchant->notes)
                    ->has('data.profile')
                        ->where('data.profile.id', $merchant->merchantProfile->id)
                        ->where('data.profile.description', $merchant->merchantProfile->description)
                        ->where('data.profile.address', $merchant->merchantProfile->address)
                        ->where('data.profile.banner', $merchant->merchantProfile->banner)
                        ->where('data.profile.ktp_number', $merchant->merchantProfile->ktp_number)
                        ->where('data.profile.ktp', $merchant->merchantProfile->ktp)
                    ->has('data.level')
                        ->where('data.level.id', $merchant->merchantLevel->id)
                    ->has('data.status')
                        ->where('data.status.id', $merchant->merchantStatus->id)
        );
    }

    public function test_update_merchant_detail_success(): void
    {
        $user = User::where('id', 2)->first();
        $merchantId = $user->merchant->id;
        $oldMerchant = Merchant::with('merchantProfile', 'merchantLevel', 'merchantStatus')->find($merchantId);

        // Update merchant
        $logoFile = UploadedFile::fake()->image('logo.png');
        $bannerFile = UploadedFile::fake()->image('banner.png');
        $newMerchant = [
            'name' => 'Merchant 1',
            'is_highlight' => 1,
            'notes' => 'Lorem ipsum dolor sit amet',
            'address' => 'Jl. Raya Kebayoran Lama No. 12',
            'description' => 'Lorem ipsum dolor sit amet',
            'ktp_number' => '1234567890123456',
            'npwp_number' => '123456789012345',
            'siup_number' => '1234567890123',
            'logo' => $logoFile,
            'banner' => $bannerFile,
        ];
        $response = $this->actingAs($user)->put('/api/v1/merchants', $newMerchant);
        $merchant = Merchant::with('merchantProfile', 'merchantLevel', 'merchantStatus')->find($merchantId);

        // Check file in storage
        Storage::assertExists('public/merchants/logo/' . $logoFile->hashName());
        Storage::assertExists('public/merchants/banner/' . $bannerFile->hashName());

        if ($oldMerchant->logo !== $merchant->logo) {
            Storage::assertMissing('public' . (str_replace(url('/storage'), '', $oldMerchant->logo)));
        }

        if ($oldMerchant->merchantProfile->banner !== $merchant->merchantProfile->banner) {
            Storage::assertMissing('public' . (str_replace(url('/storage'), '', $oldMerchant->merchantProfile->banner)));
        }

        // Check response
        $response->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $merchant->id)
                    ->where('data.name', $newMerchant['name'])
                    ->where('data.logo', $merchant->logo)
                    ->where('data.is_highlight', $newMerchant['is_highlight'])
                    ->where('data.notes', $newMerchant['notes'])
                    ->has('data.profile')
                        ->where('data.profile.id', $merchant->merchantProfile->id)
                        ->where('data.profile.description', $newMerchant['description'])
                        ->where('data.profile.address', $newMerchant['address'])
                        ->where('data.profile.banner', $merchant->merchantProfile->banner)
                        ->where('data.profile.ktp_number', $newMerchant['ktp_number'])
                        ->where('data.profile.ktp', $merchant->merchantProfile->ktp)
                        ->etc()
                    ->has('data.level')
                        ->where('data.level.id', $merchant->merchantLevel->id)
                    ->has('data.status')
                        ->where('data.status.id', $merchant->merchantStatus->id)
        );
    }
}
