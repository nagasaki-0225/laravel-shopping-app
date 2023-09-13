@extends('layouts.app')
@section('pagecss')
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row mt-5 mb-5">   
       
        <h3>ユーザー名: {{ Auth::user()->name }}<h3>
        <div class="myPage">
            <a href="{{route('my_page.edit')}}" class="example1">登録情報変更</a>
            <a href="{{route('my_page.edit_password')}}" class="example1">パスワード変更</a>
            <a href="#" class="example1">ログアウト</a>
            <a href="#" class="example1">退会</a>
        </div>


            

                
        
        
        </div>
    </div>
</div>
@endsection
