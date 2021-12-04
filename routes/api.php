<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('websites', [WebsiteController::class, 'get_all_websites']);
Route::post('create/website', [WebsiteController::class, 'store_website']);

Route::get('subscriptions', [SubscriptionController::class, 'get_all_subscriptions']);
Route::post('create/subscription', [SubscriptionController::class, 'store_subscription']);

Route::get('posts', [PostController::class, 'get_all_posts']);
Route::post('create/post', [PostController::class, 'store_post']);
