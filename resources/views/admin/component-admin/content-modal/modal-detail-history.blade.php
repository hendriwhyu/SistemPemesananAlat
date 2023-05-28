<!-- Detail Modal -->
<div class="modal fade" id="detail{{ $item->kode_rental }}" tabindex="-1" aria-labelledby="myModalLabel"
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
