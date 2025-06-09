<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DishesController;

Route::get("/",[OrderController::class,'index']);
Route::get("/home",[HomeController::class,'index']);
Route::get("order",[DishesController::class,'order']);
Route::get("order/{order}/approve",[DishesController::class,'approve'])->name("order.approve");
Route::get("order/{order}/cancel",[DishesController::class,'cancel'])->name("order.cancel");
Route::get("order/{order}/ready",[DishesController::class,'ready'])->name("order.ready");
Route::post("/order_submit",[OrderController::class,'store'])->name("order.create");

Auth::routes();

Route::get('/home', [OrderController::class, 'index'])->name('home');
Route::resource("dish",DishesController::class);

Route::post('/dish/store', [DishesController::class, 'store'])->name('dishes.store');
Route::get('/dish/{{$dish->id}}/edit', [DishesController::class, 'edit'])->name('dishes.edit');

Route::get("/order_form",[OrderController::class,'index'])->name('order.index');
