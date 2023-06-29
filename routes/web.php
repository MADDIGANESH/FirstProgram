<?php

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

Route::get('/',function() {
    $n="Ganesh";
    return view('welcome')->with('name',$n);
});

Route::get('/', function () {
    return view('welcome');
});

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




Route::get('/mn/form1', function () {
    return view('mn.form1');
});

Route::get('/mn/result1', function () {
   
    $str=request()->get('str');
    $opr=request()->get('opr');
    $result=null;

    if($opr=='str')
    $result=strrev($str);
    elseif($opr=='noofw')
    $result=str_word_count($str);
    elseif($opr=='noofl')
    $result=strlen($str);
    return view('mn.result1');
    
});
