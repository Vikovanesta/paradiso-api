<?php

namespace App\Http\Resources;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticTransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $query = $request->query();

        $transactions = Transaction::whereHas('items', function ($q) {
            $q->whereHas('product', function ($q) {
                $q->where('merchant_id', $this->id);
            });
        })
        ->when(isset($query['transaction_time_range']), function ($q) use ($query) {
            switch ($query['transaction_time_range']) {
                case 'today':
                    return $q->where('created_at', '>=', now()->subDays(1));
                    break;
                case 'week':
                    return $q->where('created_at', '>=', now()->subWeek());
                    break;
                case 'month':
                    return $q->where('created_at', '>=', now()->subMonth());
                    break;
                case 'year':
                    return $q->where('created_at', '>=', now()->subYear());
                    break;
            }
        })
        ->get();

        return [
            'transaction_count' => $transactions->count(),
            'transaction_count_success' => $transactions->where('transaction_status_id', 50)
                                                        ->count(),
            'transaction_count_pending' => $transactions->whereNotIn('transaction_status_id', [50, 90])
                                                        ->count(),
            'transaction_count_cancelled' => $transactions->where('transaction_status_id', 90)
                                                        ->count(),
        ];
    }
}
