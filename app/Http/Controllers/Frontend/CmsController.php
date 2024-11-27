<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product\ProductModel;
use App\Models\product\ProductImagesModel;
use App\Models\TestimonialModel;
use Illuminate\Support\Str;
use App\Models\SliderModel;
use App\Models\CategoryModel;
use App\Models\User;
use App\Models\Review;
use App\Models\UserEnquiry;
use App\Models\HomeContent;

use App\Models\SubCategoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;



class CmsController extends Controller
{
    //
    public function home()
    {

        $property = ProductModel::where(['product_status' => 1, 'category_id' => 1])
            ->orderBy('product_id', 'desc')
            ->get();
        $machinery = ProductModel::where(['product_status' => 1, 'category_id' => 2])
            ->orderBy('product_id', 'desc')
            ->get();
        $electronics = ProductModel::where(['product_status' => 1, 'category_id' => 3])
            ->orderBy('product_id', 'desc')
            ->get();
        $vehicle = ProductModel::where(['product_status' => 1, 'category_id' => 4])
            ->orderBy('product_id', 'desc')
            ->get();
        //COMMENT

        $testimonial = TestimonialModel::where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        $slider = SliderModel::where('status', 1)->get();
        // $category=CategoryModel::where('category_slug',$category_slug)->first();
        $subcategories = SubCategoryModel::where('status', 1)->get();
        $category = CategoryModel::select('category_slug')->get();
        // dd($category);
        // dd($subcategories);
        $home = HomeContent::orderBy('id', 'desc')->first();
        return view('frontend.home', compact('property', 'machinery', 'electronics', 'vehicle', 'testimonial', 'slider', 'subcategories', 'category','home'));
    }
    public function all_categories_subcategories($category_slug, $sub_category_slug)
    {
        $category = CategoryModel::where('category_slug', $category_slug)->first();
        $subcategory = SubCategoryModel::where('sub_category_slug', $sub_category_slug)->first();
        //dd($subcategory);
        $views = [
            'property' => ProductModel::where('category_id', $category->category_id)
                ->where('product_type', ['sell', 'rent'])
                ->pluck('sub_category_id')
                ->toArray(),

            'machinery' => ProductModel::where('category_id', $category->category_id)
                ->where('product_type', ['new', 'used'])
                ->pluck('sub_category_id')
                ->toArray(),

            'electronics' => ProductModel::where('category_id', $category->category_id)
                ->where('product_type', ['new', 'used'])
                ->pluck('sub_category_id')
                ->toArray(),

            'vehicle' => ProductModel::where('category_id', $category->category_id)
                ->where('product_type', ['new', 'used'])
                ->pluck('sub_category_id')
                ->toArray(),
        ];

        // Map subcategory IDs to slugs
        $views = array_map(function ($subCategoryIds) {
            return SubCategoryModel::whereIn('sub_category_id', $subCategoryIds)
                ->pluck('sub_category_slug')
                ->toArray();
        }, $views);

        //dd($views);
                            /*********** Property ******************/

        if (in_array($subcategory->sub_category_slug, $views['property'])) {
            $property = ProductModel::where(['product_status' => 1, 'category_id' => $category->category_id, 'sub_category_id' => $subcategory->sub_category_id])
                ->orderBy('product_id', 'desc')->get();
            return view('frontend.property-for-sell', compact('property'));
        }

                                /*********** Machinery ******************/

        if (in_array($subcategory->sub_category_slug, $views['machinery'])) {
            $machinery = ProductModel::where(['product_status' => 1, 'category_id' => $category->category_id, 'sub_category_id' => $subcategory->sub_category_id])
                ->orderBy('product_id', 'desc')->get();
            return view('frontend.equipment-and-machineries', compact('machinery'));
        }

                                /*********** Electronics ******************/

        if (in_array($subcategory->sub_category_slug, $views['electronics'])) {
            $electronics = ProductModel::where(['product_status' => 1, 'category_id' => $category->category_id, 'sub_category_id' => $subcategory->sub_category_id])
                ->orderBy('product_id', 'desc')->get();
            return view('frontend.electronics-home-appliances', compact('electronics'));
        }
                                /*********** Vehicle ******************/

        if (in_array($subcategory->sub_category_slug, $views['vehicle'])) {
            $vehicle = ProductModel::where(['product_status' => 1, 'category_id' => $category->category_id, 'sub_category_id' => $subcategory->sub_category_id])
                ->orderBy('product_id', 'desc')->get();
            return view('frontend.vehicle', compact('vehicle'));
        }
        return redirect()->back()->with('error', 'Invalid subcategory');
    }

