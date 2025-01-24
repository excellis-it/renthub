<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeContent;

class HomeController extends Controller
{
    public function homeContentIndex(){
        $home = HomeContent::orderBy('id', 'desc')->first();
        return view('backend.cms.home.update')->with(compact('home'));
    }

    public function homeUpdate(Request $request){
        //dd($request->all());
        $request->validate([
            'section_1_title'=>'required',
            'section_2_title'=>'required',
            'section_3_title'=>'required',
            'section_4_title'=>'required',
            'section_5_title'=>'required',
            'section_6_title'=>'required',
            'section_7_image'=>'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'section_7_title'=>'required',
            'section_7_description'=>'required',
            'section_8_image'=>'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'section_8_title'=>'required',
            'section_8_description'=>'required',
            'section_9_image'=>'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'section_9_title'=>'required',
            'section_9_description'=>'required',
        ]);
        try {
            if ($request->id != null) {
                $home = HomeContent::find($request->id);
            } else {
                $home = new HomeContent();
            }
            $home->section_1_title = $request->section_1_title;
            $home->section_2_title = $request->section_2_title;
            $home->section_3_title = $request->section_3_title;
            $home->section_4_title = $request->section_4_title;
            $home->section_5_title = $request->section_5_title;
            $home->section_6_title = $request->section_6_title;
            $home->section_7_title = $request->section_7_title;
            $home->section_7_description = $request->section_7_description;
            $home->section_8_title = $request->section_8_title;
            $home->section_8_description = $request->section_8_description;
            $home->section_9_title = $request->section_9_title;
            $home->section_9_description = $request->section_9_description;

            function handleImageUpload($request, $fieldName, $model)
            {
                if ($request->hasFile($fieldName)) {
                    // Delete the old image if it exists
                    if ($model->$fieldName) {
                        $oldImagePath = public_path('images/' . $model->$fieldName);
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    // Save the new image
                    $imageName = time() . '_' . $fieldName . '.' . $request->$fieldName->extension();
                    $request->$fieldName->move(public_path('images'), $imageName);
                    $model->$fieldName = $imageName;
                }
            }
            handleImageUpload($request, 'section_7_image', $home);
            handleImageUpload($request, 'section_8_image', $home);
            handleImageUpload($request, 'section_9_image', $home);
           //dd($home);
            $home->save();
            //dd($home);
            return redirect()->back()->with('success', 'Home page details has been updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
