<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\usercontroller;

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

//Route::get('calculator/show/{id}', [CalculatorController::class, 'api']);
Route::get('/calc/{id}', [CalculatorController::class, 'api']);
Route::get('/users',[usercontroller::class,'index'])->name('user.index');
Route::get('/users/{id}',[usercontroller::class,'show'])->name('user.show');

Route::post('users/create',[UserController::class,'store'])->name('user.create');
//update the record
Route::put('users/{id}',[UserController::class,'update'])->name('user.update');
//delete the record
Route::delete('users/{id}',[UserController::class,'destroy'])->name('user.destroy');
