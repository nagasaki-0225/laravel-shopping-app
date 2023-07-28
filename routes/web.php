<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/ ページのurl ',[\App\Http\Controllers\TopController::class,'    '])->name('   ');


Route::get('/',[App\Http\Controllers\TopController::class,'home'])->name('name');

Route::get('/test',[\App\Http\Controllers\TopController::class,'test'])->name('test');

Route::get('/dish',[\App\Http\Controllers\TopController::class,'dish'])->name('dish');

Route::get('/stock',[\App\Http\Controllers\TopController::class,'stock'])->name('stock');

Route::get('/rist',[\App\Http\Controllers\TopController::class,'rist'])->name('rist');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
