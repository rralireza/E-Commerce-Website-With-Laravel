<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\FeaturedCategory;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index(Category $category)
    {
        return view('client.home' , [
            'categories' => Category::query()->where('category_id' , '=' ,null)->get(), //Just show the parent categories
            'brands' => Brand::all(),
            'products' => Product::all(),
            'slides' => Slider::all(),
            'featured' => FeaturedCategory::getCategory()
        ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
