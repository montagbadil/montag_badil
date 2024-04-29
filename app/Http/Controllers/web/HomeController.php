<?php

namespace App\Http\Controllers\web;

use App\Models\Brand;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\BrandAlternative;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('brands')->get();
        return view('web.pages.home', compact('categories'));
    }
    public function show($id)
    {
        $brand = Brand::with('brandAlternatives')->findOrFail($id);
        return view('web.pages.brand_details', compact('brand'));
    }
    public function showAlt($id)
    {
        $brand_alt = BrandAlternative::findOrFail($id);
        return view('web.pages.brand_alter_details', compact('brand_alt'));
    }
}
