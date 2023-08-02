@extends('layouts.app')
@section('pagename') stock @endsection
@section('pagecss')
<link rel="stylesheet" href="{{ asset('css/test.css') }}">
@endsection
@section('content')
<h1>stock</h1>
<br>
<h1>在庫かんり</h1>
<div class="position-fixed bottom-0 end-0 ">
<div class="mb-5 button_frame">

<a href="{{ route('stock.create') }}" class="text-deceoration-none plusbutton"><i class="fa-solid fa-plus"></i></a>
</div></div>
@endsection