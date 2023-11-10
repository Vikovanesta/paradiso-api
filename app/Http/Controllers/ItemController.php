<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ItemController extends Controller
{
    /**
     * Get order item details.
     * 
     * @group Order Item
     * 
     * @authenticated
     */
    public function show(Request $request, Item $item)
    {
        Gate::authorize('view-item', $item);

        $item->load(
            'product',
            'transaction',
        );

        return $this->success(new ItemResource($item), 'Item retrieved successfully');
    }

    /**
     * Update order item status.
     * 
     * @group Order Item
     * 
     * @authenticated
     */
    public function update(Request $request, Item $item)
    {
        Gate::authorize('update-item', $item);

        $validated = $request->validate([
            'status_id' => 'required|integer|in:2,3|exists:item_statuses,id',
        ]);

        $item->status_id = $validated['status_id'];

        return $this->success(new ItemResource($item), 'Item updated successfully');
    }
}
