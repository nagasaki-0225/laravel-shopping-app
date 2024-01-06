<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Dish;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;




class DishController extends Controller
{
    public function index(Request $request) {

        $keyword = $request->input('keyword');

        $query = Dish::query();

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        $dishes = $query->get();

        $user_id = Auth::id();
        // Authクラスは、ログインしているユーザーの情報を取得するためのクラス  
        $dishes=Dish::where("user_id", Auth::id())->get();
        // resources/views/dish/index.blade.php を表示

        return view('dish.index', compact('dishes','keyword'));
    
    }

    // 料理の詳細ページを表示（dish.show）
    public function show(Dish $dish) {  
        $user_id = Auth::id();  
        $stocks=Stock::where("user_id",Auth::id())->get();

        return view('dish.show',compact('dish','stocks'));
    }

    public function store(Request $request, Dish $dish, Stock $stock) {    
    
            $dish = new Dish();
            $dish->name = $request->input('name');
            $dish->user_id = Auth::id();
            $dish->save();    
    
            return redirect()->route('dish.index');     
    }

    // 画像のアップロード
    public function upload(Request $request, Dish $dish){
        $path = $request->file('image')->store('images', 's3');
        Storage::disk('s3')->setVisibility($path, 'public');
        $dish->image_path=Storage::disk('s3')->url($path);
        $dish->save();

        return redirect()->route('dish.show',$dish);
    }



    // 料理の詳細ページの編集モーダル
    public function edit(Dish $dish) {
        
        return view('dish.edit', compact('dish'));
    }

    // 料理の情報を追加する
    public function update(Request $request, Dish $dish) {
        $request->validate([
            'stocks' => 'required|array',
            'item_numbers' => 'required|array',
        ]);
        $stockIds = $request->input('stocks');
        $itemNumbers = $request->input('item_numbers');
    
        DB::transaction(function() use ($dish, $stockIds, $itemNumbers) {
            foreach ($stockIds as $stockId) {
                // 現在の料理と在庫の関連を確認
                $currentRelation = DB::table('dish_stock')
                    ->where('dish_id', $dish->id)
                    ->where('stock_id', $stockId)
                    ->first();
    
                if ($currentRelation) {
                    // 既存の関連がある場合、更新する
                    DB::table('dish_stock')
                        ->where('id', $currentRelation->id)
                        ->update(['item_number' => $itemNumbers[$stockId]]);
                } else {
                    // ない場合、新しい関連を作成する
                    DB::table('dish_stock')->insert([
                        'dish_id' => $dish->id,
                        'stock_id' => $stockId,
                        'item_number' => $itemNumbers[$stockId],
                        'user_id' => Auth::id(),
                    ]);
                }
            }
        });
        return redirect()->route('dish.show',['dish' => $dish->id]);        

    }
    

    // 料理の削除（index画面）
    public function destroy(Dish $dish) {
        $dish->delete();
        return redirect()->route('dish.index');        
   }


    

}
