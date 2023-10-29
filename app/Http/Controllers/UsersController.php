<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user = Auth::user();
        $user->name = $request->input('name') ? $request->input('name') : $user->name;
        $user->email = $request->input('email') ? $request->input('email') : $user->email;
        // $user->name = $request->name;
        // $user->email = $request->email;
        $user->update();
        return redirect()->route('my_page.index')->with('msg_success', 'プロフィールの更新が完了しました');
    }

    public function index()
    {
        $user = Auth::user();
        return view('my_page.index');
    }

    public function edit(User $user) {
        return view('my_page.edit');
    }

    public function destroyUserDelete(){
        // 現在ログインしているユーザーを取得
        $user = Auth::user();
        // 論理削除
        $user->delete();
        // 退会完了ページへリダイレクト
        return redirect()->route('after_user_delete');
    }
    public function userDeleteComplete(){
        return view('my_page.userDelete');
    }
}
