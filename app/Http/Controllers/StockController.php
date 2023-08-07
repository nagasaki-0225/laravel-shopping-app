<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index() {        
        return view('stock.stock');
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
        $post->save();

        return redirect()->route('stock.create');   
    }
}
