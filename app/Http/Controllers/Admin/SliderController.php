<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sliders.index', [
            'sliders' => Slider::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create', [
           'sliders' => Slider::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $path = $request->file('image')
            ->storeAs('public/sliders', $request->file('image')->getClientOriginalName());

        Slider::query()->create([
            'link' => $request->get('link'),
            'image' => $path
        ]);

        Session::flash('slider_add_success' , 'New slide has been added successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(slider $slider)
    {
        return view('admin.sliders.edit', [
            'slider' => $slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, slider $slider)
    {

        $this->validate($request, [
            'link' => ['required']
        ]);

        $path = $slider->image;

        if ($request->hasFile('image')) {
            $path = $request->file('image')
                ->storeAs('/public/sliders' , $request->file('image')->getClientOriginalName());
        }

        $slider->update([
            'link' => $request->get('link'),
            'image' => $path
        ]);

        Session::flash('update_success' , 'Slider has been updated successfully!');
        return redirect(route('showSliders'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(slider $slider)
    {
        Storage::delete($slider->image);

        $slider->delete();

        Session::flash('delete_message' , 'Slider has been deleted successfully!');
        return redirect(route('showSliders'));

    }
}
