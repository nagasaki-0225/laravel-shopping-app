@extends('layouts.app')
@section('pagename') stock @endsection
@section('pagecss')
<link rel="stylesheet" href="{{ asset('css/stock.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="row">
    
    </div> 
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <form action="{{ route('stock.store') }}" method="post">
        @csrf
        <div>
            <label for="name">材料</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="number">在庫</label>
            <input type="number" id="number" name="number"/>
        </div>   
        <div>
            <label for="price">金額</label>
            <input type="number" id="price" name="price"/>
        </div>   
        <div>
            <label for="shop_name">店名</label>
            <input type="text" name="shop_name">
        </div>
        <button type="submit">確定</button>
    </form>
</div>


@endsection