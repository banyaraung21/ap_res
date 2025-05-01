<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DishesController;


Route::get("/home",[HomeController::class,'index']);
Auth::routes();

Route::get('/home', [OrderController::class, 'index'])->name('home');
Route::resource("dish",DishesController::class);

Route::post('/dish/store', [DishesController::class, 'store'])->name('dishes.store');
Route::get('/dish/{{$dish->id}}/edit', [DishesController::class, 'edit'])->name('dishes.edit');
