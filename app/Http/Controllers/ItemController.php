<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ItemController extends Controller
{
    public function show(Request $request, Item $item)
    {
        Gate::authorize('view-item', $item);

        $item->load(
            'product',
            'transaction',
        );

        return $this->success(new ItemResource($item), 'Item retrieved successfully');
    }
}
