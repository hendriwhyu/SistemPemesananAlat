{{-- Verifikasi Bukti Denda --}}
<div class="modal fade" id="bayardenda{{ $item->kode_rental }}" tabindex="-1" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.verifDenda') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="kode_rental" value="{{ $item->kode_rental }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Pembayaran Denda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        @if (isset($item->kembali->bukti_bayar_denda))
                            <img src="{{ asset('image/bukti-denda/' . $item->unit->detailUnit->image) }}"
                                alt="{{ $item->unit->detailUnit->image }}.jpg" class="card-img-top">
                            <label for="detailImage"
                                style="color: black; font-size:20px">{{ $item->unit->name_alat }}</label>
                        @endif
                    </div>
                    <div class="row mb-3">
                        @if (isset($item->kembali->totalDenda))
                            <label for="">Total Denda : Rp.
                                {{ number_format($item->kembali->totalDenda) }}</label>
                        @endif
                    </div>
                    <div class="row">
                        <div class="container mb-3">
                            <select class="form-select menu-pembayaran" name="pembayaran"
                                aria-label="Default select example">
                                <option selected disabled>Pilih Menu Pembayaran</option>
                                <option value="1">Belum Lunas</option>
                                <option value="2">Lunas</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                        Cancel</button>
                    <button type="submit" class="btn btn-success submit" data-bs-dismiss="modal"><i
                            class="fa fa-check-square-o "></i>
                        Validasi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(".invalid-feedback").hide();
    $(".submit").attr("disabled", true);
    $(".menu-pembayaran").on("change", function() {
        var selectedOption = $(this).val();

        if (selectedOption == 1) {
            $(".submit").attr("disabled", false);
        }elseif(selectedOption == 2){
            $(".submit").attr("disabled", false);
        }
    });
</script>
