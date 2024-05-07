<?php

namespace App\Http\Controllers\web;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\BrandAlternative;
use App\Mail\web\ContactFormMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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
    public function aboutPage() {
        return view('web.pages.about');
    }
    public function contactPage() {
        return view('web.pages.contact');
    }
    public function sendMessage(Request $request)
    {
        $formData = [
            'Name' => $request->input('name'),
            'Email' => $request->input('email'),
            'Phone' => $request->input('phone'),
            'Message' => $request->input('message'),
        ];
    
        Mail::to('admin@gmail.com')->send(new ContactFormMail($formData));
    
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
