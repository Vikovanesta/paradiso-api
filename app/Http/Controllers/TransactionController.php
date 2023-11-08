<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TransactionController extends Controller
{
    use HttpResponses;

    /**
     * Get transaction details.
     * 
     * @group Transaction
     * 
     * @authenticated
     */
    public function show(Request $request, Transaction $transaction)
    {
        Gate::authorize('view-transaction', $transaction);

        if (!$transaction) {
            return $this->error(null, 'Transaction not found', 404);
        }

        $transaction->load(
            'payments',
            'user',
            'items',
            'items.product',
        );

        return $this->success(new TransactionResource($transaction), 'Transaction retrieved successfully');
    }
}
