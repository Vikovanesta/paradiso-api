<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
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
            'date' => $this->date->format('d/m/Y'),
            'title' => $this->title,
            'schedule_days' => ScheduleDayResource::collection($this->scheduleDays),
        ];
    }
}
