@extends('manager.component-manager.master-manager')
@section('title', 'Kategori Unit')
@section('content-admin')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl" style="height: 540px">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Kategori Unit</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                </div>
                                {{-- <div class="col-auto">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#addnew"
                                        class="btn btn-primary pull-right text-light"><i class="fa fa-plus"></i>
                                        Tambah</button>
                                </div> --}}
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
                @elseif (session('error'))
                    <div class="alert alert-danger mt-4" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <!--//row-->

                <div class="app-card app-card-orders-table mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            
                            <table id="tables" class="table mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell" style="width:50px">No.</th>
                                        <th class="cell">Kategori</th>
                                        <th class="cell text-center" style="width:200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ListUnit as $item)
                                        <tr>
                                            <td class="cell">{{ $loop->iteration }}</td>
                                            <td class="cell">{{ $item->name_categories }}</td>
                                            <td class="cell text-center"><a href="detail-kategori/{{ $item->name_categories }}"
                                                    class="text-success"><i class='bx bx-layer'></i>Detail</a>
                                                @include('manager.component-manager.content-modal.modal-action-category')
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
    @include('admin.component-admin.content-modal.modal-add-category')
@endsection