    //search result

    public function searchProduct(Request $request){
        $products=ProductModel::orderBy('id','desc')->where('product_name','LIKE','%'.$request->search_product.'%');
        if($request->category_id){
            $products=$products->where('category_id',$request->category_id);
            }

        return view('frontend.product-search',compact('products'));
    }

    // public function storeLocation(Request $request)
    // {
    //      dd($request->all());
    //     $request->validate([
    //         'latitude' => 'required',
    //         'longitude' => 'required',
    //     ]);

    //     $location = new Location();
    //     /*if(auth()->check()) {
    //         $location->user_id = auth()->user()->id;
    //         $location->session_id = null;
    //     } else {
    //         $session_id = Session::getId();
    //         $location->user_id = null;
    //         $location->session_id = $session_id;
    //         $request->session()->put('session_id', $session_id);
    //     }*/
    //     $location->ip_address = $request->ip_address;
    //     $location->address = $request->address;
    //     $location->latitude = $request->latitude;
    //     $location->longitude = $request->longitude;
    //     $location->save();


    //     $request->session()->put('latitude', $request->latitude);
    //     $request->session()->put('longitude', $request->longitude);
    //     $request->session()->put('address', $request->address);

    //     session()->flash('message', 'Location saved successfully');
    //     return response()->json(['success' => true]);
    //     // return response()->json(['session' => $request->session()->all()]);
    // }

   /* public function searchResult(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->input('search');
            $search = str_replace(" ", "%", $search); // Replace spaces with % for LIKE queries

            // Perform searches on different models
            $vehicles = ProductModel::where('product_name', 'LIKE', "%{$search}%")->get();
            $properties = ProductModel::where('product_name', 'LIKE', "%{$search}%")->get();
            $electronics = ProductModel::where('product_name', 'LIKE', "%{$search}%")->get();
            $machinery = ProductModel::where('product_name', 'LIKE', "%{$search}%")->get();

            // Example search logic for ProductModel
            $products = ProductModel::where('category_id', $request->category_id)
                ->where(function ($queryBuilder) use ($search) {
                    $queryBuilder->where('product_id', 'like', '%' . $search . '%')
                        ->orWhere('product_name', 'like', '%' . $search . '%')
                        ->orWhere('location', 'like', '%' . $search . '%')
                        ->orWhere('product_price', 'like', '%' . $search . '%');
                })
                ->orderBy('product_id', 'desc')
                ->paginate(10); // You can adjust pagination as needed

            // Count the total results
            $resultsCount = $vehicles->count() + $properties->count() + $electronics->count() + $machinery->count() + $products->total();

            return response()->json([
                'vehicleList' => view('frontend.vehicle', compact('vehicles'))->render(),
                'propertyList' => view('frontend.property-for-rent', compact('properties'))->render(),
                'electronicList' => view('frontend.electronics-home-appliances', compact('electronics'))->render(),
                'machineList' => view('frontend.equipment-and-machineries', compact('machinery'))->render(),
                // 'productList' => view('backend.product.property_filter', compact('products'))->render(), // Render the product view
                'count' => $resultsCount,
            ]);
        }
    }*/


    public function categories($category_slug)
    {
        $category = CategoryModel::where('category_slug', $category_slug)->first();

        // Check if category is null
        if (is_null($category)) {
            // Optionally, you can redirect to a 404 page or return a custom view
            abort(404, 'Category not found');
        }

        /*********** Property ******************/

        if ($category->category_slug == 'property') {
            $property = ProductModel::where(['product_status' => 1, 'category_id' => $category->category_id])
                ->orderBy('product_id', 'desc')
                ->get();
            return view('frontend.property-for-rent', compact('property'));
        }

        /************** Machinery ********************/

        elseif ($category->category_slug == 'equipments-&-machinery') {
            $machinery = ProductModel::where(['product_status' => 1, 'category_id' => $category->category_id])
                ->orderBy('product_id', 'desc')
                ->get();
            return view('frontend.equipment-and-machineries', compact('machinery'));
        }

        /***************** Electronics ***************************/

        else if ($category->category_slug == 'electronics-&-home-appliances') {
            $electronics = ProductModel::where(['product_status' => 1, 'category_id' => $category->category_id])
                ->orderBy('product_id', 'desc')
                ->get();
            return view('frontend.electronics-home-appliances', compact('electronics'));
        }

        /******************** Vehicle ***********************************/

        else if ($category->category_slug == 'vehicles') {
            $vehicle = ProductModel::where(['product_status' => 1, 'category_id' => $category->category_id])
                ->orderBy('product_id', 'desc')
                ->get();
            return view('frontend.vehicle', compact('vehicle'));
        }
    }


