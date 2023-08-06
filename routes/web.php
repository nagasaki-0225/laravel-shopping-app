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

// フォームの処理と作成
Route::get('/dish/create',[\App\Http\Controllers\DishController::class,'create'])->name('dish.create');

// データ挿入
Route::post('/dish',[\App\Http\Controllers\DishController::class,'store'])->name('dish.store');

Route::get('/stock',[\App\Http\Controllers\StockController::class,'index'])->name('stock');

Route::get('/stock/create',[\App\Http\Controllers\StockController::class,'create'])->name('stock.create');

Route::post('/stock',[\App\Http\Controllers\StockController::class,'store'])->name('stock.store');


Route::get('/list',[\App\Http\Controllers\TopController::class,'list'])->name('list');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
