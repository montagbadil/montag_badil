<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandAlternativeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'brand_name'=>$this->name,
            'brand_founder'=>$this->founder,
            'brand_owner'=>$this->owner,
            'brand_year_founderd'=>$this->year,
            'brand_website_url'=>$this->url,
            'brand_description'=>$this->description,
            'brand_parent_company'=>$this->parent_company,
            'brand_industry'=>$this->industry,
            'brand_additional_notes'=>$this->notes,
            'brand_barcode'=>$this->barcode,
            'status'=>$this->status,
            // 'brand_logo' => $this->getFirstMediaUrl('brand_alternative'),
            'brand_logo' => Storage::disk('public')->url($this->image),
            'user'=>UserResource::make($this->whenLoaded('user')),
            'brand_origin_country'=>CountryResource::make($this->whenLoaded('country')),
            'city'=>CityResource::make($this->whenLoaded('city')),
            'category'=>CategoryResource::make($this->whenLoaded('category')),
        ];
    }
    protected function formatBirthDate($birth)
    {
        if ($birth instanceof Carbon) {
            return $birth->format('d-m-Y');
        }
        return Carbon::createFromFormat('Y-m-d', $birth)->format('d-m-Y');
    }
}
