<?php

namespace App\Http\Resources;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatRoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'messages' => MessageResource::collection($this->whenLoaded('messages', function () {
                return $this->messages->sortByDesc('created_at');
            })),
            'new_message_count' => $this->messages->where('is_read', false)->where('sender_id', '!=', $request->user()->id)->count(),
            'participants' => $this->whenLoaded('users', function () {
                return $this->users->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'name' => $user->name,
                        'user_level' => $user->user_level,
                    ];
                });
            }),
            'latest_message' => new MessageResource($this->messages->sortByDesc('created_at')->first()),
        ];
    }
}
