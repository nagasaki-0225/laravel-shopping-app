@extends('layouts.app')

@section('pagename') dish @endsection

@section('pagecss')
    <link rel="stylesheet" href="{{ asset('css/dish.css') }}"> 
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">  
             {{-- 検索バーの挿入 --}}
            <div class="search">
                <form action={{ route('dish.index') }} method="GET">
                    <input type="text" name="keyword" value="{{ $keyword }}" placeholder="search:" class="searchTerm" >
                    <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
                </form>
            </div>
        {{-- ここまで検索バー --}}
        <br>
        {{-- 料理のらん --}}
            <div class="row">
                @foreach($dishes as $dish)
                <div class="col-md-4 py-3">
                    <input type = "checkbox">
                    <img width=100 height=100  src="{{$dish->image_path ?? "https://placehold.jp/150x150.png"}}" class="rounded-circle">
                    <a href="{{route('dish.show', $dish)}}" class= "text-decoration-none link-dark">{{$dish->name}}</a>     
                </div>
                @endforeach    
            </div>
        </div>

        {{-- 選択中の料理の表示欄 --}}
        <div class="col-md-3 bg-secondary rounded text-center pt-4">
            <div class="selectDish">
                <h3>選択中</h3>
            <input type ="checkbox">




            {{-- 確定ボタン --}}

            {{-- 削除ボタン --}}

            
            </div>
            
        </div>
    </div> 
    <br>
    <div class="container">
        {{-- ルーディング　アクションを合わせる --}}
        <div class="newDish">
        <form action="{{ route('dish.store') }}" method="post">
            @csrf
            {{-- $request->__ここにname属性の値が代入される 　placeholder 料理名--}}
            <input name ="name" class="form-control" type="text" placeholder="Dish">
            <button type="submit" class="dishButton"><i class="fa-solid fa-check" style="color: #ffffff;"></i></button>        
        </form>
        </div>
    </div>
</div>
   

@endsection