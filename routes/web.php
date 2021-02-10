<?php

use App\Http\Controllers\Web\PageController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', 'blog');

Route::get('blog', [PageController::class, 'blog'])->middleware(['auth'])->name('blog');

require __DIR__.'/auth.php';
