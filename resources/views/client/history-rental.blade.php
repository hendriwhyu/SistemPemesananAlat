@extends('client.component-client.master-client')
@section('title', 'History Rental')
@section('content-client')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl" style="height: 540px">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">History Rental</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                </div>
                            </div>
                            <!--//row-->
                        </div>
                        <!--//table-utilities-->
                    </div>
                    <!--//col-auto-->
                </div>
                @if (session('success'))
                    <div class="alert alert-success mt-4" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger mt-4" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <!--//row-->
                <div class="app-card app-card-orders-table mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table" id="tables">
                                <thead>
                                    <tr>
                                        <th class="cell" style="width:50px">No.</th>
                                        <th class="cell">Alat Berat</th>
                                        <th class="cell">Tanggal Mulai</th>
                                        <th class="cell">Tanggal Selesai</th>
                                        <th class="cell">Tanggal Kembali</th>
                                        <th class="cell">Status</th>
                                        <th class="cell">Bukti Bayar</th>
                                        <th class="cell text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ListData as $item)
                                        <tr>
                                            <td class="cell">{{ $loop->iteration }}</td>
                                            <td class="cell">{{ $item->unit->name_alat }}</td>
                                            <td class="cell">{{ $item->tanggal_mulai }}</td>
                                            <td class="cell">{{ $item->tanggal_selesai }}</td>
                                            <td class="cell">
                                                @if ($item->rental && $item->rental->tanggal_kembali)
                                                    {{ $item->rental->tanggal_kembali }}
                                                @endif
                                            </td>
                                            <td class="cell">
                                                @php
                                                    $status = $item->status;
                                                    $kembali = $item->kembali;
                                                    $kembaliStatus = $kembali ? $kembali->status_pengembalian : null;
                                                @endphp

                                                @switch($status)
                                                    @case('booked')
                                                        <span
                                                            class="badge bg-info text-light text-capitalize">{{ $status }}</span>
                                                    @break

                                                    @case('verified')
                                                        <span
                                                            class="badge bg-success text-light text-capitalize">{{ $status }}</span>
                                                        @if ($kembali && $kembaliStatus === 'denda')
                                                            <span
                                                                class="badge bg-danger text-light text-capitalize">{{ $kembaliStatus }}</span>
                                                        @endif
                                                    @break

                                                    @case('canceled')
                                                        <span
                                                            class="badge bg-danger text-light text-capitalize">{{ $status }}</span>
                                                    @break

                                                    @case('kembali')
                                                        <span
                                                            class="badge bg-secondary text-light text-capitalize">{{ $status }}</span>
                                                    @break
                                                @endswitch

                                            </td>
                                            <td class="cell">{{ $item->bukti_pembayaran }}</td>
                                            <td class="cell text-center">
                                                <a href="#upload{{ $item->kode_rental }}" data-bs-toggle="modal"
                                                    class="text-secondary">
                                                    <i class='bx bxs-cloud-upload'></i> Upload
                                                </a> |
                                                <a href="#detail{{ $item->kode_rental }}" data-bs-toggle="modal"
                                                    class="text-success">
                                                    <i class='bx bx-layer'></i> Detail
                                                </a>
                                                @if ($item->kembali != null)
                                                    @if ($item->kembali->status_pengembalian == null)
                                                    @elseif ($item->kembali->status_pengembalian == 'denda')
                                                        | <a href="#bayardenda{{ $item->kode_rental }}"
                                                            data-bs-toggle="modal" class="text-danger">
                                                            <i class='bx bx-layer'></i>Denda
                                                        </a>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                        @include('client.component-client.content-modal.modal-pembayaran-denda')
                                        @include('client.component-client.content-modal.modal-detail-history')
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                        <!--//table-responsive-->
                    </div>
                    <!--//app-card-body-->
                </div>
                <!--//app-card-->
                <!--//tab-pane-->


                <!--//tab-pane-->

                <!--//tab-pane-->
            </div>
            <!--//tab-content-->



        </div>
        <!--//container-fluid-->
    </div>

    <script>
        $(document).ready(function() {
            $("#tables").DataTable();
            $(".inputDenda").hide();
            $(".inputDendaBukti").hide();
            $(".menu-pembayaran").on("change", function() {
                var selectedOption = $(this).val();

                if (selectedOption == 1) {
                    $(".submit").attr("disabled", false);
                    $(".inputDenda").hide();
                    $(".inputDendaBukti").hide();
                } else if (selectedOption == 2) {
                    $(".inputDenda").show();
                    $(".inputDendaBukti").show();
                } else {
                    $(".inputDenda").hide();
                    $(".inputDendaBukti").hide();
                }
            });

        });
    </script>
    <!--//app-content-->
@endsection
