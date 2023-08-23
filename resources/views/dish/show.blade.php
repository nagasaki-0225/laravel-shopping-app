@extends('layouts.app')
@section('pagename') {{$dish->name}} @endsection
@section('pagecss')
<link rel="stylesheet" href="{{ asset('css/test.css') }}">
@endsection
@section('content')

<div class="container">
	<h1>{{$dish->name}}</h1>
    <img src = "https://placehold.jp/150x150.png">
    <a href="#" class="px-2 m-1 fs-5 link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addImageModal"><h1><i class="fa-solid fa-camera-retro" style="color: #D9D9D9;"></i></h1></a>


	<table class="table">
		<thead>
			<tr>
				<th scope="col">材料</th>
				<th scope="col">必要量</th>
				<th scope="col">単位</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($stocks as $stock)
				<tr>
				<td><a href="#" class= "text-decoration-none link-dark" data-bs-toggle="modal" data-bs-target="#editStockModal{{ $stock->id }}">{{$stock->name}}</a></td>
				<td>{{$stock->item_number}}</td>
				<td>{{$stock->item_unit}}</td>
				<td><a href="#" class= "text-decoration-none link-dark" data-bs-toggle="modal" data-bs-target="#deleteStockModal{{ $stock->id }}"><h3><i class="fa-solid fa-trash" style="color: #D9D9D9;"></i></h3></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@include('dish.add_dish')                 
																		   


     


	<div class="position-fixed bottom-0 end-0 ">
		<div class="mb-1 button_frame">
			<a href="#" class="px-2 m-1 fs-5 link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addDishModal"><h1><i class="fa-solid fa-square-plus" style="color: #D9D9D9;"></i>追加</h1></a>
		</div>
	</div>
</div>
@endsection