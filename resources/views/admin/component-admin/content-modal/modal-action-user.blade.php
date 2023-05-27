<!-- Edit Modal -->
<div class="modal fade" id="edit{{ $item->id_users }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('admin/user-edit') }}">
                @csrf
                @method('put')
                <input type="hidden" value="{{ $item->id_users }}" name="id_users">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-text">Username</span>
                        <input type="text" aria-label="First name" name="username" class="form-control"
                            value="{{ $item->username }}">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Email</span>
                        <input type="email" aria-label="First name" name="email" class="form-control"
                            value="{{ $item->email }}">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Password</span>
                        <input type="password" aria-label="First name" name="password" class="form-control"
                            value="{{ $item->password }}">
                    </div>
                    <br>
                    <select class="form-select" aria-label="Default select example" name="role">
                        @if ($item->id_role == '1')
                            <option value="1" selected>Admin</option>
                            <option value="2">Client</option>
                            <option value="3">Manager</option>
                        @elseif ($item->id_role == '2')
                            <option value="1">Admin</option>
                            <option value="2" selected>Client</option>
                            <option value="3">Manager</option>
                        @elseif($item->id_role == '3')
                            <option value="1">Admin</option>
                            <option value="2">Client</option>
                            <option value="3" selected>Manager</option>
                        @endif
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                        Cancel</button>
                    {{ Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete{{ $item->id_users }}" tabindex="-1" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('admin/user-delete') }}">
                @csrf
                @method('delete')
                <input type="hidden" value="{{ $item->id_users }}" name="id_users">

                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Delete Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-text">Username</span>
                        <input type="text" aria-label="First name" name="username" class="form-control"
                            value="{{ $item->username }}" disabled>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Email</span>
                        <input type="email" aria-label="First name" name="email" class="form-control"
                            value="{{ $item->email }}" disabled>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Password</span>
                        <input type="password" aria-label="First name" name="password" class="form-control"
                            value="{{ $item->password }}" disabled>
                    </div>
                    <br>
                    <select class="form-select" aria-label="Default select example" name="status" disabled>
                        @if ($item->id_role == '1')
                            <option value="1" selected>Admin</option>
                            <option value="2">Client</option>
                            <option value="3">Manager</option>
                        @elseif ($item->id_role == '2')
                            <option value="1">Admin</option>
                            <option value="2" selected>Client</option>
                            <option value="3">Manager</option>
                        @elseif($item->id_role == '3')
                            <option value="1">Admin</option>
                            <option value="2">Client</option>
                            <option value="3" selected>Manager</option>
                        @endif
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fa fa-times"></i>
                        Cancel</button>
                    {{ Form::button('<i class="bx bxs-trash"></i> Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) }}
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Detail Modal -->
<div class="modal fade" id="detail{{ $item->username }}" tabindex="-1" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnewModalLabel">Detail Unit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="input-group">
                    <span class="input-group-text">Telp</span>
                    <input type="text" aria-label="First name" name="username" class="form-control"
                        value="{{ $item->telp }}" disabled>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-text">NIK</span>
                    <input type="email" aria-label="First name" name="email" class="form-control"
                        value="{{ $item->ktp }}" disabled>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-text">Alamat</span>
                    <textarea name="alamat" class="form-control" style="width:380px;height:80px" aria-label="With textarea" disabled>{{ $item->alamat }}</textarea>
                </div>

                {{-- {!! Form::close() !!} --}}
                </form>
            </div>
        </div>
    </div>
