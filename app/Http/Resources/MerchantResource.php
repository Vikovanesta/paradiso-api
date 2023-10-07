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
            'ktp' =>$this ->ktp,
            'npwp' =>$this ->npwp,
            'siup' =>$this ->siup,
            'status' =>$this ->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'merchant_level' => new MerchantLevelResource($this->whenLoaded('merchantLevel')),
            'merchant_profile' => new MerchantProfileResource($this->whenLoaded('merchantProfile')),
        ];
    }
}
