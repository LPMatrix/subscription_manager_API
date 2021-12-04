<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Validator;

class PostController extends Controller
{
    public function store_post(Request $request){
        $validator = Validator::make($request->all(), [
            'website_id' =>'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // $subscription = Post::create([
        //     'website_id' =>$request->website_id,
        //     'content' => $request->content
        // ]);

        $emails = Subscription::where('website_id', $request->website_id)->pluck('email');
  
        dispatch(new \App\Jobs\SendEmailJob($emails));
        dd('sent');
        // return response()->json(['subscription' => $subscription], 200);
    }
    

    public function get_all_posts(){
        $posts = Post::paginate(50);
        return response()->json(['posts' => $posts], 200);
    }

}
