<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TestimonialModel;

class TestimonialController extends Controller
{
    //

    public function testimonial_default()
    {
        $data = TestimonialModel::orderBy('id', 'desc')->get();
        return view('backend.testimonial.testimonial_default', compact('data'));
    }
    public function testimonial_add()
    {
        return view('backend.testimonial.testimonial_add');
    }
    public function testimonial_create(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required'
        ], [
            'name' => 'Testimonials Name required',
            'image' => 'Testimonials Image required',
            'description' => 'Testimonials Description required'

        ]);
        $testimonial = new TestimonialModel();
        $testimonial->name = $request->name;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $testimonial->image = $imageName;
        }

        $testimonial->description = $request->description;
        $testimonial->status = 1;
        $testimonial->save();
        // dd($testimonial);
        return redirect()->back()->with(['success', 'Testimonial added successfully.']);
    }
    public function edit($id)
    {
        $testimonial = TestimonialModel::find($id);
        return response()->json([
            'status' => 200,
            'testimonial' => $testimonial
        ]);
    }

    public function testimonialUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ], [
            'name.required' => 'Testimonials Name required',
            'image.required' => 'Testimonials Image required',
            'description.required' => 'Testimonials Description required',
        ]);

        $testimonial_id = $request->input('id');
        $testimonial = TestimonialModel::findOrFail($testimonial_id);
        $testimonial->name = $request->name;

        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                $oldImagePath = public_path('images/' . $testimonial->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $testimonial->image = $imageName;
        }

        $testimonial->description = $request->description;
        $testimonial->status = $request->status;
        $testimonial->save();
        toastr()->success('Testimonial Updated successfully', ['timeout' => 1000]);
        return redirect()->back()->with(['success', 'Testimonial updated successfully.']);
    }
    public function testimonialRemove($id)
    {
        $testimonial = TestimonialModel::findOrFail($id);
        $testimonial->delete();
        if ($testimonial->image) {
            $imagePath = public_path('images/' . $testimonial->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        return redirect()->back()->with('success', 'testimonials deleted successfully');
    }
}
