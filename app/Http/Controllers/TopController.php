<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Stock;
use Illuminate\Support\Facades\Log;

class TopController extends Controller
{    
    public function top(){
        return view('top');
    }

    public function test(){
        return view('test');
    }

    public function list(Request $request) {    
        if (!$request->has('selected_dishes')) {
            $dishes = collect();
            return view('list', compact('dishes'));
        }

        $all_needs_stocks = [];
        $keys = [];
        foreach ($request->selected_dishes as $key => $value) {
            
            $dish = Dish::find($key);
            
            $dish->amount = $value['amount'];

            foreach ($dish->stocks as $key => $stock) {
                if (array_key_exists($stock->id, $all_needs_stocks)) {
                    Log::info($stock->id . "が" .$stock->pivot->item_number . "個必要で" .$dish->amount . "前だから" . $stock->pivot->item_number * $dish->amount);
                    $all_needs_stocks[$stock->id] += $stock->pivot->item_number * $dish->amount;
                } else {
                    Log::info($stock->id . "が" .$stock->pivot->item_number . "個必要で" .$dish->amount . "前だから" . $stock->pivot->item_number * $dish->amount);
                    $all_needs_stocks[$stock->id] = $stock->pivot->item_number * $dish->amount;
                }
            }

            // shop_nameでグルーピング
            // $all_needs_stocks[$stock->id] で検索&取得
            // stocksに格納
            // DB::table('stocks') or Stock::where('id', ...);
            // $all_needs_stocks[$stock->id]一括検索

            $dishes[] = $dish;
        }

        return view('list', compact('dishes'));
    }
    //
}
