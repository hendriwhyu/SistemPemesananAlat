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
                            value="{{ $item->kode_alat }}">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Unit</span>
                        <input type="text" aria-label="First name" name="name_alat" class="form-control"
                            value="{{ $item->name_alat }}">
                    </div>
                    <br>
                    <select class="form-select" aria-label="Default select example" name="status">
                        @if ($item->status == 'ready')
                            <option value="ready" active>Ready</option>
                            <option value="sold">Sold</option>
                        @elseif ($item->status == 'sold')
                            <option value="ready">Ready</option>
                            <option value="sold" active>Sold</option>
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
<div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel"
    aria-hidden="true">
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
                            <option value="ready" active>Ready</option>
                            <option value="sold">Sold</option>
                        @elseif ($item->status == 'sold')
                            <option value="ready">Ready</option>
                            <option value="sold" active>Sold</option>
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