    public function subcategories($category_slug, $sub_category_slug)
    {
        $category = CategoryModel::where('category_slug', $category_slug)->first();
        $subcategory = SubCategoryModel::where('sub_category_slug', $sub_category_slug)->first();

        // Check if either category or subcategory is null
        if (is_null($category) || is_null($subcategory)) {
            // Optionally, you can redirect to a 404 page or return a custom error view
            return redirect()->back()->with('message', 'Category or Subcategory not found');
        }

        // List views for property, machinery, electronics, and vehicles
        $views = [
            'property' => ProductModel::where('category_id', $category->category_id)
                ->where('product_type', ['sell', 'rent']) // Replace 'property' with your specific product_type values
                ->pluck('sub_category_id')
                ->toArray(),

            'machinery' => ProductModel::where('category_id', $category->category_id)
                ->where('product_type', ['new', 'used'])
                ->pluck('sub_category_id')
                ->toArray(),

            'electronics' => ProductModel::where('category_id', $category->category_id)
                ->where('product_type', ['new', 'used'])
                ->pluck('sub_category_id')
                ->toArray(),

            'vehicle' => ProductModel::where('category_id', $category->category_id)
                ->where('product_type', ['new', 'used'])
                ->pluck('sub_category_id')
                ->toArray(),
        ];
        $views = array_map(function ($subCategoryIds) {
            return SubCategoryModel::whereIn('sub_category_id', $subCategoryIds)
                ->pluck('sub_category_slug')
                ->toArray();
        }, $views);
        //dd($views);

        // Check for properties
        if (in_array($subcategory->sub_category_slug, $views['property'])) {
            $property = ProductModel::where([
                'product_status' => 1,
                'category_id' => $category->category_id,
                'sub_category_id' => $subcategory->sub_category_id,
            ])->orderBy('product_id', 'desc')->get();
            return view('frontend.property-for-sell', compact('property'));
        }

        // Check for machinery
        if (in_array($subcategory->sub_category_slug, $views['machinery'])) {
            $machinery = ProductModel::where([
                'product_status' => 1,
                'category_id' => $category->category_id,
                'sub_category_id' => $subcategory->sub_category_id,
            ])->orderBy('product_id', 'desc')->get();
            return view('frontend.equipment-and-machineries', compact('machinery'));
        }

        // Check for electronics
        if (in_array($subcategory->sub_category_slug, $views['electronics'])) {
            $electronics = ProductModel::where([
                'product_status' => 1,
                'category_id' => $category->category_id,
                'sub_category_id' => $subcategory->sub_category_id,
            ])->orderBy('product_id', 'desc')->get();
            return view('frontend.electronics-home-appliances', compact('electronics'));
        }

        // Check for vehicles
        if (in_array($subcategory->sub_category_slug, $views['vehicle'])) {
            $vehicle = ProductModel::where([
                'product_status' => 1,
                'category_id' => $category->category_id,
                'sub_category_id' => $subcategory->sub_category_id,
            ])->orderBy('product_id', 'desc')->get();
            return view('frontend.vehicle', compact('vehicle'));
        }

        return redirect()->back()->with('error', 'Invalid subcategory');
    }


    public function vehicle(Request $request)
    {
        if ($request->ajax()) {
            $vehicle = ProductModel::where('product_status', 1)
                ->where('category_id', 4)
                ->orderBy('product_id', 'desc')
                ->paginate(10);

            return view('frontend.vehicle', compact('vehicle'))->render();
        }
        $vehicle = ProductModel::where('product_status', 1)
            ->where('category_id', 4)
            ->orderBy('product_id', 'desc')
            ->paginate(10);

        return view('frontend.vehicle', compact('vehicle'));
    }

