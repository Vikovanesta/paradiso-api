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
            'invoice_number' => $this->invoice_number,
            'item_total_price' => $this->item_total_price,
            'item_total_net_price' => $this->item_total_net_price,
            'total_voucher_price' => $this->voucher_price,
            'amount' => $this->amount,
            'status' => new TransactionStatusResource($this->transactionStatus),
            'user' => new UserResource($this->whenLoaded('user')),
            'payments' => PaymentResource::collection($this->whenLoaded('payments')),
        ];
    }
}
