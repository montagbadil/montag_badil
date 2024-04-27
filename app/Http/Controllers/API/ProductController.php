<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Trait\AHM_Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Product\createRequest;
use App\Http\Requests\API\Product\updateRequest;
use App\Http\Resources\API\ProductResource;

class ProductController extends Controller
{
    use AHM_Response;
    public function index()
    {
        if (Product::exists()) {
            $products = Product::with(['user','brand','productAlternatives'])->paginate();
            return $this->paginateResponse(ProductResource::collection($products));
        }
        return $this->NotFoundResponse();
    }
    public function show($id)
    {
        $product = Product::with(['user','brand','productAlternatives'])->find($id);
        if ($product) {
            return $this->GetDataResponse(ProductResource::make($product));
        }
        return $this->NotFoundResponse();
    }
    public function search($keyword)
    {
        if (Product::exists()) {
            $products = Product::with(['user','brand'])
                ->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('barcode', 'like', '%' . $keyword . '%')
                ->paginate(config('abdo_constant.PAGINATE'));
            return $this->paginateResponse(ProductResource::collection($products));
        }
        return $this->NotFoundResponse();
    }
    public function store(createRequest $request)
    {
        $data = $request->validated();
        
        $product = Product::create($data);

        $product->update([
            'status'=>'pending'
        ]);

        // if($request->hasFile('image')) {
        //     $product->addMediaFromRequest('image')->toMediaCollection('product');
        // }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('public','product_image'); // This will store the image in the storage/app/brand directory

            // You can also specify a disk if you have multiple disks configured in your filesystems.php
            // $path = $image->store('brand', 'public'); // This will store the image in the storage/app/public/brand directory

            $product->image = $path;
            $product->save();
        }

        if($product) {
            return $this->CreateResponse(ProductResource::make($product));
        }
    }
    public function update(updateRequest $request,$id)
    {
        $product = Product::find($id);
        if(!$product) {
            return $this->NotFoundResponse();
        }
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $product->clearMediaCollection('product');
            $product->addMediaFromRequest('image')->toMediaCollection('product');
        }

        $product->update($data);
        return $this->UpdateResponse(ProductResource::make($product));
    }
}
