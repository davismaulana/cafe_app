<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::resource('menus', MenuController::class);
Route::resource('categories', CategoryController::class);
Route::resource('ingredients', IngredientController::class);
Route::resource('orders', OrderController::class);

require __DIR__.'/auth.php';
