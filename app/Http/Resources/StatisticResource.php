<?php

namespace App\Http\Resources;

use App\Models\Item;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // TODO: need confirmation
            'order_count_new' => Item::whereRelation('product', 'merchant_id', $this->id)
                                    ->where('status_id', 1)
                                    ->count(),
            // TODO: need confirmation
            'order_count_pending' => Item::whereRelation('product', 'merchant_id', $this->id)
                                    ->where('status_id', 1)
                                    ->count(),
            'review_count' => Review::whereRelation('product', 'merchant_id', $this->id)
                                    ->count(),
            'message_count_new' => 0, // TODO: Implement new message count. Make chat feature first
            'income' => 0, // TODO: Implement income. Need Confirmation
            'store_statistic' => new StatisticStoreResource($this),
            'product_statistic' => new StatisticProductResource($this),
            'transaction_statistic' => new StatisticTransactionResource($this),
        ];
    }
}
