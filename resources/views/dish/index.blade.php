@extends('layouts.app')

@section('pagename') dish @endsection

@section('pagecss')
    <link rel="stylesheet" href="{{ asset('css/dish.css') }}"> 
@endsection

@section('content')
<div class="container">
    <div class="row">
        {{-- 料理の欄 --}}
        <div class="col-md-9">
            {{-- 検索バーの挿入 --}}
            <div class="search">
                <form action={{ route('dish.index') }} method="GET">
                <input type="text" name="keyword" value="{{ $keyword }}" placeholder="search:" class="searchTerm" >
                <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
                </form>
            </div>
            {{-- ここまで検索バー --}}
            <div class="row">
                @foreach($dishes as $dish)
                <div class="col-md-6">
                    <input type = "checkbox">
                    <img src = "https://placehold.jp/150x150.png">
                    <a href="{{route('dish.show', $dish)}}" class= "text-decoration-none link-dark">{{$dish->name}}</a>     
                </div>
                <br>
                @endforeach  
               
            </div>
        </div>

        {{-- 選択中の料理の表示欄 --}}
        <div class="col-md-3 bg-secondary">
            選択中のメニュー
            
        </div>
    </div> 
    <div class="container">
        {{-- ルーディング　アクションを合わせる --}}
        <form action="{{ route('dish.store') }}" method="post">
            @csrf
            {{-- $request->__ここにname属性の値が代入される 　placeholder 料理名--}}
            <input name ="name" class="form-control" type="text" placeholder="新規登録">
            <button class="btn btn-primary">登録</button>
        </form>
    </div>
</div>
   

@endsection