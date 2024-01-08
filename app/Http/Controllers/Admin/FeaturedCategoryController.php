<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeaturedCategoryRequest;
use App\Models\Category;
use App\Models\FeaturedCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeaturedCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.featuredCategory.create' , [
            'featured' => FeaturedCategory::query()->first(),
            'categories' => Category::query()->where('category_id' , null)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeaturedCategoryRequest $request)
    {


        FeaturedCategory::query()->delete();

        FeaturedCategory::query()->create([
            'category_id' => $request->get('category_id')
        ]);

        Session::flash('success_message' , 'New featured category has created successfully!');
        return redirect(route('showFeaturedCategory'));
    }

    /**
     * Display the specified resource.
     */
    public function show(FeaturedCategory $featuredCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeaturedCategory $featuredCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeaturedCategory $featuredCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeaturedCategory $featuredCategory)
    {
        //
    }
}
