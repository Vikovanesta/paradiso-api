<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VoucherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'nominal' => $this->nominal,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'min_transaction' => $this->min_transaction,
            'max_discount' => $this->max_discount,
            'quota' => $this->quota,
            'voucher_type' => new VoucherTypeResource($this->voucherType),
            'merchant' => new MerchantResource($this->whenLoaded('merchant')),
            'transactions' => TransactionResource::collection($this->whenLoaded('transactions')),
            'items' => ItemResource::collection($this->whenLoaded('items')),
        ];
    }
}
