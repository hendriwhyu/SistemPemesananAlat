<!-- Add Modal -->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('admin/user-add') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-bold">Username</label>
                        <input type="text" class="form-control" name="username" id="exampleFormControlInput1"
                            placeholder="Masukkan username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-bold">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Masukkan email">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword5" class="form-label">Password</label>
                        <input type="password" id="inputPassword5" class="form-control"
                            aria-labelledby="passwordHelpBlock" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-bold">Role</label>
                        <select class="form-select" aria-label="Default select example" name="role">
                            <option selected disabled>Pilih Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Client</option>
                            <option value="3">Manager</option>
                        </select>
                    </div>


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
