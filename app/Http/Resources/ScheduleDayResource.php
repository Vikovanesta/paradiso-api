<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleDayResource extends JsonResource
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
            'start_time' => $this->start_time->format('H:i'),
            'end_time' => $this->end_time->format('H:i'),
            'description' => $this->description,
        ];
    }
}
