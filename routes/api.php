<?php

use App\Http\Controllers\ProductContoller;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/products',[ProductController::class,'index']); //lista prdo
Route::post('/products',[ProductController::class,'store']); ///crear prod
Route::get('/products/{id}',[ProductController::class,'show']); //most prod
Route::put('/products/{id}',[ProductController::class,'update']); //act prod
Route::delete('/product/{id}',[ProductController::class,'destroy']); //elim prod