<div class="modal fade" id="addDishModal" tabindex="-1" aria-labelledby="addDishModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDishModalLabel">追加</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <form action="{{ route('dish.update', $dish) }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">材料を選択</label>
                        @foreach($dish->stocks as $stock)
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
