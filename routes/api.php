<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// View
Route::get('/products',[ProductController::class,'view']);

// Input
Route::post('/product',[ProductController::class,'store']);

// Update
Route::put('/product/{id}',[ProductController::class,'update']);

// Delete
Route::delete('/product/{id}',[ProductController::class,'delete']);