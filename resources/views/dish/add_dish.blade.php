<div class="modal fade" id="addDishModal" tabindex="-1" aria-labelledby="addDishModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDishModalLabel">追加</h5>

{{-- 検索バー --}}
                {{-- <div class="search">
                    <form action={{ route('stock') }} method="GET">
                        <input type="text" name="keyword" value="{{ $keyword }}" placeholder="search:" class="searchTerm" >
                        <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
                    </form>
                </div> --}}
{{-- 検索バー --}}

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <form action="{{ route('dish.update', $dish) }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">材料を選択</label>
                        @foreach($stocks as $stock)
                            @php
                                $flag_id = 0;
                            @endphp
                            @foreach($dish->stocks as $dish_stock)
                                @if($stock->id == $dish_stock->id)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="{{ $stock->id }}" id="stock-{{ $stock->id }}" name="stocks[]"
                                        @if(in_array($dish_stock->id, $dish->stocks->pluck('id')->toArray())) checked @endif>
                                        <label class="form-check-label" for="stock-{{ $stock->id }}">
                                            {{ $stock->name }}   ({{$stock->item_unit}})
                                        </label>
                                        {{-- valueの値 --}}
                                        <input type="number" value="{{ old('item_number', $dish_stock->pivot->item_number ?? '' ) }}"                                
                                            class="form-control" id="item-number-{{ $stock->id }}" name="item_numbers[{{ $stock->id }}]">
                                    </div>
                                    @php
                                        $flag_id = $dish_stock->id;
                                    @endphp
                                @endif
                            @endforeach
                            @if ($flag_id == $stock->id)
                                @continue
                            @else
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="{{ $stock->id }}" id="stock-{{ $stock->id }}" name="stocks[]"
                                    @if(in_array($stock->id, $dish->stocks->pluck('id')->toArray())) checked @endif>
                                    <label class="form-check-label" for="stock-{{ $stock->id }}">
                                        {{ $stock->name }}   ({{$stock->item_unit}})
                                    </label>
                                    {{-- valueの値 --}}
                                    <input type="number" value="{{ old('item_number', $stock->pivot->item_number ?? '' ) }}"                                
                                        class="form-control" id="item-number-{{ $stock->id }}" name="item_numbers[{{ $stock->id }}]">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                    <button type="submit" class="btn btn-primary">追加</button>
                </div>
            </form>
        </div>
    </div>
</div>
