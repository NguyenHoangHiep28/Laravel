<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    $products =Product::all();
    return view('product-list', ['product' => $products]);
});
Route::delete('delete/{productId}/{image}', [ProductController::class, 'delete']);
Route::post('upload',[ProductController::class, 'upload']);
Route::post('update/{productId}', [ProductController::class, 'update']);
Route::post('edit/{productId}/{image}', [ProductController::class, 'edit']);
