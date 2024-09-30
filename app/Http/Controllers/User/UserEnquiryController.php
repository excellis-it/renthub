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
        // dd($request->all());
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
            return response(['msg' => 'User Enquiry is added successfully.'], 200);
        else
            return redirect()->route('enquiry')->with('error', 'Failed to add this enquiry, try again.');
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

        return view('frontend.dashboard.property-enquiry', compact('user','user_property_enquries'));
    }

    public function enquiry_products_filter(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $user = auth()->user();

            $user_property_enquries = UserEnquiry::where('user_id', $user->id)
                ->with('product')
                ->whereHas('product', function ($queryBuilder) use ($cat_id) {
                    $queryBuilder->where('category_id', $cat_id);
                })
                ->where(function ($queryBuilder) use ($query) {
                    $queryBuilder->where('product_name', 'like', '%' . $query . '%')
                        ->orWhere('location', 'like', '%' . $query . '%')
                        ->orWhere('product_price', 'like', '%' . $query . '%');
                })
                ->orderBy('product_id', 'desc')
                ->paginate(10);
    
            return response()->json(['data' => view('frontend.dashboard.property-enquiry-filter', compact('user_property_enquries','user'))->render()]);
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
}
