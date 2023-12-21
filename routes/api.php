<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;

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


//routes for users to create new artical 
Route::get('/' ,[UserController::class,'index']); 
Route::post('store',[UserController::class,'store'])->middleware('auth:sanctum');
Route::post('update/{id}',[UserController::class,'update'])->middleware('auth:sanctum');
Route::post('delete/{id}' ,[UserController::class , 'destroy'])->middleware('auth:'); 


// login 

Route::post('login' ,[LoginController::class,'login']);
Route::post('logout' ,[LoginController::class,'logout'])->middleware('auth:sanctum');