<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ClientProductController extends Controller
{
    public function show(Product $product)
    {
        return view('client.products.show' , [
            'categories' => Category::query()->where('category_id' , '=' , null)->get(),
            'product' => $product
        ]);
    }
}
