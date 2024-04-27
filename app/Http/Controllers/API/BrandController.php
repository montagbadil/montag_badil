<?php

namespace App\Http\Controllers\API;

use App\Models\Brand;
use App\Trait\AHM_Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Brand\createRequest;
use App\Http\Requests\API\Brand\updateRequest;
use App\Http\Resources\API\BrandResource;


class BrandController extends Controller
{
    use AHM_Response;
    public function index()
    {
        if (Brand::exists()) {
            // $brands = Brand::with(['user', 'category', 'country','city'])->paginate();
            $brands = Brand::with(['user', 'category', 'country', 'city', 'brandAlternatives'])->get();
            // return $this->paginateResponse(BrandResource::collection($brands));
            return BrandResource::collection($brands);
        }
        return $this->NotFoundResponse();
    }
    public function show($id)
    {
        $brand = Brand::with(['user', 'category', 'country', 'city', 'brandAlternatives'])->find($id);
        if ($brand) {
            return $this->GetDataResponse(BrandResource::make($brand));
        }
        return $this->NotFoundResponse();
    }
    public function search($keyword)
    {
        if (Brand::exists()) {
            $brands = Brand::with(['user', 'category', 'country', 'city'])
                ->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('barcode', 'like', '%' . $keyword . '%')
                ->paginate();
            return $this->paginateResponse(BrandResource::collection($brands));
        }
        return $this->NotFoundResponse();
    }
    // public function store(createRequest $request)
    // {
    //     $data = $request->validated();

    //     $brand = Brand::create($data);

    //     $brand->update([
    //         'status'=>'pending'
    //     ]);

    //     if($request->hasFile('image')) {
    //         $brand->addMediaFromRequest('image')->toMediaCollection('brand');
    //     }

    //     if($brand) {
    //         return $this->CreateResponse(BrandResource::make($brand));
    //     }

    // }
    public function store(CreateRequest $request)
    {
        $data = $request->validated();

        $brand = Brand::create($data);

        $brand->update([
            'status' => 'pending'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('public','brand_image'); // This will store the image in the storage/app/brand directory

            // You can also specify a disk if you have multiple disks configured in your filesystems.php
            // $path = $image->store('brand', 'public'); // This will store the image in the storage/app/public/brand directory

            $brand->image = $path;
            $brand->save();
        }

        if ($brand) {
            return $this->createResponse(BrandResource::make($brand));
        }
    }
    public function update(updateRequest $request, $id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return $this->NotFoundResponse();
        }
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $brand->clearMediaCollection('brand');
            $brand->addMediaFromRequest('image')->toMediaCollection('brand');
        }

        $brand->update($data);
        return $this->UpdateResponse(BrandResource::make($brand));
    }
}
