<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index' , [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create' , [
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewProductRequest $request)
    {
        $path = $request->file('image')->storeAs('/public/productsImage' , $request->file('image')->getClientOriginalName());

        Product::query()->create([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'cost' => $request->get('cost'),
            'category_id' => $request->get('category_id'),
            'brand_id' => $request->get('brand_id'),
            'description' => $request->get('description'),
            'image' => $path
        ]);

        Session::flash('success_message' , 'New Product Created Successfully!');
        return redirect(route('createProduct'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit' , [
            'product' => $product,
            'brands' => Brand::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $isNameUsed = Product::query()->where('name' , $request->get('name'))
            ->where('id' , '!=' , $product->id)
            ->exists();

        if ($isNameUsed) {
            return back()->withErrors(['This name has already been taken.']);
        }

        $isSlugUsed = Product::query()->where('slug' , $request->get('slug'))
            ->where('id' , '!=' , $product->id)
            ->exists();

        if ($isSlugUsed) {
            return back()->withErrors(['This slug has already been taken.']);
        }

        $path = $product->image;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->storeAs('/public/productsImage' , $request->file('image')->getClientOriginalName());
        }
        //Second parameters of get method of $request called a default value
        $product->update([
            'name' => $request->get('name' , $product->name),
            'slug' => $request->get('slug' , $product->slug),
            'cost' => $request->get('cost' , $product->cost),
            'description' => $request->get('description' , $product->description),
            'category_id' => $request->get('category_id' , $product->category_id),
            'brand_id' => $request->get('brand_id' , $product->brand_id),
            'image' => $path
        ]);
        Session::flash('success_update_message' , 'Product has updated successfully!');
        return redirect(route('showProducts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Session::flash('success_delete_message' , 'Product has deleted successfully!');
        return redirect(route('showProducts'));
    }
}
