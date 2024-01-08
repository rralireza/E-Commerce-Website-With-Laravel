<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertiesRequest;
use App\Models\Property;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index' , [
            'properties' => Property::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.properties.create', [
           'groups' => PropertyGroup::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertiesRequest $request)
    {
        Property::query()->create([
            'title' => $request->get('title'),
            'property_group_id' => $request->get('property_group')
        ]);

        Session::flash('success_message' , 'New Property has added successfully!');
        return redirect(route('createProperty'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.edit', [
            'property' => $property,
            'groups' => PropertyGroup::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertiesRequest $request, Property $property)
    {
        $property->update([
            'title' => $request->get('title'),
            'property_group_id' => $request->get('property_group')
        ]);

        Session::flash('success_update_message' , 'Property has updated successfully!');
        return redirect(route('showProperties'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }
}
