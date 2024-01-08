<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertiesRequest;
use App\Http\Requests\PropertyGroupRequest;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PropertyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.propertyGroups.index' , [
            'propertyGroups' => PropertyGroup::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.propertyGroups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyGroupRequest $request)
    {
        PropertyGroup::query()->create([
            'title' => $request->get('title')
        ]);

        Session::flash('success_message' , 'New property has added successfully!');
        return redirect(route('createPropertyGroup'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PropertyGroup $propertyGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyGroup $propertyGroup)
    {
        return view('admin.propertyGroups.edit' , [
            'property' => $propertyGroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyGroupRequest $request, PropertyGroup $propertyGroup)
    {
        $propertyGroup->update([
            'title' => $request->get('title')
        ]);

        Session::flash('success_update_message' , 'Property has updated successfully!');
        return redirect(route('showPropertyGroups'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyGroup $propertyGroup)
    {
        $propertyGroup->delete();

        Session::flash('success_delete_message' , 'Property deleted successfully!');
        return redirect()->back();
    }
}
