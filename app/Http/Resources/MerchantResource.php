<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MerchantResource extends JsonResource
{
    /* *
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'logo' => $this->logo,
            'is_highlight' => $this->is_highlight,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => new UserResource($this->whenLoaded('user')),
            'profile' => new MerchantProfileResource($this->whenLoaded('merchantProfile')),
            'level' => new MerchantLevelResource($this->whenLoaded('merchantLevel')),
            'status' => new MerchantStatusResource($this->whenLoaded('merchantStatus')),
        ];
    }
}
