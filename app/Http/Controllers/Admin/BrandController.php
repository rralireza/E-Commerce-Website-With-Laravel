<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use App\Http\Requests\NewBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brands.index' , [
            'brands' => Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewBrandRequest $request)
    {
        $path = $request->file('image')->storeAs('public/image' , $request->file('image')->getClientOriginalName());

        Brand::query()->create([
            'name' => $request->get('name'),
            'image' => $path
        ]);

        Session::flash('success_message' , 'New Brand created successfully!');
        return redirect( route('createBrand') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit' , [
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $path = $brand->image;

        if ($request->hasFile('image')) {
            $path = $request->file('image')
                ->storeAs('/public/image' , $request->file('image')->getClientOriginalName());
        }

        $brand->update([
            'name' => $request->get('name'),
            'image' => $path
        ]);

        Session::flash('success_update_message' , 'Brand is updated successfully!');
        return redirect( route('showBrands') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        Session::flash('success_delete_message' , 'Brand was deleted successfully!');
        return redirect(route('showBrands'));
    }
}
