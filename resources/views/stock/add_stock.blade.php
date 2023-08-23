<div class="modal fade" id="addStockModal" tabindex="-1" aria-labelledby="addStockModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStockModalLabel">追加</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <form action="{{ route('stock.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">材料名</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">数量</label>
                        <input type="number" name="number" class="form-control" id="number">
                    </div>
                    <div class="mb-3">
                        <label for="item_unit" class="form-label">単位</label>
                        <input type="text" name="item_unit" class="form-control" id="item_unit">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">金額</label>
                        <input type="number" name="price" class="form-control" id="price">
                    </div>
                    <div class="mb-3">
                        <label for="shop_name" class="form-label">店名</label>
                        <input type="text" name="shop_name" class="form-control" id="shop_name">
                    </div>                              
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>
