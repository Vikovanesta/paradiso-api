<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->load(['sender']);

        return [
            'id' => $this->id,
            'message' => $this->message,
            'is_read' => $this->is_read,
            'read_at' => $this->read_at,
            'created_at' => $this->created_at,
            'sender' => [
                'id' => $this->sender->id,
                'name' => $this->sender->name,
            ],
            'chat_room' => new ChatRoomResource($this->whenLoaded('chatRoom')),
        ];
    }
}
