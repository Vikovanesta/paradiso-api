<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            'province_id' => $this->province_id,
            'name' => $this->name,
            'image' =>$this->image,
            'is_highlighted' => $this->is_highlighted,
            'province' => new ProvinceResource($this->whenLoaded('province')),
            'districts' => DistrictResource::collection($this->whenLoaded('districts')),
        ];
    }
}
