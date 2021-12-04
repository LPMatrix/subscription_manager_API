<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use Validator;

class WebsiteController extends Controller
{
    public function store_website(Request $request){
        $validator = Validator::make($request->all(), [
            'name' =>'required',
            'url' =>'required|string|unique:websites',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $website = Website::create([
            'name' =>$request->name,
            'url' => $request->url
        ]);

        return response()->json(['website' => $website], 200);
    }

    public function get_all_websites(){
        $websites = Website::paginate(50);
        return response()->json(['websites' => $websites], 200);
    }

}
