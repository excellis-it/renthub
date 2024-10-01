<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserEnquiry;

class UserEnquiryController extends Controller
{
    public function list()
    {
        $enquiries = UserEnquiry::where('user_id', auth()->user()->id)->get();
        return view('user.enquiry.list', compact('enquiries'));
    }
    
    public function enquirystore(Request $request)
    {
       
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'interested_in' => 'required',
        ]);


        $enquiry = new UserEnquiry();
        $enquiry->user_id = auth()->user()->id;
        $enquiry->product_id = $request->product_id;
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phone = $request->phone;
        $enquiry->message = $request->message;
        $enquiry->interested_in = $request->interested_in;
        

        if ($enquiry->save())
            return response(['status' => true,'msg' => 'User Enquiry is added successfully.'], 200);
        else
        return response(['status' => false,'msg' => 'Something went wrong'], 400);
    }

    public function enquiry_products($id)
    {
        $cat_id = $id;
        $user = auth()->user();
        $user_property_enquries = UserEnquiry::where('user_id', $user->id)
            ->with('product')
            ->whereHas('product', function ($query) use ($cat_id) {
                $query->where('category_id', $cat_id);
            })
            ->paginate(10);

        return view('frontend.dashboard.property-enquiry', compact('user','user_property_enquries','cat_id'));
    }

    public function enquiry_products_filter(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $user = auth()->user();
            $cat_id = 1;
           $user_property_enquries = UserEnquiry::where('user_id', $user->id)
         ->with('product')
         ->whereHas('product', function ($queryBuilder) use ($cat_id, $query) {
             $queryBuilder->where('category_id', $cat_id)
                 ->where(function ($nestedQuery) use ($query) {
                     $nestedQuery->where('product_name', 'like', '%' . $query . '%')
                         ->orWhere('location', 'like', '%' . $query . '%')
                         ->orWhere('product_price', 'like', '%' . $query . '%');
                 });
         })
         ->orderBy('product_id', 'desc')
         ->paginate(10);

         
    
            return response()->json(['data' => view('frontend.dashboard.property-enquiry-filter', compact('user_property_enquries','user'))->render()]);
        }
    }

    public function delete_enquiry(Request $request)
    {
        $enquiry = UserEnquiry::find($request->id);
        if ($enquiry->delete()){
            return response()->json(['msg' => 'User Enquiry is deleted successfully.', 'status' => true], 200);
        }else{
            return response()->json(['msg' => 'Failed to delete this enquiry, try again.', 'status' => false], 400);
        }
    }

    public function enquiry_machinery($id)
    {
        $cat_id = $id;
        $user = auth()->user();
        $user_machinery_enquries = UserEnquiry::where('user_id', $user->id)
            ->with('product')
            ->whereHas('product', function ($query) use ($cat_id) {
                $query->where('category_id', $cat_id);
            })
            ->paginate(10);

        return view('frontend.dashboard.machinery-enquiry', compact('user','user_machinery_enquries'));
    }

    public function enquiry_machinery_filter(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $user = auth()->user();
            $cat_id = 2;
           $user_machinery_enquries = UserEnquiry::where('user_id', $user->id)
         ->with('product')
         ->whereHas('product', function ($queryBuilder) use ($cat_id, $query) {
             $queryBuilder->where('category_id', $cat_id)
                 ->where(function ($nestedQuery) use ($query) {
                     $nestedQuery->where('product_name', 'like', '%' . $query . '%')
                         ->orWhere('product_price', 'like', '%' . $query . '%');
                 });
         })
         ->orderBy('product_id', 'desc')
         ->paginate(10);

         
    
            return response()->json(['data' => view('frontend.dashboard.machinery-enquiry-filter', compact('user_machinery_enquries','user'))->render()]);
        }
    }
    public function enquiry_electronics($id)
    {
        $cat_id = $id;
        $user = auth()->user();
        $user_electronics_enquries = UserEnquiry::where('user_id', $user->id)
            ->with('product')
            ->whereHas('product', function ($query) use ($cat_id) {
                $query->where('category_id', $cat_id);
            })
            ->paginate(10);

        return view('frontend.dashboard.electronics-enquiry', compact('user','user_electronics_enquries'));
    }

    public function enquiry_electronics_filter(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $user = auth()->user();
            $cat_id = 3;
           $user_electronics_enquries = UserEnquiry::where('user_id', $user->id)
         ->with('product')
         ->whereHas('product', function ($queryBuilder) use ($cat_id, $query) {
             $queryBuilder->where('category_id', $cat_id)
                 ->where(function ($nestedQuery) use ($query) {
                     $nestedQuery->where('product_name', 'like', '%' . $query . '%')
                         ->orWhere('product_price', 'like', '%' . $query . '%');
                 });
         })
         ->orderBy('product_id', 'desc')
         ->paginate(10);

         
    
            return response()->json(['data' => view('frontend.dashboard.electronics-enquiry-filter', compact('user_electronics_enquries','user'))->render()]);
        }
    }

    public function enquiry_vehicles($id)
    {
        $cat_id = $id;
        $user = auth()->user();
        $user_vehicles_enquries = UserEnquiry::where('user_id', $user->id)
            ->with('product')
            ->whereHas('product', function ($query) use ($cat_id) {
                $query->where('category_id', $cat_id);
            })
            ->paginate(10);

        return view('frontend.dashboard.vehicles-enquiry', compact('user','user_vehicles_enquries'));
    }

    public function enquiry_vehicles_filter(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $user = auth()->user();
            $cat_id = 4;
           $user_vehicles_enquries = UserEnquiry::where('user_id', $user->id)
         ->with('product')
         ->whereHas('product', function ($queryBuilder) use ($cat_id, $query) {
             $queryBuilder->where('category_id', $cat_id)
                 ->where(function ($nestedQuery) use ($query) {
                     $nestedQuery->where('product_name', 'like', '%' . $query . '%')
                         ->orWhere('product_price', 'like', '%' . $query . '%');
                 });
         })
         ->orderBy('product_id', 'desc')
         ->paginate(10);

         
    
            return response()->json(['data' => view('frontend.dashboard.vehicles-enquiry-filter', compact('user_vehicles_enquries','user'))->render()]);
        }
    }

    public function check_enquire(Request $request)
    {
        $check_user_already_enquired = UserEnquiry::where('user_id', auth()->user()->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($check_user_already_enquired) {
            return response(['status' => false, 'msg' => 'You have already enquired for this product.'], 200);
        } else {
            return response(['status' => true], 200);
        }
    }
}
