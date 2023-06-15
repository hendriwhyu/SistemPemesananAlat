<!-- Edit Modal Profile -->
<div class="modal fade" id="editprofile{{ Auth::user()->id_users }}" tabindex="-1" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ route('client.profile-change') }}">
                @csrf
                @method('put')
                <input type="hidden" value="{{ $dataUsers->id_users }}" name="id_users">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-text">Username</span>
                        <input type="text" aria-label="First name" name="username" class="form-control"
                            value="{{ $dataUsers->username }}">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Email</span>
                        <input type="email" aria-label="First name" name="email" class="form-control"
                            value="{{ $dataUsers->email }}">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">No Hp</span>
                        <input type="number" aria-label="First name" name="telp" class="form-control"
                            value="{{ $dataUsers->telp }}">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Alamat</span>
                        <textarea class="form-control" aria-label="With textarea" name="alamat">{{ $dataUsers->alamat }}</textarea>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">NIK</span>
                        <input type="text" aria-label="First name" name="nik" class="form-control"
                            value="{{ $dataUsers->ktp }}">
                    </div>
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
<!-- Edit Modal Profile Password -->
<div class="modal fade" id="editpassword{{ Auth::user()->id_users }}" tabindex="-1" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ route('client.profile-password') }}">
                @csrf
                @method('put')
                <input type="hidden" value="{{ $dataUsers->id_users }}" name="id_users">
                <input type="hidden" aria-label="First name" name="username" class="form-control"
                    value="{{ $dataUsers->username }}">
                <input type="hidden" aria-label="First name" name="email" class="form-control"
                    value="{{ $dataUsers->email }}">
                <input type="hidden" aria-label="First name" name="telp" class="form-control"
                    value="{{ $dataUsers->telp }}">
                <input type="hidden" aria-label="First name" name="alamat" class="form-control"
                    value="{{ $dataUsers->alamat }}">
                <input type="hidden" aria-label="First name" name="ktp" class="form-control"
                    value="{{ $dataUsers->ktp }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Edit Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-text">Password</span>
                        <input type="password" aria-label="First name" name="password" class="form-control"
                            value="" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Confirm Password</span>
                        <input type="password" aria-label="First name" id="password-confirm"
                            name="password_confirmation"class="form-control" value="" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fa fa-times"></i>
                        Cancel</button>
                    {{ Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                </div>
            </form>
        </div>
    </div>
</div>
