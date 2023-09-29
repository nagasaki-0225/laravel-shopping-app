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
        if (!$request->has('selected_dishes')) {
            return view('list', ['dishes' => []]);
        }
    
        $all_needs_stocks = [];
    
        foreach ($request->selected_dishes as $dish_id => $value) {
            $dish = Dish::find($dish_id);
            $dish->amount = $value['amount'];
    
            foreach ($dish->stocks as $stock) {
                $needed_stock = $stock->pivot->item_number * $dish->amount;
                $shopName = $stock->shop_name;
    
                if (!isset($all_needs_stocks[$shopName])) {
                    $all_needs_stocks[$shopName] = [];
                }
    
                if (array_key_exists($stock->id, $all_needs_stocks[$shopName])) {
                    $all_needs_stocks[$shopName][$stock->id] += $needed_stock;
                } else {
                    $all_needs_stocks[$shopName][$stock->id] = $needed_stock;
                }
            }
        }
    
        $stocks = [];
    
        foreach ($all_needs_stocks as $shopName => $neededStocks) {
            foreach ($neededStocks as $stock_id => $needed_amount) {
                $result = DB::table('stocks')
                    ->select('name',
                        'shop_name',
                        'price',
                        'item_unit',
                        DB::raw("'{$needed_amount}' as item_number")
                    )
                    ->where('id', $stock_id)
                    ->first();
    
                $stocks[$shopName][] = $result;
            }
        }
    
        dd($stocks); 
    
        return view('list', ['dishes' => $dishes, 'groupedStocks' => $stocks]);
    }    
}
