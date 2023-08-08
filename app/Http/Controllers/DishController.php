<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    public function index() {
        // Authクラスは、ログインしているユーザーの情報を取得するためのクラス
        $dishes=Dish::where("user_id", Auth::id())->get();
        // resources/views/dish/index.blade.php を表示
        return view('dish.index', compact('dishes'));
    }

    public function create() {      
        $dishes=Dish::where("user_id", Auth::id())->get();    
        return view('dish.create',compact('dishes'));
    }

    public function store(Request $request) {    
        $request->validate([
            'name' => 'required',
        ]);

        $dish = new Dish();
        $dish->name = $request->input('name');
        $dish->user_id = Auth::id();
        $dish->save();

        return redirect()->route('dish.index');       
    }

    public function destroy(Dish $dish) {
        $dish->delete();
        return redirect()->route('dish.create');        
   }

}
