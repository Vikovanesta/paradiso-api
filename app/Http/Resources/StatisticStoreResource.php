<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticStoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'order_count_regular' => 0, // TODO: Implement regular order count
            'message_count_responded' => 0, // TODO: Implement responded message count
            'message_count_replied' => 0, // TODO: Implement new message count
            'store_count_verified' => 0, // TODO: Implement verified store count
            'store_count_pinalty' => 0, // TODO: Implement pinalty store count
        ];
    }
}
