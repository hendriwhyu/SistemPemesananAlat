<!-- Add Modal -->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Tambah Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-text">Kode</span>
                        <input type="text" aria-label="First name" name="kode_alat" class="form-control" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Unit</span>
                        <input type="text" aria-label="First name" name="name_alat" class="form-control" required>
                    </div>
                    <br>
                    <select class="form-select" aria-label="Default select example">
                        <option selected disabled>Status</option>
                        <option value="ready">Ready</option>
                        <option value="sold">Sold</option>
                    </select>
                    <input type="hidden" name="id_categories" value="{{ $Kategori->id_categories }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                        Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
