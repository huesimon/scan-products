<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Product::all()->load([
        'tags',
        'subProducts',
    ]);
});

Route::resource('products', ProductController::class);
Route::post('products/{product}/add-tag', [ProductController::class, 'addTag'])->name('products.add-tag');
Route::post('products/{product}/tag/{tag}', [ProductController::class, 'attachTag'])->name('products.attach-tag');
Route::resource('tags', TagController::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
