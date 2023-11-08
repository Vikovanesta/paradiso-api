<?php

namespace App\Http\Controllers;

use App\Http\Requests\MerchantUpdateRequest;
use App\Http\Resources\MerchantResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\TransactionResource;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\Transaction;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MerchantController extends Controller
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
     * Get all merchant's products.
     * 
     * @group Product
     * 
     * @authenticated
     */
    public function productIndex(Request $request, $id)
    {
        $pageSize = $request->query('page_size', 15);
        $products = Product::where('merchant_id', $id)->paginate($pageSize);

        return $this->success(ProductResource::collection($products), 'Products retrieved successfully');
    }

    /**
     * Get all merchant's transactions.
     * 
     * @group Transaction
     * 
     * @authenticated
     */
    public function transactionIndex(Request $request)
    {
        $pageSize = $request->query('page_size', 15);
        $transactions = Transaction::where('user_id', Auth::user()->id)->orderByDesc('updated_at')->paginate($pageSize);

        return $this->success(TransactionResource::collection($transactions), 'Transactions retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Get merchant profile
     * 
     * @group Merchant
     * 
     * @authenticated
     */
    public function show(Merchant $merchant)
    {
        $merchant = Merchant::with(
            'merchantProfile',
            'merchantLevel',
            'merchantStatus',
        )->find($merchant->id);

        return $this->success(new MerchantResource($merchant), 'Merchant profile retrieved successfully');
    }

    /**
     * Update merchant profile
     * 
     * @group Merchant
     * 
     * @authenticated
     */
    public function update(MerchantUpdateRequest $request)
    {
        
        $validated = $request->validated();

        $merchant = $request->user()->merchant;

        if (isset($validated['logo'])) {
            $logo = $validated['logo'];
            $directory = 'merchants/logo/';
            $logo->storeAs($directory, $logo->hashName(), 'google');
            $logo_url = config('app.url') . '/img/' . $directory . $logo->hashName();

            Storage::disk('google')->delete($directory . basename($merchant->logo));

            $merchant->update([
                'logo' => $logo_url,
            ]);
        }

        if (isset($validated['banner'])) {
            $banner = $validated['banner'];
            $directory = 'merchants/banners/';
            $banner->storeAs($directory, $banner->hashName());
            $banner_url = config('app.url') . '/img/' . $directory . $banner->hashName();

            Storage::disk('google')->delete($directory . basename($merchant->banner));

            $merchant->merchantProfile()->update([
                'banner' => $banner_url,
            ]);
        }


        DB::transaction(function () use ($merchant, $validated) {
            $merchant->update([
                'name' => $validated['name'] ?? $merchant->name,
                'is_highlight' => $validated['is_highlight'] ?? $merchant->is_highlight,
                'notes' => $validated['notes'] ?? $merchant->notes,
            ]);

            $merchant->merchantProfile()->update([
                'address' => $validated['address'] ?? $merchant->merchantProfile->address,
                'description' => $validated['description'] ?? $merchant->merchantProfile->description,
                'ktp_number' => $validated['ktp_number'] ?? $merchant->merchantProfile->ktp_number,
                'npwp_number' => $validated['npwp_number'] ?? $merchant->merchantProfile->npwp_number,
                'siup_number' => $validated['siup_number'] ?? $merchant->merchantProfile->siup_number,
            ]);
        });

        $merchant = Merchant::with(
            'merchantProfile',
            'merchantLevel',
            'merchantStatus',
        )->find($merchant->id);

        return $this->success(new MerchantResource($merchant) ,'Merchant profile updated successfully', 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchant $merchant)
    {
        //
    }
}
