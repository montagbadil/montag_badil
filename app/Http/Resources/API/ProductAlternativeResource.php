<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductAlternativeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'product_name'=>$this->name,
            'product_description'=>$this->description,
            'product_additional_notes'=>$this->notes,
            'product_barcode'=>$this->barcode,
            'status'=>$this->status,
            'product_logo' => $this->getFirstMediaUrl('product_alternative'),
            'user'=>UserResource::make($this->whenLoaded('user')),
            'brand'=>CategoryResource::make($this->whenLoaded('brand')),
        ];
    }
}
