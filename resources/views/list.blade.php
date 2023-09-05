@extends('layouts.app')

@section('pagename') list @endsection

@section('pagecss')
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
@endsection

@section('content')
<h1>list</h1>

@foreach ($dishes as $dish)
    @foreach ($dish->stocks() as $stock)
    <p>{{ $stock->name }}</p>
    @endforeach
@endphp
<p>{{ $dissh->amount }}</p>
    
@endforeach

@endsection