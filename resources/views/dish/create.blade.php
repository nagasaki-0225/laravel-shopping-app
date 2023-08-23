@extends('layouts.app')

@section('pagename') dish @endsection

@section('pagecss')
    <link rel="stylesheet" href="{{ asset('css/dish.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>dish</h1>
    {{-- ルーディング　アクションを合わせる --}}
    <form action="{{ route('dish.store') }}" method="post">
        @csrf
        {{-- $request->__ここにname属性の値が代入される 　placeholder 料理名--}}
        <input name ="name" class="form-control" type="text">
        <div>
            <label for="name">料理名</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="stock">材料</label>
            <input type="text" id="stock" name="stock"/>
        </div>
        <div>
            <label for="item_number">数量</label>
            <input type="number" id="item_number" name="item_number"/>
        </div>     
        <div>
            <label for="memo">メモ</label>
            <input type="text" id="memo" name="memo"/>
        </div>   
       
        <button type="submit">確定</button>
        <button class="btn btn-primary">送信する</button>
    </form>
</div>   
@endsection