    public function vehicle_search(Request $request)
    {
        $search = $request->search;
        $size = $request->size;
        $min = $request->min;
        $max = $request->max;
        // dd($size);


        $query = ProductModel::where('category_id', 4);

        if ($search) {
            $query->where('product_name', 'LIKE', '%' . $search . '%');
        }

        if (in_array($size, ['new', 'used'])) {
            $query->where('product_type', $size);
        }

        if (!empty($min) && !empty($max)) {
            $query->whereBetween('product_price', [$min, $max]);
        }

        $vehicle = $query->get();
        $count = $query->count();

        // $results = $vehicle->count();
        // dd($vehicle);
        return response()->json(['result' => view('frontend.vehicle-search', compact('vehicle'))->render(), 'status' => true, 'count' => $count]);
    }


    public function property_for_sell(Request $request)
    {
        $property = ProductModel::where(['product_status' => 1, 'category_id' => 1, 'product_type' => 'sell'])

            ->orderBy('product_id', 'desc')
            ->paginate(10);

        //dd($review);
        $total = $property->count();
        return view('frontend.property-for-sell', compact('property', 'total'));
    }

    public function property_sell_search(Request $request)

    {
        $search = $request->search;
        $size = $request->size;
        $min = $request->min;
        $max = $request->max;
        // dd($size);
        $query = ProductModel::where(['category_id' => 1, 'product_type' => 'sell']);

        if ($search) {
            $query->where('product_name', 'LIKE', '%' . $search . '%');
        }
        if (!empty($min) && !empty($max)) {
            $query->whereBetween('product_price', [$min, $max]);
        }

        $property = $query->get();
        $count = $query->count();
        // $results = $property->count();
        // dd($property);
        return response()->json(['result' => view('frontend.property-for-sell-search', compact('property'))->render(), 'status' => true, 'count' => $count]);
    }

    public function property_for_rent(Request $request)
    {
        $property = ProductModel::where(['product_status' => 1, 'category_id' => 1, 'product_type' => 'rent'])
            ->orderBy('product_id', 'desc')
            ->paginate(10);
        // if ($request->ajax()) {
        //     $view = view('frontend.property-for-rent-search', compact('property'))->render();
        //     return Response::json(['view' => $view, 'nextPageUrl' => $property->nextPageUrl()]);
        // }
        $total = $property->count();
        return view('frontend.property-for-rent', compact('property', 'total'));
    }


    public function property_rent_search(Request $request)

    {
        $search = $request->search;
        $size = $request->size;
        $min = $request->min;
        $max = $request->max;
        // dd($size);
        $query = ProductModel::where(['category_id' => 1, 'product_type' => 'rent']);

        if (!empty($search)) {
            $query->where('product_name', 'LIKE', '%' . $search . '%');
        }
        if (!empty($min) && !empty($max)) {
            $query->whereBetween('product_price', [$min, $max]);
        }

        $property = $query->get();
        $count = $query->count();
        // $results = $property->count();
        // dd($results);
        return response()->json(['result' => view('frontend.property-for-rent-search', compact('property'))->render(), 'status' => true, 'count' => $count]);
    }
    public function equipment_machineries(Request $request)
    {
        $machinery = ProductModel::where(['product_status' => 1, 'category_id' => 2])
            ->orderBy('product_id', 'desc')
            ->paginate(10);
        $total = $machinery->count();
        // dd($machinery);
        return view('frontend.equipment-and-machineries', compact('machinery', 'total'));
    }

    public function machinery_search(Request $request)
    {
        $search = $request->search;
        $size = $request->size;
        $min = $request->min;
        $max = $request->max;
        // dd($size);
        $query = ProductModel::where('category_id', 2);

        if ($search) {
            $query->where('product_name', 'LIKE', '%' . $search . '%');
        }

        if (in_array($size, ['new', 'used'])) {
            $query->where('product_type', $size);
        }

        if (!empty($min) && !empty($max)) {
            $query->whereBetween('product_price', [$min, $max]);
        }

        $machinery = $query->get();
        $count = $query->count();
        // $results = $vehicle->count();
        // dd($vehicle);
        return response()->json(['result' => view('frontend.equipment-and-machineries-search', compact('machinery'))->render(), 'status' => true, 'count' => $count]);
    }

    public function electronic_home(Request $request)
    {
        $electronics = ProductModel::where(['product_status' => 1, 'category_id' => 3])
            ->orderBy('product_id', 'desc')
            ->get();

        $total = $electronics->count();
        return view('frontend.electronics-home-appliances', compact('electronics', 'total'));
    }

