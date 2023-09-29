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
            <div class="container">
                <div class="row mt-4">
                    <h3>店ごとの在庫</h3>
                    @foreach ($groupedStocks as $shopName => $stocks)
                        <div class="col-md-12">
                            <h4>{{ $shopName }}</h4>
                            @foreach ($stocks as $stock)
                                <p>材料名：{{ $stock->name }}</p>
                                <p>個数：{{ $stock->item_number }} {{ $stock->item_unit }}</p>
                                <p>金額：{{ $stock->price }}</p>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
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