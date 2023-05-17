@extends('admin.component-admin.master-admin')
@section('title', 'Kelola Unit')
@section('content-admin')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl" style="height: 540px">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Kategori Unit  ({{ $Kategori->name_categories }})</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                </div>
                                <div class="col-auto">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#addnew"
                                        class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah</button>
                                </div>
                            </div>
                            <!--//row-->
                        </div>
                        <!--//table-utilities-->
                    </div>
                    <!--//col-auto-->
                </div>
                @if (Session::has('status'))
                    <div class="alert alert-success mt-4" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <!--//row-->

                <div class="app-card app-card-orders-table mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">

                            <table class="table mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell" style="width:50px">No.</th>
                                        <th class="cell">Kode Alat</th>
                                        <th class="cell">Nama Alat</th>
                                        <th class="cell">Status</th>
                                        <th class="cell text-center" style="width:200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Unit as $item)
                                        <tr>
                                            <td class="cell">{{ $loop->iteration }}</td>
                                            <td class="cell">{{ $item->kode_alat }}</td>
                                            <td class="cell">{{ $item->name_alat }}</td>
                                            <td class="cell text-center badge bg-success text-uppercase text-light" >{{ $item->status }}</td>
                                            <td class="cell text-end"><a href="#edit{{ $item->id_categories }}"
                                                    data-bs-toggle="modal" class="text-info"><i
                                                        class='bx bxs-edit'></i>Ubah</a> | <a
                                                    href="#delete{{ $item->id_categories }}" data-bs-toggle="modal"
                                                    class="text-danger"><i class='bx bx-trash'></i>Delete</a>
                                                | <a href="" class="text-success"><i
                                                        class='bx bx-layer'></i>Detail</a>
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
