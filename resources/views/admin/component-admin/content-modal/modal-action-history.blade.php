<!-- Detail Modal -->
<div class="modal fade" id="update{{ $item->kode_rental }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.verified') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="kode_rental" value="{{ $item->kode_rental }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Detail Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="{{ asset('image/' . $item->unit->detailUnit->image) }}"
                                alt="{{ $item->unit->detailUnit->image }}.jpg" class="card-img-top">
                            <label for="detailImage"
                                style="color: black; font-size:20px">{{ $item->unit->name_alat }}</label>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="input-group mb-2">
                                    <div class="description-peminjam" style="color: black; font-size:16px">
                                        <span>Peminjam :</span>
                                        <label for="floatingInputGroup1"
                                            class="text-capitalize">{{ $item->peminjam->username }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group mb-2">
                                    <div class="description-ktp-peminjam" style="color: black; font-size:16px">
                                        <span>Tanggal Mulai :</span>
                                        <label for="floatingInputGroup1" class="text-capitalize">
                                            {{ $item->tanggal_mulai }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group mb-2">
                                    <div class="description-ktp-peminjam" style="color: black; font-size:16px">
                                        <span>Tanggal Selesai :</span>
                                        <label for="floatingInputGroup1" class="text-capitalize">
                                            {{ $item->tanggal_selesai }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center pb-2">
                                <div class="col-auto">
                                    <label for="" class="col-form-label">Tanggal Kembali</label>
                                </div>
                                <div class="col-auto">
                                    <input type="date" id="inputdate" name="tanggal_kembali" class="form-control">
                                    <input type="hidden" id="formatTanggal" name="tanggalBalik">
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <label for="">Status</label>
                                </div>
                                <div class="col-10">
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option selected disabled>Status Rental</option>
                                        <option value="canceled">Canceled</option>
                                        <option value="verified">Verified</option>
                                        <option value="kembali">Kembali</option>
                                    </select>
                                </div>
                            </div>

                        </div>
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
<script>
    $(document).ready(function() {
        $("#inputdate").change(function() {
            const tanggal_kembali = $("#inputdate").val();
            const waktu_sekarang = new Date().toLocaleTimeString();
            const formatTanggal = tanggal_kembali + ' ' + waktu_sekarang;
            console.log(formatTanggal);
            $("#formatTanggal").val(formatTanggal);
        });
    });
</script>
