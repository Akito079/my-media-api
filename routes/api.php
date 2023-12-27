<?php

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ActionLogController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('user/login',[AuthController::class,'login']);
Route::post('user/register',[AuthController::class,'register']);
// Route::get('category',[AuthController::class,'categoryList'])->middleware('auth:sanctum');

//Post
Route::get('allPostList',[PostController::class,'allPost']);
Route::post('post/search',[PostController::class,'postSearch']);
Route::post('post/details',[PostController::class,'postDetail']);

//category
Route::get('allCategory',[CategoryController::class,'allCategory']);
Route::post('category/search',[CategoryController::class,'categorySearch']);

//action log
Route::post('post/actionLog',[ActionLogController::class,'setActionLog']);
