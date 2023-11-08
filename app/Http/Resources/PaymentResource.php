<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'payment_order' => $this->payment_order,
            'amount' => $this->amount,
            'due_date' => $this->due_date->format('d/m/Y'),
            'response' => $this->response,
            'payment_token' => $this->payment_token,
            'created_at' => $this->created_at->format('d/m/Y H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y H:i:s'),
            'status' => new PaymentStatusResource($this->paymentStatus),
        ];
    }
}
