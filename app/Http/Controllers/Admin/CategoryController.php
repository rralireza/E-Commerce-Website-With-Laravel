<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function view;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index' , [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create' , [
            'categories' => Category::all(),
            'properties' => PropertyGroup::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewCategoryRequest $request)
    {
        $category = Category::query()->create([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'category_id' => $request->get('category_id')
        ]);

        $category->propertyGroups()->attach($request->get('properties'));

        Session::flash('success_message' , 'Category Created Successfully!');
        return redirect(route('createCategory'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit' , [
            'category' => $category,
            'categories' => Category::all(),
            'properties' => PropertyGroup::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $isTitleUsed = Category::query()
            ->where('title' , $request->get('title'))
            ->where('id' , '!=' , $category->id)
            ->exists();

        if ($isTitleUsed) {
            return back()->withErrors(['This title has already been taken!']);
        }

        $isSlugUsed = Category::query()->where('slug' , $request->get('slug'))
            ->where('id' , '!=' , $category->id)
            ->exists();

        if ($isSlugUsed) {
            return back()->withErrors(['This slug has already been taken']);
        }

        $category->update([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'category_id' => $request->get('category_id')
        ]);

        $category->propertyGroups()->sync($request->get('properties'));

        Session::flash('success_update_message' , 'Category Updated Successfully.');
        return redirect('/dashboard/categories/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->propertyGroups()->detach();

        $category->delete();

        Session::flash('success_delete_message' , 'Category Deleted Successfully.');
        return redirect('dashboard/categories');
    }
}
