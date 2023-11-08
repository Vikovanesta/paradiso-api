<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'net_price' => $this->net_price,
            'price' => $this->price,
            'product_name' => $this->product_name,
            'product_description' => $this->product_description,
            'start_date' => $this->start_date->format('d/m/Y'),
            'end_date' => $this->end_date->format('d/m/Y'),
            'quantity' => $this->quantity,
            'note' => $this->note,
            'product' => new ProductResource($this->whenLoaded('product')),
            'transaction' => new TransactionResource($this->whenLoaded('transaction')),
            'status' => new ItemStatusResource($this->status),
        ];
    }
}
