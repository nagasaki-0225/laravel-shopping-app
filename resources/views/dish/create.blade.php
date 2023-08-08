@extends('layouts.app')

@section('pagename') dish @endsection

@section('pagecss')
    <link rel="stylesheet" href="{{ asset('css/dish.css') }}">
@endsection

@section('content')
<h1>dish</h1>
<div class="container">
    <div class="row">
        {{-- 料理の欄 --}}
        @foreach($dishes as $dish)
            <div>
                <div>
                    <h2>{{ $dish->name}}</h2>     
                </div>
            </div>
        @endforeach  
        <div class="col-md-9 bg-primary" style="height:300px;">
            {{-- 検索バーの挿入 --}}
            <div class="row">
                <div class="col-md-6">
                    <h1>料理名 </h1>
                </div>
                <div class="col-md-6">
                    <h1>料理名</h1>
                </div>
            </div>
        </div>
        {{-- 選択中の料理の表示欄 --}}
        <div class="col-md-3 bg-secondary">
            選択中のメニュー
        </div>
    </div> 
</div>
   
<div class="container">
    {{-- ルーディング　アクションを合わせる --}}
    <form action="{{ route('dish.store') }}" method="post">
        @csrf
        {{-- $request->__ここにname属性の値が代入される 　placeholder 料理名--}}
        <input name ="name" class="form-control" type="text" placeholder="Default input">
        <button class="btn btn-primary">送信する</button>
    </form>
</div>
@endsection