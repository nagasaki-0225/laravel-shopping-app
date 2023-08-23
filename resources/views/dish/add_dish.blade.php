<div class="modal fade" id="addDishModal" tabindex="-1" aria-labelledby="addDishModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDishModalLabel">追加</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <form action="{{ route('add_dish.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">材料名</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="item_number" class="form-label">必要量</label>
                        <input type="number" name="item_number" class="form-control" id="item_number">
                    </div>
                    <div class="mb-3">
                        <label for="item_unit" class="form-label">単位</label>
                        <input type="text" name="item_unit" class="form-control" id="item_unit">
                    </div>                      
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>
