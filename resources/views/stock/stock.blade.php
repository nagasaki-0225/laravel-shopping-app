@extends('layouts.app')
@section('pagename') stock @endsection
@section('pagecss')
<link rel="stylesheet" href="{{ asset('css/test.css') }}">
@endsection
@section('content')

<div class="container">
	<h1>stock</h1>
	<br>
	<h1>在庫かんり</h1>

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
					<td>>{{$stock->name}}</td>
					<td>{{$stock->number}}</td>
					<td>{{$stock->item_unit}}</td>
					<td>{{$stock->price}}</td>
					<td>{{$stock->shop_name}}</td>
                    <td><button><i class="fa-solid fa-pencil"></i></button></td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="position-fixed bottom-0 end-0 ">
		<div class="mb-5 button_frame">
			<a href="{{ route('stock.create') }}" class="text-deceoration-none plusbutton"><i class="fa-solid fa-plus"></i></a>
		</div>
	</div>
</div>
@endsection