<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Validator;

class SubscriptionController extends Controller
{
    public function store_subscription(Request $request){
        $validator = Validator::make($request->all(), [
            'website_id' =>'required',
            'email' =>'required|string|email',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $subscription = Subscription::create([
            'website_id' =>$request->website_id,
            'email' => $request->email
        ]);

        return response()->json(['subscription' => $subscription], 200);
    }
    

    public function get_all_subscriptions(){
        $subscriptions = Subscription::paginate(50);
        return response()->json(['subscriptions' => $subscriptions], 200);
    }

}
