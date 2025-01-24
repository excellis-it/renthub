<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderModel;

class SliderController extends Controller
{
    public function slider_default()
    {
        $data = SliderModel::orderBy('id', 'desc')->get();

        return view('backend.slider.slider_default', compact('data'));
    }
    public function slider_add()
    {
        return view('backend.slider.slider_add');
    }
    public function slider_create(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required'
        ], [
            'title' => 'Title required',
            'image' => ' Image required',
            'description' => 'Description required'

        ]);
        $slider = new SliderModel();
        $slider->title = $request->title;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $slider->image = $imageName;
        }

        $slider->description = $request->description;
        $slider->status = 1;
        $slider->save();
        // dd($slider);
        return redirect()->back()->with(['success', 'Slider added successfully.']);
    }
    public function edit($id)
    {
        $slider = SliderModel::find($id);
        return response()->json([
            'status' => 200,
            'slider' => $slider
        ]);
    }

    public function sliderUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ], [
            'title.required' => 'Title required',
            'image.required' => 'Image required',
            'description.required' => 'Description required',
        ]);

        $slider_id = $request->input('id');
        $slider = SliderModel::findOrFail($slider_id);
        $slider->title = $request->title;

        if ($request->hasFile('image')) {
            if ($slider->image) {
                $oldImagePath = public_path('images/' . $slider->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $slider->image = $imageName;
        }

        $slider->description = $request->description;
        $slider->status = $request->status;
        $slider->save();
        return redirect()->back()->with(['success', 'Slider updated successfully.']);
    }
    public function sliderRemove($id)
    {
        $slider = SliderModel::findOrFail($id);
        $slider->delete();
        if ($slider->image) {
            $imagePath = public_path('images/' . $slider->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        return redirect()->back()->with('success', 'Slider deleted successfully');
    }
}
