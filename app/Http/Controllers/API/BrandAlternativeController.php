<?php

namespace App\Http\Controllers\API;

use App\Trait\AHM_Response;
use App\Models\BrandAlternative;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\BrandAlternativeResource;
use App\Http\Requests\API\BrandAlternative\createRequest;
use App\Http\Requests\API\BrandAlternative\updateRequest;


class BrandAlternativeController extends Controller
{
    use AHM_Response;
    public function index()
    {
        if (BrandAlternative::exists()) {
            $brands = BrandAlternative::with(['user', 'category', 'country','city'])->paginate();
            return $this->paginateResponse(BrandAlternativeResource::collection($brands));
        }
        return $this->NotFoundResponse();
    }
    public function show($id)
    {
        $brand = BrandAlternative::with(['user', 'category', 'country','city'])->find($id);
        if ($brand) {
            return $this->GetDataResponse(BrandAlternativeResource::make($brand));
        }
        return $this->NotFoundResponse();
    }
    public function search($keyword)
    {
        if (BrandAlternative::exists()) {
            $brands = BrandAlternative::with(['user', 'category', 'country','city'])
                ->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('barcode', 'like', '%' . $keyword . '%')
                ->paginate();
            return $this->paginateResponse(BrandAlternativeResource::collection($brands));
        }
        return $this->NotFoundResponse();
    }
    public function store(createRequest $request)
    {
        $data = $request->validated();
        
        $brand = BrandAlternative::create($data);

        $brand->update([
            'status'=>'pending'
        ]);

        // if($request->hasFile('image')) {
        //     $brand->addMediaFromRequest('image')->toMediaCollection('brand_alternative');
        // }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('public','brand_alternative_image'); // This will store the image in the storage/app/brand directory

            // You can also specify a disk if you have multiple disks configured in your filesystems.php
            // $path = $image->store('brand', 'public'); // This will store the image in the storage/app/public/brand directory

            $brand->image = $path;
            $brand->save();
        }

        if($brand) {
            return $this->CreateResponse(BrandAlternativeResource::make($brand));
        }
        
    }
    public function update(updateRequest $request, $id)
    {
        $brand = BrandAlternative::find($id);
        if(!$brand) {
            return $this->NotFoundResponse();
        }
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $brand->clearMediaCollection('brand');
            $brand->addMediaFromRequest('image')->toMediaCollection('brand_alternative');
        }

        $brand->update($data);
        return $this->UpdateResponse(BrandAlternativeResource::make($brand));
    }
}
