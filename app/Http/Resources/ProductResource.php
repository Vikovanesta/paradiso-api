<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'description' => $this->description,
            'duration' => $this->duration,
            'start_date' => $this->start_date->format('d/m/Y'),
            'end_date' => $this->end_date->format('d/m/Y'),
            'price' => $this->price,
            'unit' => $this->unit,
            'discount' => $this->discount,
            'thumbnail' => $this->thumbnail,
            'address' => $this->address,
            'coordinate' => $this->coordinate,
            'max_person' => $this->max_person,
            'min_person' => $this->min_person,
            'note' => $this->note,
            'is_published' => $this->is_published,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'sub_category' => new ProductSubCategoryResource($this->whenLoaded('productSubCategory')),
            'merchant' => new MerchantResource($this->whenLoaded('merchant')),
            'status' => new ProductStatusResource($this->whenLoaded('productStatus')),
            'city' => new CityResource($this->whenLoaded('city')),
            'schedules' => ScheduleResource::collection($this->whenLoaded('schedules')),
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),
            'include_excludes' => IncludeExcludeResource::collection($this->whenLoaded('includeExcludes')),
            'facilities' => FacilityResource::collection($this->whenLoaded('facilities')),
            'faqs' => FaqResource::collection($this->whenLoaded('faqs')),
            'terms' => TermResource::collection($this->whenLoaded('terms')),
            'images' => ProductImageResource::collection($this->whenLoaded('productImages')),
        ];
    }
}
