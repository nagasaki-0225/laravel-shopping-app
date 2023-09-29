@extends('layouts.app')

@section('pagecss')
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-sm-6 offset-sm-3">
       
        <h3>登録情報変更</h3>

        {{-- ユーザー名の変更 --}}
        {{-- メールアドレスの変更 --}}
            
        
        <form method="POST" action="{{route('user.update')}}">
        @csrf
            <label for="userName">ユーザー名</label>
            <input class="form-control" name="name" value=" {{Auth::user()->name }}">
        <br>
      

            <label for="e-mail">e-mail</label>
            <input class="form-control" name="e-mail" value="{{Auth::user()->email}}">
            <input class="btn" type="submit" value="変更">
        </form>




            

                
        
        
    
    </div>
</div>
@endsection
