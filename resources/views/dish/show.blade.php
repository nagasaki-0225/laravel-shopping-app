@extends('layouts.app')
@section('pagename') {{$dish->name}} @endsection
@section('pagecss')
<link rel="stylesheet" href="{{ asset('css/dish_show.css') }}">
@endsection
@section('content')

<div class="container">
	<div class="row">
		 
		<div>  
    @if ($errors->any())  
        <ul>  
            @foreach ($errors->all() as $error)  
                <li>{{ $error }}</li>  
            @endforeach  
        </ul>  
    @endif  
</div>
		<div class="col-md-3">
			<div class="icon">
					<img width=150 height=150  src="{{$dish->image_path ?? "https://placehold.jp/150x150.png"}}" class="rounded-circle">
					<a href="#" class="px-2 m-0 fs-5 link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addImageModal"><h1><i class="fa-solid fa-camera-retro" style="color: #D9D9D9;"></i></h1></a>
					 <!-- 目標の追加用モーダル -->
					 @include('dish.add_image') 	
			</div>
		</div>
	
		
		<div class="col-md-9">
			<div class="fs-2 p-2 fw-bold text-center bd-highlight">{{$dish->name}}</div>	
			<table class="table">
				<thead>
					<tr>
						<th scope="col">材料</th>
						<th scope="col">必要量</th>
						<th scope="col">単位</th>
					</tr>
				</thead>
				
				<tbody>
					@foreach($dish->stocks as $stock)
					<tr>
						<td>{{$stock->name}}</td>
						<td>{{$stock->pivot->item_number}}</td>
						<td>{{$stock->item_unit}}</td>
						<td><a href="#" class= "text-decoration-none link-dark" data-bs-toggle="modal" data-bs-target="#deleteDishModal"><h3><i class="fa-solid fa-trash" style="color: #D9D9D9;"></i></h3></a></td>
						@include('dish.delete_dish')
					</tr>
					@endforeach
				</tbody>
				
					</tr>
				
			</table>
		</div>
	@include('dish.add_dish')    			
	</div>		
					   
    <div class="position-fixed bottom-10 end-0 ">
		<div class="mb-1 button_frame">
			<a href="#" class="px-2 m-1 fs-5 link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addDishModal"><h1><i class="fa-solid fa-square-plus" style="color: #D9D9D9;"></i>追加</h1></a>                
		</div>
		<div>
			<a href="{{ route('dish.index') }}" class="back"><h1><i class="fa-solid fa-arrow-rotate-left" style="color: #D9D9D9;"></i>戻る</h1></a>     
		</div>
	</div>
</div>

@endsection