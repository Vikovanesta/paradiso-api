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
        $query = $request->query();

        $subdays = 0;
        if (isset($query['product_time_range'])) {
            switch ($query['product_time_range']) {
                case 'today':
                    $subdays = 1;
                    break;
                case 'week':
                    $subdays = 7;
                    break;
                case 'month':
                    $subdays = 30;
                    break;
                case 'year':
                    $subdays = 365;
                    break;
            }
        }

        $products = $this->products
                    ->when(isset($query['product_time_range']), function ($q) use ($subdays) {
                        return $q->where('created_at', '>=', now()->subDays($subdays));
                    });

        $product_count = $products->count();
        $product_sold_count = Item::whereRelation('product', 'merchant_id', $this->id)
                            ->whereRelation('transaction', 'transaction_status_id', 50)
                            ->where('status_id', 2)
                            ->when(isset($query['product_time_range']), function ($q) use ($subdays) {
                                return $q->where('created_at', '>=', now()->subDays($subdays));
                            })
                            ->sum('quantity');
        $product_view_count =   $products->sum(function ($product) use ($subdays, $query) {
            return $product->productviews
                ->when(isset($query['product_time_range']), function ($q) use ($subdays) {
                    return $q->where('created_at', '>=', now()->subDays($subdays));
                })
                ->sum('count');
        });

        $product_rating_avg = $products->avg(function ($product) use($query, $subdays) {
            return $product->reviews
            ->when(isset($query['product_time_range']), function ($q) use ($subdays) {
                return $q->where('created_at', '>=', now()->subDays($subdays));
            })
            ->avg('rating');
        });

        return [
            'product_count' => $product_count,
            'product_count_sold' => $product_sold_count,
            'product_view_count' => $product_view_count,
            'product_rating_avg' => round($product_rating_avg, 2),
            'conversion_rate' => $product_count > 0 ? round($product_sold_count / $product_view_count, 2) : 0,
        ];
    }
}
