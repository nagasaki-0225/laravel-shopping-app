<div class="modal fade" id="editDishModal" tabindex="-1" aria-labelledby="editDishModalLabel{{ $stock->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDishModalLabel{{ $stock->id }}">編集</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <form action="{{ route('edit_dish', $dish) }}" method="post">
                @csrf
                @method('patch')                                                                    
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">材料名</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $stock->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="item_number" class="form-label">必要量</label>
                        <input type="number" name="item_number" class="form-control" id="item_number" value="{{ $stock->item_number }}">
                    </div>
                    <div class="mb-3">
                        <label for="item_unit" class="form-label">単位</label>
                        <input type="text" name="item_unit" class="form-control" id="item_unit" value="{{ $stock->item_unit }}">
                    </div>                          
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">更新</button>
                </div>   
            </form>             
        </div>
    </div>
</div>
