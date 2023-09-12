<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;

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

Auth::routes();

// Route::get('/ ページのurl ',[\App\Http\Controllers\TopController::class,'    '])->name('ルートの名前');

// ログインしていないと見れないページ
Route::group(['middleware' => 'auth'], function () {
    Route::get('/',[App\Http\Controllers\TopController::class,'home'])->name('name');

    Route::get('/test',[\App\Http\Controllers\TopController::class,'test'])->name('test');
    
    Route::get('/dish',[\App\Http\Controllers\DishController::class,'index'])->name('dish.index');
    Route::get('/dish/{dish}',[\App\Http\Controllers\DishController::class,'show'])->name('dish.show');
    // 画像のアップロード
    Route::post('/upload/{dish}', [\App\Http\Controllers\DishController::class, 'upload'])->name('dish.upload_image');
    // 追加用のモーダル
    Route::put('/dish/{dish}/update',[\App\Http\Controllers\DishController::class,'update'])->name('dish.update');
    Route::post('/dish/{dish}',[\App\Http\Controllers\DishController::class,'store'])->name('add_dish.store');
    // 削除用モーダル
    Route::delete('/dish/{dish}',[\App\Http\Controllers\DishController::class,'destroy'])->name('delete_dish.destroy');

    // フォームの処理と作成
    Route::get('/dish/create',[\App\Http\Controllers\DishController::class,'create'])->name('dish.create');
    // データ挿入
    Route::post('/dish',[\App\Http\Controllers\DishController::class,'store'])->name('dish.store');
    
    
    // 在庫管理の表示
    Route::get('/stock',[\App\Http\Controllers\StockController::class,'index'])->name('stock');
    // 在庫データの追加
    Route::post('/stock',[\App\Http\Controllers\StockController::class,'store'])->name('stock.store');
    // 在庫の更新機能
    Route::patch('/stock/{stock}', [\App\Http\Controllers\StockController::class, 'update'])->name('stock.update');
    Route::delete('/stock/{stock}', [\App\Http\Controllers\StockController::class, 'destroy'])->name('stock.destroy');



    
    Route::get('/list',[\App\Http\Controllers\TopController::class,'list'])->name('list');
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});