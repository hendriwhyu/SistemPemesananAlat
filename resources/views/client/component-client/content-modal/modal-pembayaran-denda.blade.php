{{-- Upload Bukti Denda --}}
<div class="modal fade" id="bayardenda{{ Auth::user()->username }}" tabindex="-1" aria-labelledby="myModalLabel"
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
                    </div>
                    <div class="row">
                        <div class="container mb-3">
                            <select class="form-select" aria-label="Default select example" id="menu-pembayaran">
                                <option selected disabled>Pilih Menu Pembayaran</option>
                                <option value="1">Cash On Delivery</option>
                                <option value="2">Transfer</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-group mb-3" id="inputDenda" style="display: none;">
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
                    {{ Form::button('<i class="fa fa-check-square-o"></i> Bayar', ['class' => 'btn btn-danger', 'type' => 'submit']) }}
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#menu-pembayaran').on('change', function() {
            var selectedOption = $(this).val();

            if (selectedOption == 1) {
                $('#inputDenda').hide();
            } else if (selectedOption == 2) {
                $('#inputDenda').show();
            } else {
                $('#inputDenda').hide();
            }
        });
    });
</script>
