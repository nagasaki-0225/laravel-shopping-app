<div class="modal fade" id="deleteDishModal" tabindex="-1" aria-labelledby="deleteDishModalLabel{{ $dish->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteDishModalLabel{{ $dish->id }}">「{{ $dish->name }}」を削除してもよろしいですか？</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <div class="modal-footer">
                <form action="{{ route('delete_dish.destroy', $dish) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </div>
        </div>
    </div>
</div> 

        </div>
    </div>
</div>