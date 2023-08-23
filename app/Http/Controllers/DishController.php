<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DishController extends Controller
{
    public function index(Request $request) {
        // Authクラスは、ログインしているユーザーの情報を取得するためのクラス
        $dishes=Dish::where("user_id", Auth::id())->get();
        // resources/views/dish/index.blade.php を表示

        $keyword = $request->input('keyword');

        $query = Dish::query();

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        $dishes = $query->get();

        return view('dish.index', compact('dishes','keyword'));
    
    }

    // 料理の詳細ページを表示（dish.show）
    public function show(Dish $dish) {    

        return view('dish.show',compact('dish'));
    }

    // 画像のアップロード
    public function uploadImg(Request $request){
        $dish = $request->file('upload_img');
    }



    // 料理の詳細ページの編集モーダル
    public function edit(Dish $dish) {
        return view('dish.edit', compact('dish'));
    }

    // 料理の情報を追加する
    public function store(Request $request, Dish $dish, Stock $stock) {    
        $request->validate([
            'name' => 'required',
        ]);

        $dish = new Dish();
        $dish->name = $request->input('name');
        $dish->user_id = Auth::id();
        $dish->item_number = $request->input('item_number');
        $dish->save();

        $dish->stocks()->sync($request->input('stock_ids'));


        return redirect()->route('dish.index');       
    }

    // 料理の削除（index画面）
    public function destroy(Dish $dish) {
        $dish->delete();
        return redirect()->route('dish.index');        
   }


    

}
