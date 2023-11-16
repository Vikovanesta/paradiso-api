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
        $transactions = Transaction::whereHas('items', function ($query) {
            $query->whereHas('product', function ($query) {
                $query->where('merchant_id', $this->id);
            });
        })->get();

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
