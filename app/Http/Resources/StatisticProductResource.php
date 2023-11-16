<?php

namespace App\Http\Resources;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $product_count = $this->products->count();
        $product_sold_count = Item::whereRelation('product', 'merchant_id', $this->id)
                                    ->whereRelation('transaction', 'transaction_status_id', 50)
                                    ->where('status_id', 2)
                                    ->sum('quantity');

        return [
            'product_count' => $product_count,
            'product_count_sold' => $product_sold_count,
            'product_view_count' => $this->products->sum(function ($product) {
                return $product->productviews->sum('count');
            }),
            'product_rating_avg' => $this->products->avg(function ($product) {
                return $product->reviews->avg('rating');
            }),
            'conversion_rate' => $product_count > 0 ? $product_sold_count / $product_count : 0,
        ];
    }
}
