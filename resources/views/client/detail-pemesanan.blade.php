@extends('client.component-client.master-client')
@section('title', 'Dashboard')
@section('content-client')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <h1 class="app-page-title">Pesan Unit</h1>
                <!--//row-->
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                        <form method="post" action="{{ route('client.addpesanan') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $dataUnit->kode_alat }}" name="alat">
                            <div class="modal-body">
                                <input type="hidden" name="id_alat" value="{{ $dataUnit->id }}">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{ asset('image/' . $dataUnit->detailUnit->image) }}"
                                            style="max-width: 200px" class="card-img-top"
                                            alt="dataUnit.{{ $dataUnit->kode_alat }}">
                                    </div>
                                    <div class="col-8">
                                        <div class="mb-1">
                                            <label class="form-label">Nama Alat : {{ $dataUnit->name_alat }}</label>
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label">Kategori :
                                                {{ $dataUnit->relationCategory->name_categories }}</label>
                                        </div>
                                        @if ($dataUnit->detailUnit->type_book == 'hari')
                                            <div class="tanggal">
                                                <div class="mb-1 row">
                                                    <div class="col gap-0">
                                                        <label class="form-label">Tanggal Mulai : </label>
                                                    </div>
                                                    <div class="col gap-0">
                                                        <input type="date" name="tanggalMulai"
                                                            class="form-control tanggalMulai">
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
                                                        <input type="hidden" name="tanggal_selesai"
                                                            id="formatTanggalSelesai">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="harga">Harga</span>
                                                    <input type="text" id="totalHargaPerHari" class="form-control"
                                                        placeholder="Total Harga" aria-label="Harga"
                                                        aria-describedby="harga" disabled>
                                                    <input type="hidden" name="totalHarga" id="totalHargaAPIPerHari">
                                                    <button class="btn btn-secondary" type="button"
                                                        onclick="hitungTotalwithTanggal('{{ $dataUnit->kode_alat }}')"
                                                        id="inputGroupFileAddon04">Hitung</button>
                                                </div>
                                            </div>
                                        @elseif($dataUnit->detailUnit->type_book == 'jam')
                                            <div class="mb-1 row">
                                                <div class="col">
                                                    <label class="form-label">Jam Peminjaman : </label>
                                                </div>
                                                <div class="col gap-0">
                                                    <input type="hidden" name="jam_pinjam" id="jam_pinjam">
                                                    <input type="time" name="jamPeminjaman"
                                                        class="form-control jamPeminjaman">
                                                </div>
                                            </div>
                                            <div class="mb-1 row">
                                                <div class="col">
                                                    <label class="form-label">Jam Selesai : </label>
                                                </div>
                                                <div class="col gap-0">
                                                    <input type="hidden" name="jam_selesai" id="jam_selesai">
                                                    <input type="time" name="jamSelesai" class="form-control jamSelesai">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-text" id="harga">Harga</span>
                                                <input type="text" id="totalHargaPerJam" class="form-control"
                                                    placeholder="Total Harga" aria-label="Harga" aria-describedby="harga"
                                                    disabled>
                                                <input type="hidden" name="totalHarga" id="totalHargaAPIPerJam">
                                                <button class="btn btn-secondary" type="button"
                                                    onclick="hitungTotalwithJam('{{ $dataUnit->kode_alat }}')"
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
                        <!--//app-card-footer-->
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <!--//row-->

            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->
        <!--//app-footer-->

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

        function hitungTotalwithJam(kode) {
            var jamPeminjaman = $(".jamPeminjaman").val();
            var jamSelesai = $(".jamSelesai").val();

            var currentTime = new Date(); // Waktu saat ini
            var inputDatePinjam = new Date(currentTime.toDateString() + " " + jamPeminjaman);
            var inputDateSelesai = new Date(currentTime.toDateString() + " " + jamSelesai);

            var formatDate = function(date) {
                return date.getFullYear() + '-' +
                    ('0' + (date.getMonth() + 1)).slice(-2) + '-' +
                    ('0' + date.getDate()).slice(-2) + ' ' +
                    ('0' + date.getHours()).slice(-2) + ':' +
                    ('0' + date.getMinutes()).slice(-2) + ':' +
                    ('0' + date.getSeconds()).slice(-2);
            };

            $('#jam_pinjam').val(formatDate(inputDatePinjam));
            $('#jam_selesai').val(formatDate(inputDateSelesai));

            var timeDifference = inputDateSelesai - inputDatePinjam;
            var diffHours = Math.floor(timeDifference / (1000 * 60 * 60));
            var diffMinutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
            if (diffMinutes <= 59) {
                diffHours += 1;
            }

            $.ajax({
                    type: "GET",
                    url: "/api/unit/" + kode,
                })
                .done(function(data) {
                    var totalHarga = diffHours * data[0].harga;
                    var formattedTotalHarga = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                    }).format(totalHarga);

                    $('#totalHargaPerJam').val(jamPeminjaman ? formattedTotalHarga : new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                    }).format(0));
                    $('#totalHargaAPIPerJam').val(totalHarga);
                });
        }
    </script>

@endsection
