@extends('layouts.app')
@section('pagename') stock @endsection
@section('pagecss')
<link rel="stylesheet" href="{{ asset('css/test.css') }}">
@endsection
@section('content')

<div class="container">
	<h1>在庫管理</h1>

	<table class="table">
		<thead>
			<tr>
				<th scope="col">材料</th>
				<th scope="col">在庫</th>
				<th scope="col">単位</th>
				<th scope="col">金額</th>
				<th scope="col">店名</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($stocks as $stock)
				<tr>
					<td><a href="#" class= "text-decoration-none link-dark" data-bs-toggle="modal" data-bs-target="#editStockModal{{ $stock->id }}">{{$stock->name}}</a></td>
					<td>{{$stock->number}}</td>
					<td>{{$stock->item_unit}}</td>
					<td>{{$stock->price}}</td>
					<td>{{$stock->shop_name}}</td>
					<td><a href="#" class= "text-decoration-none link-dark" data-bs-toggle="modal" data-bs-target="#deleteStockModal{{ $stock->id }}"><h3><i class="fa-solid fa-trash" style="color: #D9D9D9;"></i></h3></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@include('stock.add_stock')                 
                                                                               
		@foreach ($stocks as $stock) 	
			<!-- 在庫の編集用モーダル -->
			@include('stock.edit_stock') 
			@include('stock.delete_stock')
		@endforeach                       


	<div class="position-fixed bottom-0 end-0 ">
		<div class="mb-1 button_frame">
			<a href="#" class="px-2 m-1 fs-5 link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addStockModal"><h1><i class="fa-solid fa-square-plus" style="color: #D9D9D9;"></i>追加</h1></a>
		</div>
	</div>
</div>
@endsection