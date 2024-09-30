<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product\ProductModel;
use App\Models\BrandModel;
use App\Models\SubCategoryModel;
use App\Models\product\ProductImagesModel;
use App\Models\User;
use App\MyHelpers;

class PropertyController extends Controller
{

    public function list()
    {
        $data = ProductModel::where('category_id', 1)->orderBy('product_id', 'desc')->paginate(10);
        return view('backend.product.property_list', compact('data'));
    }

    public function listFilter(Request $request)
    {
        
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            
            $data = ProductModel::where('category_id', 1)
                ->where(function ($queryBuilder) use ($query) {
                    $queryBuilder->where('product_id', 'like', '%' . $query . '%')
                        ->orWhere('product_name', 'like', '%' . $query . '%')
                        ->orWhere('location', 'like', '%' . $query . '%')
                        ->orWhere('product_price', 'like', '%' . $query . '%');
                })
                ->orderBy('product_id', 'desc')
                ->paginate(10);
    
            return response()->json(['data' => view('backend.product.property_filter', compact('data'))->render()]);
        }
    }

    public function add(Request $request)
    {
        $brands = BrandModel::orderBy('brand_id', 'desc')->get();
        $subCategories  = SubCategoryModel::where('category_id', 1)->orderBy('sub_category_id', 'desc')->get();
        return view('backend.product.property_add', compact('brands', 'subCategories'));
    }
    public function create(Request $request)
    {
       
        $request->validate([
            'tag_line' => 'required',
            'product_name' => 'required',
            'location' => 'required',
            'product_short_description' => 'required',
            'marked_price' => 'required|numeric',
            'product_price' => 'required|numeric',
            'sub_category_id' => 'required |integer',
        ]);

        $user = auth()->user();
        if ($user->role == 'vendor') {
            $vendorId = $user->id;
        }

        //dd($vendorId);
        $data = [
            'tag_line' => $request->tag_line,
            'product_name' => $request->product_name,
            'location' => $request->location,
            'product_short_description' => $request->product_short_description,
            'product_long_description' => $request->product_long_description,
            'property_size' => $request->property_size,
            'property_bed' => $request->property_bed,
            'property_bathroom' => $request->property_bathroom,
            'marked_price' => $request->marked_price,
            'product_price' => $request->product_price,
            // 'brand_id' => $request->brand_id,
            'product_type' => $request->product_type,
            'vendor_type' => $request->vendor_type,
            'sub_category_id' => $request->sub_category_id,
            'is_available' => $request->is_available,
            'product_status' => $request->product_status,
            'category_id' => 1,
            'vendor_id' => $vendorId,
        ];
        // dd($data);
        if ($request->hasFile('product_thumbnail')) {
            $imageName = time() . '.' . $request->product_thumbnail->extension();
            $request->product_thumbnail->move(public_path('images'), $imageName);
            $data['product_thumbnail'] = $imageName;
        }

        $product = new ProductModel();
        $product->fill($data);
        //dd($product);
        $product->save();

        $productId = $product->product_id;
        // dd($productId);

        if ($request->hasFile('product_images')) {
            $this->handleProductMultiImages($request->file('product_images'), $productId);
        }

        
        return response()->json(['status' => true, 'message' => 'Property added successfully']);
    }


    private function handleProductMultiImages(array $images, int $productId): void
    {
        $data['image_product_id'] = $productId;
        foreach ($images as $image) {
            $data['product_image'] = MyHelpers::uploadImage($image, 'images');
            ProductImagesModel::insert($data);
        }
    }
    public function edit(Request $request)
    {
        $id =  $request->id;
        $item = ProductModel::find($id);
        $images = ProductImagesModel::where('image_product_id', $id)->get();

        $brands = BrandModel::orderBy('brand_id', 'desc')->get();
        $subCategories = SubCategoryModel::where('category_id', 1)->orderBy('sub_category_id', 'desc')->get();
        return view('backend.product.property_edit', compact('brands', 'images', 'subCategories', 'item'));
    }
    public function update(Request $request)
    {

        $request->validate([
            'tag_line' => 'required',
            'product_name' => 'required',
            'location' => 'required',
            'product_short_description' => 'required',
            'marked_price' => 'required|numeric',
            'product_price' => 'required|numeric',
            'sub_category_id' => 'required |integer',
        ]);
        
        $id = $request->product_id;
        $user = auth()->user();
        //dd($user);
        if ($user->role == 'vendor') {
            $vendorId = $user->id;
        }
        // echo $vendorId;
        // die;
        // echo $id;die;
        $product = ProductModel::where('product_id', $id)->first();
        // dd($product);
        $data = [
            'tag_line' => $request->tag_line,
            // dd($request->tag_line);
            'product_name' => $request->product_name,
            'location' => $request->location,
            'product_short_description' => $request->product_short_description,
            'product_long_description' => $request->product_long_description,
            'property_size' => $request->property_size,
            'property_bed' => $request->property_bed,
            'property_bathroom' => $request->property_bathroom,
            'marked_price' => $request->marked_price,
            'product_price' => $request->product_price,
            // 'brand_id' => $request->brand_id,
            'product_type' => $request->product_type,
            'vendor_type' => $request->vendor_type,
            'sub_category_id' => $request->sub_category_id,
            'is_available' => $request->is_available,
            'product_status' => $request->product_status,
            'category_id' => 1,
            'vendor_id' => $vendorId,
        ];
        // dd($data);
        if ($request->hasFile('product_thumbnail')) {
            $imageName = time() . '.' . $request->product_thumbnail->extension();
            $request->product_thumbnail->move(public_path('images'), $imageName);
            $data['product_thumbnail'] = $imageName;
        }
        $product->update($data);

        $product->save();
        //dd($product);

        if ($request->hasFile('product_images')) {
            $this->handleProductMultiImages($request->file('product_images'), $id);
        }

        return response()->json(['status' => true, 'message' => 'Property updated successfully']);

        // toastr()->success('Property Updated successfully', ['timeout' => 1000]);
        // return redirect('vendor/property/list');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $product = ProductModel::findOrFail($id);

        $product->delete();
        if ($product->product_thumbnail) {
            $imagePath = public_path('images/' . $product->product_thumbnail);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $productImages = ProductImagesModel::where('image_product_id', $id)->get();
        foreach ($productImages as $productImage) {
            $imagePath = public_path('images/' . $productImage->product_image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $productImage->delete();
        }
        toastr()->success('Property Deleted successfully', ['timeout' => 3000]);
        return redirect()->back();
    }
}