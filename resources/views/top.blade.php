@extends('layouts.app')

@section ('pagename') HOME @endsection

@section('pagecss')
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')

{{-- login画面 --}}

<p>新規登録・ログイン</p>

<form action="#" method="post" class="loginForm">
    @csrf
        <p>User name</p>
        <input name ="name" class="form-control" type="text">
        <p>Password</p>
        <input name="pass" class="passForm" type="text">   
        <button type="submit" class="dishButton"></button>        
    </form>

@endsection