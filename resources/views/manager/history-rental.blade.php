@extends('manager.component-manager.master-manager')
@section('title', 'History Rental')
@section('content-admin')
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
                                <!--//col-->
                                <div class="col-auto">
                                </div>
                            </div>
                            <!--//row-->
                        </div>
                        <!--//table-utilities-->
                    </div>
                    <!--//col-auto-->
                </div>
                <!--//row-->

                <div class="app-card app-card-orders-table mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">

                            <table class="table mb-0 text-left" id="tables">
                                <thead>
                                    <tr>
                                        <th class="cell" style="width:50px">No.</th>
                                        <th class="cell">Username</th>
                                        <th class="cell">Alat Berat</th>
                                        <th class="cell">Tgl Mulai</th>
                                        <th class="cell">Tgl Selesai</th>
                                        <th class="cell">Tgl Kembali</th>
                                        <th class="cell">Status</th>
                                        <th class="d-flex justify-content-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ListData as $item)
                                        <tr>
                                            <td class="cell">{{ $loop->iteration }}</td>
                                            <td class="cell">{{ $item->peminjam->username }}</td>
                                            <td class="cell">{{ $item->unit->name_alat }}</td>
                                            <td class="cell">{{ $item->tanggal_mulai }}</td>
                                            <td class="cell">{{ $item->tanggal_selesai }}</td>
                                            <td class="cell">{{ $item->tanggal_kembali }}</td>
                                            @if ($item->status == 'booked')
                                                <td class="badge bg-info text-light text-capitalize">{{ $item->status }}
                                                </td>
                                            @elseif($item->status == 'verified')
                                                <td class="badge bg-success text-light text-capitalize">{{ $item->status }}
                                                </td>
                                            @elseif($item->status == 'kembali')
                                                <td class="badge bg-secondary text-light text-capitalize">
                                                    {{ $item->status }}
                                                </td>
                                            @elseif($item->status == 'denda')
                                                <td class="badge bg-danger text-light text-capitalize">
                                                    {{ $item->status }}
                                                </td>
                                            @endif
                                            {{-- <td class="cell">{{ $item->unit->name_alat }}</td> --}}
                                            <td class="cell text-center"><a href="#detail{{ $item->kode_rental }}" data-bs-toggle="modal"
                                                    class="text-success"><i class='bx bx-layer'></i>Detail</a>
                                                @include('manager.component-manager.content-modal.modal-detail-history')
                                            </td>
                                        </tr>
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
    <!--//app-content-->


    <!--//app-footer-->

    </div>
@endsection
