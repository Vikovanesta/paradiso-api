<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoucherStoreRequest;
use App\Http\Requests\VoucherUpdateRequest;
use App\Http\Resources\VoucherResource;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{

    /**
     * Get a voycher detail
     *
     * @group Voucher
     * 
     * @authenticated
     */
    public function show(Voucher $voucher)
    {
        $voucher->load(['merchant']);

        return $this->success(new VoucherResource($voucher), 'Voucher detail');
    }
    
    /**
     * Create new voucher
     *
     * @group Voucher
     * 
     * @authenticated
     */
    public function store(VoucherStoreRequest $request) 
    {
        $request = $request->validated();

        Voucher::create($request);

        $voucher = Voucher::with(['voucherType', 'merchant'])
                    ->where('merchant_id', auth()->user()->merchant->id)
                    ->latest()
                    ->first();

        return $this->success(new VoucherResource($voucher), 'Voucher created successfully', 201);
    }

    /**
     * Update voucher
     *
     * @group Voucher
     * 
     * @authenticated
     */
    public function update(VoucherUpdateRequest $request, Voucher $voucher)
    {
        $request = $request->validated();

        $voucher->update($request);

        return $this->success(new VoucherResource($voucher), 'Voucher updated successfully');
    }
}
