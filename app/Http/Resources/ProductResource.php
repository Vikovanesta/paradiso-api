<?php

namespace App\Http\Resources;

use App\Models\Review;
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

        return array_merge(
            [
                'id' => $this->id,
                'name' => $this->name,
                'description' => $this->description,
                'start_date' => $this->start_date->format('d/m/Y'),
                'end_date' => $this->end_date->format('d/m/Y'),
                'price' => $this->price,
                'price_unit' => $this->price_unit,
                'stock' => $this->stock,
                'discount' => $this->discount,
                // 'category_specific_fields' => $this->getAllCategorySpecificFields(),
                
            ],
            $this->getAllCategorySpecificFields(),
            [
                'thumbnail' => $this->thumbnail,
                'post_code' => $this->postal_code,
                'address' => $this->address,
                'coordinate' => $this->coordinate,
                'note' => $this->note,
                'is_published' => $this->is_published,
                'average_rating' => round(Review::where('product_id', $this->id)->avg('rating'), 2),
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'sub_category' => new ProductSubCategoryResource($this->whenLoaded('productSubCategory')),
                'merchant' => new MerchantResource($this->whenLoaded('merchant')),
                'status' => new ProductStatusResource($this->whenLoaded('productStatus')),
                'city' => new CityResource($this->whenLoaded('city')),
                'district' => new DistrictResource($this->whenLoaded('district')),
                'schedules' => ScheduleResource::collection($this->whenLoaded('schedules')),
                'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),
                'include_excludes' => IncludeExcludeResource::collection($this->whenLoaded('includeExcludes')),
                'facilities' => FacilityResource::collection($this->whenLoaded('facilities')),
                'faqs' => FaqResource::collection($this->whenLoaded('faqs')),
                'terms' => TermResource::collection($this->whenLoaded('terms')),
                'images' => ProductImageResource::collection($this->whenLoaded('productImages')),
            ]
        );
    }
}
