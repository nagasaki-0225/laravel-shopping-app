<?php

namespace App\Http\Controllers;

use App\Models\Stock;   //在庫データを扱えるように
use App\Models\User;   //ユーザーデータを扱えるように
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //ログインユーザーのデータをあつかえる


class StockController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->input('keyword');
        $stocks = Stock::where('user_id', Auth::id())
                        ->where(function ($query) use ($keyword) {
                            if (!empty($keyword)) {
                                $query->where('name', 'LIKE', "%{$keyword}%");
                            }
                        })
                        ->get();
        return view('stock.stock', compact('stocks', 'keyword'));
    }
   
    public function create() {        
        return view('stock.create');
    }
    public function store(Request $request) {
        
        $stock = new Stock();
        $stock->name = $request->input('name');
        $stock->number = $request->input('number');
        $stock->item_unit = $request->input('item_unit');
        $stock->shop_name =$request->input('shop_name');
        $stock->price = $request->input('price');
        $stock->user_id = Auth::id();
        $stock->save();

        return redirect()->route('stock')->with('flash_message', 'データを登録しました。');
    }
    public function update(Request $request, Stock $stock) {
        

        $stock->name = $request->input('name');
        $stock->number = $request->input('number');
        $stock->item_unit = $request->input('item_unit');
        $stock->shop_name =$request->input('shop_name');
        $stock->price = $request->input('price');
        $stock->user_id = Auth::id();
        $stock->save();

        return redirect()->route('stock')->with('flash_message', 'データを更新しました。');   
    }
    public function destroy(Stock $stock) {
            //
            $stock->delete();
    
            return redirect()->route('stock')->with('flash_message', 'データを削除しました。');       
       }  
}

