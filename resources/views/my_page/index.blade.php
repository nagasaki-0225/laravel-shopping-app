@extends('layouts.app')
@section('pagecss')
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')

<div class="row mt-5 mb-5">
    <div class="col-sm-6 offset-sm-3">
       
        <h3>ユーザー名: {{ Auth::user()->name }}<h3>
        <div class="myPage">
            <a href="{{route('my_page.edit')}}" class="example1">登録情報変更</a>
            <a href="{{route('my_page.edit_password')}}" class="example1">パスワード変更</a>
            <a href="{{ route('logout') }}" class="example1" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

            
            
            <a href="{{ route('destroyUserDelete') }}" class="example1">退会</a>
            <form method="post" action="{{ route('destroyUserDelete') }}">
                @csrf
                @method('delete')
                <input type="submit" value="退会する">
            </form>
        </div>

       
    


            

                
        
        
        </div>
    </div>
</div>
@endsection
