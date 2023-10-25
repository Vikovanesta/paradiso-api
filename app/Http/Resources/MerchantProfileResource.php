<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MerchantProfileResource extends JsonResource
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
            'description' => $this->description,
            'address' => $this->address,
            'banner' => $this->banner,
            'ktp_number' => $this->ktp_number,
            'npwp_number' => $this->npwp_number,
            'siup_number' => $this->siup_number,
            'ktp' => $this->ktp,
            'npwp' => $this->npwp,
            'siup' => $this->siup,
            'merchant' => new MerchantResource($this->whenLoaded('merchant')),
        ];
    }
}
