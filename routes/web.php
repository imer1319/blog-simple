<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Web\PageController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', 'blog');

require __DIR__.'/auth.php';

//web
Route::get('blog', [PageController::class, 'blog'])->name('blog');
Route::get('blog/{slug}', [PageController::class,'post'])->name('post');
Route::get('category/{slug}', [PageController::class,'category'])->name('category');
Route::get('tag/{slug}', [PageController::class,'tag'])->name('tag');

//admin
Route::resource('tags', TagController::class);
Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class);

