<!-- Pemesanan Modal -->
<div class="modal fade" id="pesan{{ $item->kode_alat }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ route('client.addpesanan') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $item->kode_alat }}" name="alat">
                {{-- {!! Form::model($item, ['method' => 'patch', 'route' => ['admin.kategori', $item->id_categories]]) !!} --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Pesan Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_alat" value="{{ $item->id }}">
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
                            @if ($item->detailUnit->type_book == 'hari')
                                <div class="tanggal">
                                    <div class="mb-1 row">
                                        <div class="col gap-0">
                                            <label class="form-label">Tanggal Mulai : </label>
                                        </div>
                                        <div class="col gap-0">
                                            <input type="date" name="tanggalMulai" class="form-control tanggalMulai">
                                            <input type="hidden" name="tanggal_mulai" id="formatTanggalMulai">
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col gap-0">
                                            <label class="form-label">Tanggal Selesai : </label>
                                        </div>
                                        <div class="col gap-0">
                                            <input type="date" name="tanggalSelesai"
                                                class="form-control tanggalSelesai">
                                            <input type="hidden" name="tanggal_selesai" id="formatTanggalSelesai">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text" id="harga">Harga</span>
                                        <input type="text" id="totalHargaPerHari" class="form-control"
                                            placeholder="Total Harga" aria-label="Harga" aria-describedby="harga"
                                            disabled>
                                        <input type="hidden" name="totalHarga" id="totalHargaAPIPerHari">
                                        <button class="btn btn-secondary" type="button"
                                            onclick="hitungTotalwithTanggal('{{ $item->kode_alat }}')"
                                            id="inputGroupFileAddon04">Hitung</button>
                                    </div>
                                </div>
                            @elseif($item->detailUnit->type_book == 'jam')
                                <div class="mb-1 row">
                                    <div class="col">
                                        <label class="form-label">Jam Peminjaman : </label>
                                    </div>
                                    <div class="col gap-0">
                                        <input type="hidden" name="jam_pinjam" id="jam_pinjam">
                                        <input type="time" name="jamPeminjaman" class="form-control jamPeminjaman">
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text" id="harga">Harga</span>
                                    <input type="text" id="totalHargaPerJam" class="form-control"
                                        placeholder="Total Harga" aria-label="Harga" aria-describedby="harga" disabled>
                                    <input type="hidden" name="totalHarga" id="totalHargaAPIPerJam">
                                    <button class="btn btn-secondary" type="button"
                                        onclick="hitungTotalwithJam('{{ $item->kode_alat }}')"
                                        id="inputGroupFileAddon04">Hitung</button>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::button('<i class="bx bx-cart" ></i> Pesan', ['class' => 'btn btn-success text-light', 'type' => 'submit']) }}
                </div>
                {{-- {!! Form::close() !!} --}}
            </form>
        </div>
    </div>
</div>
<script>
    $(".tanggalMulai").change(function() {
        const tanggal_mulai = $(".tanggalMulai").val();
        const waktu_sekarang = new Date().toLocaleTimeString();
        const formatTanggal = tanggal_mulai + ' ' + waktu_sekarang;
        // console.log(formatTanggal);
        $("#formatTanggalMulai").val(formatTanggal);
    });
    $(".tanggalSelesai").change(function() {
        const tanggal_selesai = $(".tanggalSelesai").val();
        const waktu_sekarang = new Date().toLocaleTimeString();
        const formatTanggal = tanggal_selesai + ' ' + waktu_sekarang;
        // console.log(formatTanggal);
        $("#formatTanggalSelesai").val(formatTanggal);
    });

    function hitungTotalwithTanggal($kode) {

        const tanggalMulai = new Date($(".tanggalMulai").val());
        const tanggalSelesai = new Date($(".tanggalSelesai").val());
        const diffInDays = Math.floor((tanggalSelesai.getTime() - tanggalMulai.getTime()) / (1000 * 60 * 60 *
            24)); // Hitung selisih dalam hari

        console.log(diffInDays);

        $.ajax({
                type: "GET",
                url: "/api/unit/" + $kode,
            })
            .done(function(data) {
                const totalHarga = diffInDays * data[0].harga
                return diffInDays <= 0 ? $('.totalHargaPerHari').val(new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                }).format(0)).$('.totalHargaAPIPerHari').val(0) : $('#totalHargaPerHari').val(
                    new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                    }).format(totalHarga)), $('#totalHargaAPIPerHari').val(totalHarga);
            })
    }

    function hitungTotalwithJam($kode) {
        var jamPeminjaman = $(".jamPeminjaman").val();
        console.log(jamPeminjaman)
        var currentTime = new Date(); // Waktu saat ini
        var inputDate = new Date(currentTime.toDateString() + " " + jamPeminjaman);
        var year = inputDate.getFullYear();
        var month = (inputDate.getMonth() + 1).toString().padStart(2, '0');
        var day = inputDate.getDate().toString().padStart(2, '0');
        var hours = inputDate.getHours().toString().padStart(2, '0');
        var minutes = inputDate.getMinutes().toString().padStart(2, '0');
        var seconds = inputDate.getSeconds().toString().padStart(2, '0');
        $('#jam_pinjam').val(year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds);
        var timeDifference = inputDate - currentTime;
        var diffHours = Math.floor(timeDifference / (1000 * 60 * 60));
        var diffMinutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
        if (diffMinutes <= 59) {
            diffHours += 1;
        }
        $.ajax({
                type: "GET",
                url: "/api/unit/" + $kode,
            })
            .done(function(data) {
                const totalHarga = diffHours * data[0].harga
                return !jamPeminjaman ? $('#totalHargaPerJam').val(new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                    }).format(0)) :
                    $('#totalHargaPerJam').val(new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                    }).format(totalHarga)),
                    $('#totalHargaAPIPerJam').val(totalHarga);
            })
    }
</script>
