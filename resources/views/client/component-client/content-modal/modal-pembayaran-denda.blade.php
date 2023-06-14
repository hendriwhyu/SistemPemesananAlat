{{-- Upload Bukti Denda --}}
<div class="modal fade" id="bayardenda{{ $item->kode_rental }}" tabindex="-1" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('client.bayarDenda') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if ($kodePembayaranDenda == null)
                @elseif ($kodePembayaranDenda)
                    <input type="hidden" name="kode_rental" value="{{ $kodePembayaranDenda->kode_rental }}">
                @endif
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Pembayaran Denda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="">Total Denda : Rp. {{ number_format($hitungTotalDenda) }}</label>
                        <input type="hidden" class="totalDenda" value="{{ $hitungTotalDenda }}">
                    </div>
                    <div class="row">
                        <div class="container mb-3">
                            <select class="form-select menu-pembayaran" aria-label="Default select example">
                                <option selected disabled>Pilih Menu Pembayaran</option>
                                <option value="1">Cash On Delivery</option>
                                <option value="2">Transfer</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 inputDenda">
                            <label for="exampleFormControlInput1" class="form-label">Nilai Denda</label>
                            <input type="number" class="form-control nilaiDenda" id="exampleFormControlInput1"
                                placeholder="Masukkan Nilai Denda">
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 inputDendaBukti">
                            <label for="exampleFormControlInput1" class="form-label">Bukti Denda</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                id="inputGroupFile02" name="image">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                        Cancel</button>
                    <button type="button" class="btn btn-danger submit" data-bs-dismiss="modal" type="submit"><i
                            class="fa fa-check-square-o "></i>
                        Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(".invalid-feedback").hide();
    $(".submit").attr("disabled", true);


    $(".nilaiDenda").keyup(function() {
        var valueDenda = $(this).val();
        const totalDenda = $(".totalDenda").val();

        if (isNaN(valueDenda)) {
            $(".invalid-feedback").show();
            $(".invalid-feedback").text("Nilai Denda harus berupa angka.");
            $(".submit").attr("disabled", true);
        } else if (!isNaN(totalDenda) && valueDenda < parseInt(totalDenda)) {
            $(".invalid-feedback").show();
            $(".invalid-feedback").text("Harga yang harus dibayar anda kurang.");
            $(".submit").attr("disabled", true);
        } else {
            $(".invalid-feedback").hide();
            $(".submit").attr("disabled", false);
        }
    });
</script>
