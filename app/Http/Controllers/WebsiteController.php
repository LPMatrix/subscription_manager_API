<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Validator;

class WebsiteController extends Controller
{
    public function get_all_websites(){
        $websites = Website::paginate(50);
        return response()->json(['websites' => $websites], 200);
    }

    public function store_subscription(Request $request){
        $validator = Validator::make($request->all(), [
            'website_id' =>'required',
            'email' =>'required|string|email',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $website = Subscription::create([
            'website_id' =>$request->website_id,
            'email' => $request->email
        ]);

        return response()->json(['website' => $website], 200);
    }
}
