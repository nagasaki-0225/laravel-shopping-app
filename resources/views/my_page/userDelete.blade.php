@extends('layouts.app')

@section ('pagename') 退会 @endsection

@section('pagecss')
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')
<h1>退会しました</h1>

<a href="{{route('top')}}" class="example1">新規登録・ログイン画面へ</a>


@endsection

