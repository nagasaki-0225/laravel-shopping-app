<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Stock;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class TopController extends Controller
{    
    public function top(){
        return view('top');
    }

    public function test(){
        return view('test');
    }

    public function list(Request $request) {
        $stocks = [];
        $all_needs_stocks = [];
    
        if (!$request->has('selected_dishes')) {
            return view('list', ['dishes' => []]);
        }
    
        foreach ($request->selected_dishes as $dish_id => $value) {
            $dish = Dish::find($dish_id);
            $dish->amount = $value['amount'];
    
            foreach ($dish->stocks as $stock) {
                $needed_stock = $stock->pivot->item_number * $dish->amount;
                Log::info($stock->id . "が" .$stock->pivot->item_number . "個必要で" .$dish->amount . "前だから" . $needed_stock);
    
                if (array_key_exists($stock->id, $all_needs_stocks)) {
                    $all_needs_stocks[$stock->id] += $needed_stock;
                } else {
                    $all_needs_stocks[$stock->id] = $needed_stock;
                }
            }
        }
    
        // shop_nameでグルーピング
        foreach ($all_needs_stocks as $stock_id => $needed_amount) {
            $results = DB::table('stocks')
                ->select('name',
                    'shop_name',
                    DB::raw('count(*) as total'),
                    'price',
                    'item_unit',
                    DB::raw("'{$needed_amount}' as item_number")
                )
                ->where('id', $stock_id)
                ->groupBy('id', 'shop_name')
                ->get();
    
            $stocks[] = $results;
        }
    
        dd($stocks); // この行はデバッグのためだけにあると思われるので、最終的な実装では削除またはコメントアウトしてください。
    
        return view('list', ['dishes' => []]); // この行ではdishesを空の配列として返しています。必要に応じて修正してください。
    }
}
