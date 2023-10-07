<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductSubCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $productCategory = $this->whenLoaded('productCategory');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'icon' => $this->icon,
            'product_category' => new ProductCategoryResource($this->productCategory),
        ];
    }
}
