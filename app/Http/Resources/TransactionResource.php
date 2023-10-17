<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'invoce_number' => $this->invoce_number,
            'item_total_price' => $this->item_total_price,
            'item_total_net_price' => $this->item_total_net_price,
            'voucher_price' => $this->voucher_price,
            'amount' => $this->amount,
            'transaction_status' => new TransactionStatusResource($this->transactionStatus),
            'review' => new ReviewResource($this->whenLoaded('review')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
