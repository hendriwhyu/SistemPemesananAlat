<!-- Pemesanan Modal -->
<div class="modal fade" id="pesan{{ $item->kode_alat }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('admin/detail-kategori/{name_categories}/detail-unit') }}"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $item->kode_alat }}" name="alat">
                {{-- {!! Form::model($item, ['method' => 'patch', 'route' => ['admin.kategori', $item->id_categories]]) !!} --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Pesan Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('image/' . $item->detailUnit->image) }}" class="card-img-top"
                                alt="dataUnit.{{ $item->kode_alat }}">
                        </div>
                        <div class="col-8">
                            <div class="mb-1">
                                <label class="form-label">Nama Alat : {{ $item->name_alat }}</label>
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Kategori :
                                    {{ $item->relationCategory->name_categories }}</label>
                            </div>
                            <div class="mb-1 row">
                                <div class="col gap-0">
                                    <label class="form-label">Tanggal Mulai : </label>
                                </div>
                                <div class="col gap-0">
                                    <input type="date" id="tanggalMulai" name="tanggalMulai" class="form-control">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <div class="col gap-0">
                                    <label class="form-label">Tanggal Selesai : </label>
                                </div>
                                <div class="col gap-0">
                                    <input type="date" id="tanggalSelesai" name="tanggalSelesai"class="form-control">
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text" id="harga">Harga</span>
                                <input type="text" class="form-control" placeholder="Total Harga" aria-label="Harga" aria-describedby="harga">
                                <button class="btn btn-secondary" type="button" onclick="hitungTotalHargaProduk()"
                                    id="inputGroupFileAddon04">Hitung</button>
                            </div>

                        </div>
                    </div>
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
