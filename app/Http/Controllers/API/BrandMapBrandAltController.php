<?php

namespace App\Http\Controllers\API;

use App\Models\Brand;
use App\Models\BrandAlternative;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\BrandMapBrandAlt\storeRequest;

class BrandMapBrandAltController extends Controller
{
    public function store(storeRequest $request)
    {
        $brand = Brand::find($request->brand_id);
        if (!$brand->is_alternative) {
            // $alternativeIds = $request->alternative_id;
            $brandAlternative = BrandAlternative::where('id', $request->alternative_id)->first();
            // $brandAlternativeIds = $brandAlternatives->pluck('id')->toArray();
            $brand->brandAlternatives()->attach($brandAlternative);
            return response()->json([
                'message' => 'Brand and BrandAlternatives synced successfully',
                'data' => [],
                'status' => true,
                'code' => 201
            ], 201);
        }

        return response()->json([
            'message' => 'Fail',
            'data' => [],
            'status' => false,
            'code' => 400
        ], 400);
    }
}
