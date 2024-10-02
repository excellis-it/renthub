<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscriptionModel;
use App\Models\SubscriptionHistoryModel;

class SubscriptionController extends Controller
{
    public function subscription_default()
    {
        $data = SubscriptionModel::orderBy('id', 'desc')->paginate(10);
        return view('backend.subscription.subscription_default', compact('data'));
    }

    public function purchase()
    {
        
    }

    
    public function history(Request $request)
    {
        $vendorId = auth()->id();
        $subscriptionId = SubscriptionHistoryModel::where('subscription_id', $request->subscription_id);
        $data = SubscriptionModel::where('title', $request->title)->first();
        $subscriptions = SubscriptionHistoryModel::where('vendor_id', $vendorId)->with('subscription')->orderBy('id', 'desc')->paginate(10);

        // dd($subscription);
        return view('backend.subscription.subscription_history', compact('subscriptions'));
    }

    public function ajaxHistory(Request $request)
    {
        
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            
            $subscriptions = SubscriptionHistoryModel::where(function ($queryBuilder) use ($query) {
                $queryBuilder->whereHas('subscription', function ($queryBuilder) use ($query) {
                    $queryBuilder->where('title', 'like', '%' . $query . '%')
                        ->orWhere('subtitle', 'like', '%' . $query . '%')
                        ->orWhere('description', 'like', '%' . $query . '%');
                })

                ->orWhere('days', 'like', '%' . $query . '%')
                    ->orWhere('price', 'like', '%' . $query . '%');
            })
            ->paginate(10);
    
            return response()->json(['data' => view('backend.subscription.subscription_filter', compact('subscriptions'))->render()]);
        }
    }

    public function subscription_add()
    {
        return view('backend.subscription.subscription_add');
    }
    public function subscription_create(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'days' => 'required'
        ], [
            'title.required' => 'Title required',
            'subtitle.required' => 'Subtitle required',
            'description.required' => 'Description required',
            'days.required' => 'Days required'
        ]);

        $data = new SubscriptionModel();
        $data->title = $request->title;
        $data->subtitle = $request->subtitle;
        $data->description = $request->description;
        $data->days = $request->days;
        $data->price = $request->price;
        $data->no_of_product = $request->no_of_product;
        $data->status = 1;
        // dd($data);
        $data->save();
        // dd($pages);
        return redirect()->back()->with('success', 'Subscription added successfully.');
    }

 
    public function edit($id)
    {
        $data = SubscriptionModel::find($id);
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function subscriptionUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'days' => 'required'
        ], [
            'title' => 'title required',
            'subtitle' => 'subtitle required',
            'description' => 'Description required',
            'days' => 'Days required'

        ]);

        $id = $request->input('id');
        $data = SubscriptionModel::findOrFail($id);
        $data->title = $request->title;
        $data->subtitle = $request->subtitle;
        $data->description = $request->description;
        $data->days = $request->days;
        $data->price = $request->price;
        $data->no_of_product = $request->no_of_product;

        $data->status = $request->status;
        // dd($data);
        $data->save();
        toastr()->success('Subscription Updated successfully', ['timeout' => 1000]);
        return redirect()->back()->with(['success', 'Subscription updated successfully.']);
    }
    public function subscriptionRemove($id)
    {
        $data = SubscriptionModel::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Subscription deleted successfully');
    }

}
