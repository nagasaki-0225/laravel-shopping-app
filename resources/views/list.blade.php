@extends('layouts.app')

@section('pagename') list @endsection

@section('pagecss')
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9"> 
        {{-- 材料リスト --}}
        <h3>材料リスト</h3>
        @foreach ($dishes as $dish)
            @foreach ($dish->stocks() as $stock)
                <p>{{ $stock->name }}</p>
            @endforeach
        @endforeach




        </div>
    

        <div class="col-md-3 rounded text-center pt-1 d-block" style="background-color: #d9d9d9">
        <h3>献立リスト</h3>


        </div>

    </div>

</div>

<div class="container">
    <div class="total">
        <p>Total</p>
            {{-- チェックした材料の金額を足していく --}}
    </div>
</div>



@endsection