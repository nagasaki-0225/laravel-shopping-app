<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UsersController;
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

Route::get('/deleted', [App\Http\Controllers\UsersController::class, 'userDeleteComplete'])->name('after_user_delete');
Route::get('/', function () {
    return redirect('login');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

// Route::get('/ ページのurl ',[\App\Http\Controllers\TopController::class,'    '])->name('ルートの名前');

// ログインしていないと見れないページ
Route::group(['middleware' => 'auth'], function () {
    Route::get('/top',[App\Http\Controllers\TopController::class,'top'])->name('top');

    
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
    
    Route::get('/home', [App\Http\Controllers\UsersController::class, 'index'])->name('my_page.index');
    Route::post('/user/update',[App\Http\Controllers\UsersController::class, 'update'])->name('user.update');
    Route::get('/mypage/edit', [App\Http\Controllers\UsersController::class, 'edit'])->name('my_page.edit');
    Route::delete('/home', [App\Http\Controllers\UsersController::class, 'destroyUserDelete'])->name('destroyUserDelete')->middleware('verified');
   

    Route::get('/password/change',[App\Http\Controllers\ChangePasswordController::class, 'edit'])->name('my_page.edit_password');
    Route::put('/password/change',[App\Http\Controllers\ChangePasswordController::class, 'update'])->name('password.change');
});