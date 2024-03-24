<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('posts',\App\Http\Controllers\PostController::class);
Route::resource('categories',\App\Http\Controllers\CategoryController::class);
Route::resource('secondcategories',\App\Http\Controllers\SecondCategoryController::class);

//Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create');

//Route::get('categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
//Route::get('/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
//Route::post('/categories/store', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
//Route::get('/categories/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
//Route::put('/categories/update', [\App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
