<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/' , [HomeController::class,'homePage']);


Route::get('home', [HomeController::class , 'index'])->name('home')->middleware('auth'); 
Route::get('post', [HomeController::class,'post'])->middleware(['auth' , 'admin']);
// Route::post('logout', [HomeController::class,'logOut']); 


// admin Route
Route::get('all_articals' ,[AdminController::class,'index']) ;


// create artical for user 
Route::get('show_articals', [UserController::class,'index'])->name('user') ;
Route::get('create',[UserController::class,'create']) ;
Route::post('store', [UserController::class,'store']) ;
Route::post('update',[UserController::class,'update']) ;
Route::post('edit',[UserController::class,'edit']) ;





// accept post 
Route::get('accept_post/{id}' ,[AdminController::class,'accept']) ;

//reject post 

Route::get('reject_post/{id}' ,[AdminController::class,'reject']) ;






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';