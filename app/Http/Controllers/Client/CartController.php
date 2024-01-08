<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        return view('client.carts.index' , [
            'categories' => Category::all(),
            'items' => Cart::getItems(),
            'totalAmount' => Cart::totalAmount(),
            'totalItems' => Cart::totalItems()
        ]);
    }

    public function storeCart(Request $request, Product $product)
    {
        Cart::new($product , $request);

        return response([
            'msg' => 'successful',
            'cart' => session()->get('cart')
        ], 200);
    }

    public function destroy(Product $product)
    {
        Cart::remove($product);

        return response([
            'msg' => 'removed',
            'cart' => Cart::getCart()
        ] , 200);
    }
}
