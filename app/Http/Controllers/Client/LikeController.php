<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('client.likes.index' , [
            'categories' => Category::all(),
            'products' => auth()->user()->likes
        ]);
    }

    public function store(Request $request , Product $product)
    {
        auth()->user()->like($product);

        return response(['likes_count' => auth()->user()->likes()->count()] , 200);
    }

    public function destroy(Product $product)
    {
        auth()->user()->likes()->detach($product);

        Session::flash('delete_success' , 'Product has been removed from your wishlist successfully!');
        return back();
    }

}
