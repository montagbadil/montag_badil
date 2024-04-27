<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'product_name'=>$this->name,
            'product_description'=>$this->description,
            'product_additional_notes'=>$this->notes,
            'isAlternative'=>$this->is_alternative,
            'product_barcode'=>$this->barcode,
            'status'=>$this->status,
            'product_logo' => $this->getFirstMediaUrl('product'),
            'user'=>UserResource::make($this->whenLoaded('user')),
            'brand'=>CategoryResource::make($this->whenLoaded('brand')),
            'productAlternatives'=>ProductAlternativeResource::collection($this->whenLoaded('productAlternatives')),

        ];
    }
}
