{{-- Upload Bukti --}}
<div class="modal fade" id="bukti{{ $item->kode_rental }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnewModalLabel">Upload Bukti</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="kode_rental" value="{{ $item->kode_rental }}">
                <div class="row">
                    <div class="row">
                        <div class="container">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <img src="{{ asset('image/bukti-pembayaran/' . $item->bukti_pembayaran) }}"
                                    alt="{{ $item->bukti_pembayaran }}" style="width: 200px">
                            </div>
                            <div class="col-12">
                                <label for="">Bukti Pembayaran : Unit({{ $item->unit->name_alat }})</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
