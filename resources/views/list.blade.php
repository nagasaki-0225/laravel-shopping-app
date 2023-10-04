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
            <h3>買い物リスト</h3>
            <div class="container">
                <div class="row mt-4">
                    @php
                        $grandTotal = 0; // 全店の合計金額
                    @endphp
                    @if(!empty($groupedStocks))
                    @foreach ($groupedStocks as $shopName => $stocks)
                        <div class="col-md-12 rounded py-2 mt-2" id="shopPrice">
                            <h4>{{ $shopName }}</h4>
                            @php
                                $shopTotal = 0; // その店の合計金額
                            @endphp
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">材料</th>
                                        <th scope="col">個数</th>
                                        <th scope="col">金額</th>
                                    </tr>
                                </thead>
                                <tbody>
                            @foreach ($stocks as $stock)
                            <tr>
                                <td>{{ $stock->name }}</td>
                                <td>{{ $stock->item_number }} {{ $stock->item_unit }}</td>
                                <td>{{ $stock->price }}円</td>
                            </tr>
                                @php
                                    if ($stock->item_unit == "ml" || $stock->item_unit == "g"){
                                        $shopTotal += $stock->price;
                                        $grandTotal += $stock->price;
                                    } else {
                                        $shopTotal += $stock->item_number * $stock->price;
                                        $grandTotal += $stock->item_number * $stock->price;
                                    }
                                @endphp
                            @endforeach
                                </tbody>
                            </table>
                            <p><strong>この店の合計：{{ $shopTotal }}円</strong></p>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3 rounded text-center pt-4 d-block" style="background-color: #d9d9d9" id="choiceDish">
            <h3>献立リスト</h3>
            <br>
            @foreach ($dishes as $dish)
                <h4>{{ $dish->name }}</h4>
            @endforeach
            <div class="total">
                <p><strong>Total：{{ $grandTotal }}円</strong></p>
            </div>
        </div>
    </div>
</div>






@endsection