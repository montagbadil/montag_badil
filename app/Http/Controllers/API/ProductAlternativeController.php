<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ProductAlternative\createRequest;
use App\Http\Requests\API\ProductAlternative\updateRequest;
use App\Http\Resources\API\ProductAlternativeResource;
use App\Models\ProductAlternative;
use App\Trait\AHM_Response;

class ProductAlternativeController extends Controller
{
    use AHM_Response;
    public function index()
    {
        if (ProductAlternative::exists()) {
            $products = ProductAlternative::with(['user','brand'])->paginate();
            return $this->paginateResponse(ProductAlternativeResource::collection($products));
        }
        return $this->NotFoundResponse();
    }
    public function show($id)
    {
        $product = ProductAlternative::with(['user','brand'])->find($id);
        if ($product) {
            return $this->GetDataResponse(ProductAlternativeResource::make($product));
        }
        return $this->NotFoundResponse();
    }
    public function search($keyword)
    {
        if (ProductAlternative::exists()) {
            $products = ProductAlternative::with(['user','brand'])
                ->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('barcode', 'like', '%' . $keyword . '%')
                ->paginate();
            return $this->paginateResponse(ProductAlternativeResource::collection($products));
        }
        return $this->NotFoundResponse();
    }
    public function store(createRequest $request)
    {
        $data = $request->validated();
        
        $product = ProductAlternative::create($data);

        $product->update([
            'status'=>'pending'
        ]);

        // if($request->hasFile('image')) {
        //     $product->addMediaFromRequest('image')->toMediaCollection('product_alternative');
        // }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('public','product_alternative_image'); // This will store the image in the storage/app/brand directory

            // You can also specify a disk if you have multiple disks configured in your filesystems.php
            // $path = $image->store('brand', 'public'); // This will store the image in the storage/app/public/brand directory

            $product->image = $path;
            $product->save();
        }

        if($product) {
            return $this->CreateResponse(ProductAlternativeResource::make($product));
        }
    }
    public function update(updateRequest $request,$id)
    {
        $product = ProductAlternative::find($id);
        if(!$product) {
            return $this->NotFoundResponse();
        }
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $product->clearMediaCollection('product_alternative');
            $product->addMediaFromRequest('image')->toMediaCollection('product_alternative');
        }

        $product->update($data);
        return $this->UpdateResponse(ProductAlternativeResource::make($product));
    }
}
