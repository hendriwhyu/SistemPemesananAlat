<!-- Detail Modal -->
<div class="modal fade" id="detail{{ $item->kode_rental }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
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
                            <div class="input-group mb-1">
                                <div class="description-ktp-peminjam" style="color: black; font-size:16px">
                                    <span>NIK :</span>
                                    <label for="floatingInputGroup1"
                                        class="text-capitalize">{{ $item->peminjam->ktp }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group mb-2">
                                <div class="description-ktp-peminjam" style="color: black; font-size:16px">
                                    <span>Harga :</span>
                                    <label for="floatingInputGroup1" class="text-capitalize">Rp.
                                        {{ $item->unit->detailUnit->harga }} /
                                        {{ $item->unit->detailUnit->type_book }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group mb-2">
                                <div class="description-ktp-peminjam" style="color: black; font-size:16px">
                                    <span>Deskripsi :</span>
                                    <label for="floatingInputGroup1" class="text-capitalize">
                                        {{ $item->unit->detailUnit->deskripsi }}</label>
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
                        <div class="row">
                            <div class="input-group mb-2">
                                <div class="description-ktp-peminjam" style="color: black; font-size:16px">
                                    <span>Tanggal Kembali :</span>
                                    <label for="floatingInputGroup1" class="text-capitalize">
                                        {{ $item->tanggal_kembali }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
