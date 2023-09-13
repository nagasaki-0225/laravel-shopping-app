<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ChangePasswordController extends Controller
{
    public function edit()
    {
        return view('my_page.edit_password');
    }

    protected function validator(array $data)
    {
        return Validator::make($data,[
            'new_password' => 'required|string|min:6|confirmed',
            ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if(!password_verify($request->current_password,$user->password))
        {
            return redirect()->route('my_page.edit_password')
                ->with('warning','パスワードが違います');
        }

        //新規パスワードの確認
        $this->validator($request->all())->validate();

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('my_page.index')
            ->with('status','パスワードの変更が終了しました');
    }
}
