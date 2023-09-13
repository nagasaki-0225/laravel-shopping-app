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
            <h4>{{ $dish->name }}{{ $dish->amount }} 人前</h4>
            @foreach ($dish->stocks as $stock)
                <p>材料名：{{ $stock->name }} {{ $stock->item_unit }}</p>
                <p>個数：{{ $stock->number }} {{ $stock->item_unit }} × {{ $dish->amount }}</p>
                <p>金額：{{ $stock->price }} {{ $stock->item_unit }} × {{ $dish->amount }}</p>
            @endforeach
        @endforeach




        </div>
    

        <div class="col-md-3 rounded text-center pt-1 d-block" style="background-color: #d9d9d9">
        <h3>献立リスト</h3>
        @foreach ($dishes as $dish)
            <h4>{{ $dish->name }}</h4>
        @endforeach

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