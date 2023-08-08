<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StockController extends Controller
{
    public function index() { 
        // Select * from stocks where user_id = 1;
        $stocks=Stock::where("user_id",Auth::id())->get();       
        return view('stock.stock',compact('stocks'));
    }
    public function create() {        
        return view('stock.create');
    }
    public function store(Request $request) {
        $post = new Stock();
        $post->name = $request->input('name');
        $post->number = $request->input('number');
        $post->shop_name =$request->input('shop_name');
        $post->price = $request->input('price');
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->route('stock.create')->with('flash_message', 'データを登録しました。');

    }
}
