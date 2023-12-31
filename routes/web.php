<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\stringcontroller;

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

Route::get('/',function() {
    $n="Ganesh";
    return view('welcome')->with('name',$n);
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
});


Route::get('/contact', function () {
    return view('contact');
});

Route::get('/history', function () {
    return view('history');
});

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/calculator/form', function () {
    return view('calculator.form');
});

Route::get('/calculator/result', function () {
    $a=request()->get('a');
    $b=request()->get('b');
    $opr=request()->get('opr');
    $result=null;

    if($opr=='add')
    $result=$a+$b;
    elseif($opr=='sub')
    $result=$a-$b;
    elseif($opr=='mul')
    $result=$a*$b;
    return view('calculator.result')
    ->with('result',$result)
    ->with('a',$a)
    ->with('b',$b)
    ->with('opr',$opr);
});

Route::get('/man/form', function () {
    return view('man.form');
});
Route::get('/man/result', function () {
    $str=request()->get('str');
    $opr=request()->get('opr');
    $result=null;

    if($opr=='srv')
    $result=strrev($str);
    elseif($opr=='noofw')
    $result=str_word_count($str);
    elseif($opr=='noofl')
    $result=strlen($str);
    return view('man.result')
    ->with('result',$result)
    ->with('str',$str)
    ->with('opr',$opr);
});

Route::middleware('auth')->group(function () {

Route::get('/calculator/form', [CalculatorController::class, 'form'])->name('calculator.form');
Route::get('/calculator/result', [CalculatorController::class, 'result']);
Route::get('/calculator/logs', [CalculatorController::class, 'logs']);
//Route::get('/calculator/show/{id}', [CalculatorController::class, 'show']);

});

Route::get('calculator/show/{id}', [CalculatorController::class, 'api']);
Route::get('/calculator/queries', [CalculatorController::class, 'queries']);
//Route::get('/calculator/edit/{id}', [CalculatorController::class, 'editid'])->name('calculator.edit');

Route::get('/calculator/edit/{id}', [CalculatorController::class, 'edit']);
Route::post('/calculator/save/{id}', [CalculatorController::class, 'save']);
Route::post('calculator/destroy/{id}', [CalculatorController::class, 'destroy']);




Route::get('/string/form', function () {
});

Route::get('/string/result', function () {
});


Route::get('/man/form', [stringcontroller::class, 'form']);
Route::get('/man/result', [stringcontroller::class, 'result']);
Route::get('/man/logs', [stringcontroller::class, 'logs']);

Route::get('/string/form', function () {
});

Route::get('/string/result', function () {
});

Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
