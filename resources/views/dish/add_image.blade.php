<div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addImageModalLabel">画像の選択</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <form action="{{route('dish.upload_image',$dish)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="file" name="image">
			        <input type="submit" value="Upload">
                </div>
            </form>
        </div>
    </div>
</div>


 