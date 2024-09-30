<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageModel;

class PagesController extends Controller
{
    //
    public function pages_index()
    {
        $data = PageModel::orderBy('id', 'desc')->get();
        return view('backend.pages.pages_default', compact('data'));
    }
    public function create()
    {
        return view('backend.pages.pages_add');
    }
    public function pages_create(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ], [
            'title' => 'Title required',
            'description' => 'Description required'

        ]);
        $pages = new PageModel();
        $pages->title = $request->title;

        $pages->description = $request->description;
        $pages->status = 1;
        $pages->save();
        // dd($pages);
        toastr()->success('Pages Added successfully', ['timeout' => 1000]);
        return redirect()->back()->with(['success', 'Pages added successfully.']);
    }
    public function edit($id)
    {
        $pages = PageModel::find($id);
        return response()->json([
            'status' => 200,
            'pages' => $pages
        ]);
    }

    public function pagesUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required',

            'description' => 'required',
        ], [
            'title.required' => 'Title required',
            'description.required' => 'Description required',
        ]);

        $id = $request->input('id');
        $pages = PageModel::findOrFail($id);
        $pages->title = $request->title;

        $pages->description = $request->description;
        $pages->status = $request->status;
        $pages->save();
        toastr()->success('Pages Updated successfully', ['timeout' => 1000]);
        return redirect()->back()->with(['success', 'Pages updated successfully.']);
    }
    public function pagesRemove($id)
    {
        $pages = PageModel::findOrFail($id);
        $pages->delete();


        return redirect()->back()->with('success', 'Pages deleted successfully');
    }
}
