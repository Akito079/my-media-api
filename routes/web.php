<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TrendPostController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //admin
    Route::get('dashboard', [ProfileController::class, 'index'])->name('dashboard');
     //update account info
     Route::post('admin/updateProfile',[ProfileController::class,'updateProfile'])->name('admin#updateProfile');
     //changepassword
     Route::get('admin/changepasswordpage',[ProfileController::class,'changePasswordPage'])->name('admin#changePasswordPage');
     Route::post('admin/changepassword',[ProfileController::class,'changePassword'])->name('admin#changePassword');
    //admin list
    Route::get('admin/list',[ListController::class,'index'])->name('admin#list');
    Route::get('admin/list/delete/{id}',[ListController::class,'deleteLists'])->name('admin#delete');
    //category
    Route::get('category',[CategoryController::class,'index'])->name('admin#category');
    Route::get('category/createPage',[CategoryController::class,'createPage'])->name('admin#categoryCreatePage');
    Route::post('category/create',[CategoryController::class,'categoryCreate'])->name('admin#categoryCreate');
    Route::get('category/delet/{id}',[CategoryController::class,'delete'])->name('admin#categoryDelete');
    Route::post('category/search',[CategoryController::class,'categorySearch'])->name('admin#categorySearch');
    Route::get('category/updatePage/{id}',[CategoryController::class,'categoryUpdatePage'])->name('admin#categoryUpdatePage');
    Route::post('category/update',[CategoryController::class,'categoryUpdate'])->name('admin#categoryUpdate');
    //Post
    Route::get('admin/post',[PostController::class,'index'])->name('admin#post');
    Route::get('admin/post/createPage',[PostController::class,'createPostPage'])->name('admin#postCreatePage');
    Route::post('admin/post/create',[PostController::class,'createPost'])->name('admin#postCreate');
    Route::get('admin/post/delete/{id}',[PostController::class,'deletePost'])->name('admin#deletePost');
    Route::get('admin/post/updatePage/{id}',[PostController::class,'updatePostPage'])->name('admin#postUpdatePage');
    Route::post('admin/post/update',[PostController::class,'updatePost'])->name('admin#updatePost');
    //trend post
    Route::get('admin/trendPost',[TrendPostController::class,'index'])->name('admin#trendPost');
    Route::get('trendpost/details/{id}',[TrendPostController::class,'trendPostDetails'])->name('admin#trendPostDetails');
});
