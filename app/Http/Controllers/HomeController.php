<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('my_page.index');
    }

    public function update(Request $request,User $use)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        foreach ($user as $key => $value) {

            // nullの場合更新対象から除外する
            
            if($value == null) {
            
            unset($user[$key]);
            
            }
        }

        $user->save();
        return redirect()->route('my_page.index');
        // return redirect()->route('');//保存後はリダイレクトさせたいページを指定したりする
    }

    public function edit(User $user) {
        return view('my_page.edit');
    }
}