    public function electronic_search(Request $request)
    {
        $search = $request->search;
        $size = $request->size;
        $min = $request->min;
        $max = $request->max;
        // dd($size);
        $query = ProductModel::where('category_id', 3);

        if ($search) {
            $query->where('product_name', 'LIKE', '%' . $search . '%');
        }

        if (in_array($size, ['new', 'used'])) {
            $query->where('product_type', $size);
        }

        if (!empty($min) && !empty($max)) {
            $query->whereBetween('product_price', [$min, $max]);
        }

        $electronics = $query->get();
        $count = $query->count();
        // $results = $vehicle->count();
        // dd($vehicle);
        return response()->json(['result' => view('frontend.electronics-home-appliances-search', compact('electronics'))->render(), 'status' => true, 'count' => $count]);
    }

    public function all_categories()
    {
        $property = CategoryModel::where(['category_status' => 1, 'category_id' => 1])
            ->first();
        $machinery = CategoryModel::where(['category_status' => 1, 'category_id' => 2])
            ->first();
        $electronics = CategoryModel::where(['category_status' => 1, 'category_id' => 3])
            ->first();
        $vehicle = CategoryModel::where(['category_status' => 1, 'category_id' => 4])
            ->first();
        return view('frontend.all-categories', compact('property', 'machinery', 'electronics', 'vehicle'));
    }

    public function register(Request $request)
    {

        return view('frontend.register');
    }
    public function dashboard()
    {
        return view('frontend.dashboard');
    }

    public function subscription()
    {
        return view('frontend.subscription');
    }

    public function property_details(Request $request)
    {
        $id = Crypt::decrypt($request->id);

        $data = ProductModel::where([
            'product_status' => 1,
            'category_id' => 1,
            'product_id' => $id
        ])->first();

        $images = ProductImagesModel::where('image_product_id', $id)->get();
        $property = ProductModel::where(['product_status' => 1, 'category_id' => 1])
            ->orderBy('product_id', 'desc')
            ->get();
        //dd($property);
        // If logged in, retrieve reviews for the product
        $review = Review::with('user')->where('product_id', $id)->get();
        //dd($review);

        //check user alreay enquire or not
        if (Auth::check()) {
            $user = Auth::user();
            $enquiry = UserEnquiry::where('user_id', $user->id)->where('product_id', $id)->first();
            //dd($enquiry);
            $enquiry = $enquiry ? 1 : 0;
        } else {

            $enquiry = 0;
        }
        //dd($user);
        return view('frontend.property_details', compact('data', 'images', 'property', 'review', 'enquiry'));
    }
    public function vehicle_details(Request $request)
    {
        $id = Crypt::decrypt($request->id);
        $data = ProductModel::where([
            'product_status' => 1,
            'category_id' => 4,
            'product_id' => $id
        ])->first();

        $images = ProductImagesModel::where('image_product_id', $id)->get();
        // echo $images;die;

        $vehicle = ProductModel::where(['product_status' => 1, 'category_id' => 4])
            ->orderBy('product_id', 'desc')
            ->get();
        $review = Review::with('user')->where('product_id', $id)->get();

        return view('frontend.vehicle_details', compact('data', 'images', 'vehicle', 'review'));
    }
    public function electronics_details(Request $request)
    {
        $id = Crypt::decrypt($request->id);
        $data = ProductModel::where([
            'product_status' => 1,
            'category_id' => 3,
            'product_id' => $id
        ])->first();

        $images = ProductImagesModel::where('image_product_id', $id)->get();
        // echo $images;die;
        $electronics = ProductModel::where(['product_status' => 1, 'category_id' => 3])
            ->orderBy('product_id', 'desc')
            ->get();
        $review = Review::with('user')->where('product_id', $id)->get();

        return view('frontend.electronics-home-appliances_details', compact('data', 'images', 'electronics', 'review'));
    }
    public function machineries_details(Request $request)
    {
        $id = Crypt::decrypt($request->id);
        $data = ProductModel::where([
            'product_status' => 1,
            'category_id' => 2,
            'product_id' => $id
        ])->first();
        $images = ProductImagesModel::where('image_product_id', $id)->get();
        // echo $images;die;
        $machinery = ProductModel::where(['product_status' => 1, 'category_id' => 2])
            ->orderBy('product_id', 'desc')
            ->get();
        $review = Review::with('user')->where('product_id', $id)->get();
        return view('frontend.equipment-and-machineries_details', compact('data', 'images', 'machinery', 'review'));
    }

    public function disclaimer(){
        return view('frontend.disclaimer');
    }
}
