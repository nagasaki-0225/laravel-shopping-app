<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

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

        foreach ($request->selected_dishes as $key => $value) {
            $dish = Dish::find($key);
            $dish->amount = $value['amount'];
            $dishes[] = $dish;
        }
        return view('list', compact('dishes'));
    }
    //
}
