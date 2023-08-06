<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    public function create() {        
        return view('dish.create');
    }

    public function store(Request $request) {    
        $request->validate([
            'name' => 'required',
        ]);

        $dish = new Dish();
        $dish->name = $request->input('name');
        $dish->user_id = Auth::id();
        $dish->save();

        return redirect()->route('dish.create');       
    }

}
