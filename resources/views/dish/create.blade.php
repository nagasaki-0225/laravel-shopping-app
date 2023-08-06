@extends('layouts.app')
@section('pagename') dish @endsection
@section('pagecss')
<link rel="stylesheet" href="{{ asset('css/dish.css') }}">
@endsection
@section('content')
<br>
<h1>dish</h1>
   
<div class="container">
    {{-- ルーディング　アクションを合わせる --}}
    <form action="{{ route('dish.store') }}" method="post">
    @csrf
    {{-- $request->__ここにname属性の値が代入される 　placeholder 料理名--}}
        <input name ="name" class="form-control" type="text" placeholder="Default input">
        <button class="btn btn-primary">送信する
        </button>
    </form>
</div>



 



@endsection