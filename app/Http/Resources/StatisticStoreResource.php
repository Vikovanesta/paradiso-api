<?php

namespace App\Http\Resources;

use App\Models\Item;
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
        $query = $request->query();

        $items = Item::whereRelation('product', 'merchant_id', $this->id)
                    ->when(isset($query['order_item_time_range']), function ($q) use ($query) {
                        switch ($query['order_item_time_range']) {
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
        
        $chatRooms = $this->user->chatRooms
                    ->when(isset($query['chat_time_range']), function ($q) use ($query) {
                        switch ($query['chat_time_range']) {
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
                    });

        return [
            'order_count_processed' => $items->filter(function ($item) {
                return $item->status_id == 2 || $item->status_id == 3;
            })->count(),
            'order_count_total' => $items->count(),
            'chat_count_replied' => $chatRooms->filter(function ($chatRoom) {
                return $chatRoom->messages
                        ->where('sender_id', $this->user->id)
                        ->count() > 0;
            })->count(),
            'chat_count_total' => $chatRooms->count(),
            'store_count_verified' => 'in progress', // TODO: Implement verified store count
            'store_count_penalty' => 'in progress', // TODO: Implement penalty store count
        ];
    }
}
