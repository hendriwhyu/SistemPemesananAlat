<!-- Edit Modal -->
<div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('admin/detail-kategori/{name_categories}') }}">
                @csrf
                @method('put')
                <input type="hidden" value="{{ $item->id }}" name="id">
                {{-- {!! Form::model($item, ['method' => 'patch', 'route' => ['admin.kategori', $item->id_categories]]) !!} --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Edit Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-text">Kode</span>
                        <input type="text" aria-label="First name" name="kode_alat" class="form-control"
                            value="{{ $item->kode_alat }}" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Unit</span>
                        <input type="text" aria-label="First name" name="name_alat" class="form-control"
                            value="{{ $item->name_alat }}" required>
                    </div>
                    <br>
                    <select class="form-select" aria-label="Default select example" name="status">
                        @if ($item->status == 'ready')
                            <option value="ready" selected>Ready</option>
                            <option value="sold">Sold</option>
                        @elseif ($item->status == 'sold')
                            <option value="ready">Ready</option>
                            <option value="sold" selected>Sold</option>
                        @endif
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                        Cancel</button>
                    {{ Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                </div>
                {{-- {!! Form::close() !!} --}}
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('admin/detail-kategori/{name_categories }') }}">
                @csrf
                @method('delete')
                <input type="hidden" value="{{ $item->id }}" name="id">

                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Delete Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-text">Kode</span>
                        <input type="text" aria-label="First name" name="kode_alat" class="form-control"
                            value="{{ $item->kode_alat }}" disabled>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Unit</span>
                        <input type="text" aria-label="First name" name="name_alat" class="form-control"
                            value="{{ $item->name_alat }}" disabled>
                    </div>
                    <br>
                    <select class="form-select" aria-label="Default select example" name="status" disabled>
                        @if ($item->status == 'ready')
                            <option value="ready" selected>Ready</option>
                            <option value="sold">Sold</option>
                        @elseif ($item->status == 'sold')
                            <option value="ready">Ready</option>
                            <option value="sold" selected>Sold</option>
                        @endif
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                        Cancel</button>
                    {{ Form::button('<i class="bx bxs-trash"></i> Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) }}
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Detail Modal -->
<div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('admin/detail-kategori/{name_categories}/detail-unit') }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" value="{{ $item->kode_alat }}" name="alat">
                {{-- {!! Form::model($item, ['method' => 'patch', 'route' => ['admin.kategori', $item->id_categories]]) !!} --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Detail Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('image/' . $item->detailUnit->image) }}" class="card-img-top"
                                alt="dataUnit.{{ $item->kode_alat }}">
                            <div class="input-group">
                                <input type="file"
                                    class="form-control @error('image')
                                        is-invalid
                                    @enderror"
                                    id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
                                    aria-label="Upload" name="image">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="input-group input-group-sm mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Harga</label>

                                <input type="text"
                                    class="form-control @error('harga')
                                        is-invalid
                                    @enderror"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                    value="{{ $item->detailUnit->harga }}" name="harga">
                                @error('harga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="type">Jenis</label>
                                <select
                                    class="form-select @error('type')
                                        is-invalid
                                    @enderror"
                                    id="type" name="type">
                                    @if ($item->detailUnit->type_book == 'jam')
                                        <option value="jam" selected>Jam</option>
                                        <option value="hari">Hari</option>
                                    @elseif ($item->detailUnit->type_book == 'hari')
                                        <option value="jam">Jam</option>
                                        <option value="hari" selected>Hari</option>
                                    @endif
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group" style="height:80px">
                                <span class="input-group-text text-align-center">Deskripsi</span>
                                <textarea name="deskripsi" class="form-control @error('deskripsi')
                                        is-invalid
                                    @enderror" style="height:80px" aria-label="With textarea">{{ $item->detailUnit->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fa fa-times"></i>
                        Cancel</button>
                    {{ Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                </div>
                {{-- {!! Form::close() !!} --}}
            </form>
        </div>
    </div>
</div>
