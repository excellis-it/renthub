<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategoryRequest;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\MyHelpers;
use App\Helpers\Helper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function subCategoryAdd(){
        // $data = DB::table('get_sub_categories')->get();
        $data=SubCategoryModel::all();
        $categories = CategoryModel::all();
        return view('backend.sub_category.sub_category_default', compact('data', 'categories'));
    }

    use ImageHandlerTrait;

    /**
     * @param SubCategoryRequest $request
     */
    public function subCategoryCreate(SubCategoryRequest $request){
        // validate
        $data = $request->validated();
        $data['status'] = 1;

        // handling the image
        $data['sub_category_image'] = $this->handleRequestImage($request->file('sub_category_image'), 'uploads/images/sub_category');
        $data['sub_category_slug'] = $this->getCategorySlug($data['sub_category_name']);

        // insert
        if (SubCategoryModel::insert($data))
            return response(['msg' => 'Sub Category is added successfully.'], 200);
        else
            return redirect()->route('sub-category')->with('error', 'Failed to add this sub Category, try again.');
    }

    /**
     * @param string $sub_categoryName
     * @return array|string|string[]
     */
    private function getCategorySlug(string $sub_categoryName){
        return str_replace(' ', '-', strtolower(trim($sub_categoryName)));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function subCategoryRemove(Request $request){
        try {
            $sub_category = SubCategoryModel::findOrFail($request->id);
            // MyHelpers::deleteImageFromStorage($sub_category->sub_category_image , 'uploads/images/sub_category/');
            if ($sub_category->delete())
                return redirect()->route('sub-category')->with('success', 'Successfully removed.');
            else
                return redirect('sub_categories')->with('error', 'Failed to remove this sub Category.');
        }catch (ModelNotFoundException $exception){
            return redirect('sub_categories')->with('error', 'Failed to remove this sub Category.');
        }
    }

    public function subCategoryEdit($id)
    {
        $categories = CategoryModel::all();
        $item = SubCategoryModel::findOrFail($id);

        return response()->json([
            'status' => 200,
            'categories' => $categories,
            'item' => $item,
        ]);
    }

    /**
     * Update the specified sub-category.
     *
     * @param SubCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */


     public function subCategoryUpdate(SubCategoryRequest $request)
     {
         // Validate the incoming request
         $data = $request->validated();
         $data['status'] = $request->status;

         // Find the subcategory being updated
         $subCategory = SubCategoryModel::find($request->get('sub_category_id'));

         if (!$subCategory) {
             return redirect()->route('sub-category')->with('error', 'Sub-category not found.');
         }

         // Handle new image upload
         if ($request->hasFile('sub_category_image')) {
             // Store the new image and delete the old one
             $newImagePath = $this->handleRequestImage(
                 $request->file('sub_category_image'),
                 'uploads/images/sub_category'
             );

             Helper::deleteImageFromStorage($subCategory->sub_category_image, 'uploads/images/sub_category');
             $data['sub_category_image'] = $newImagePath;
         }

         // Generate a slug for the subcategory
         $data['sub_category_slug'] = $this->getCategorySlug($data['sub_category_name']);

         // Attempt to update the subcategory
         if ($subCategory->update($data)) {
             return response(['msg' => 'Sub-category is updated successfully.'], 200);
         }

         return redirect()->route('sub-category')->with('error', 'Something went wrong, try again.');
     }


}
