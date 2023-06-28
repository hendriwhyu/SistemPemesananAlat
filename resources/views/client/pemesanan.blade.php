@extends('client.component-client.master-client')
@section('title', 'Dashboard')
@section('content-client')

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Unit Tersedia</h1>
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

                <div class="row g-4">
                    @foreach ($ListUnit as $item)
                        <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
                            <div class="app-card app-card-doc shadow-sm h-100"
                                onclick="redirectToView('{{ $item->kode_alat }}')">
                                <div class="app-card-thumb-holder p-3">
                                    <a href="#pesan{{ $item->kode_alat }}" data-bs-toggle="modal">
                                        <img class="app-card-link-mask"
                                            src="{{ asset('image/' . $item->detailUnit->image) }}" alt="">
                                    </a>
                                    @if ($item->status == 'ready')
                                        <span class="badge bg-success">Ready</span>
                                    @else
                                        <span class="badge bg-success">Sold</span>
                                    @endif
                                </div>
                                <div class="app-card-body p-3 has-card-actions">
                                    <h4 class="app-doc-title truncate mb-0"><a href="#pesan{{ $item->kode_alat }}"
                                            data-bs-toggle="modal">{{ $item->name_alat }}</a></h4>
                                    <div class="app-doc-meta">
                                        <ul class="list-unstyled mb-0">
                                            <li><span class="text-muted">Kategori:</span>
                                                {{ $item->relationCategory->name_categories }}</li>
                                            <li><span class="text-muted">Harga:</span>Rp.
                                                {{ $item->detailUnit->harga == '-' ? null : number_format($item->detailUnit->harga) }}
                                                /
                                                {{ $item->detailUnit->type_book }}</li>
                                            <li><span
                                                    class="text-muted">Uploaded:</span>{{ Carbon::parse($item->created_at)->format('l, d F Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <!--//app-doc-meta-->

                                </div>
                                <!--//app-card-body-->

                            </div>
                            <!--//app-card-->
                        </div>
                    @endforeach
                    <!--//col-->
                </div>
                <!--//row-->
                <nav class="app-pagination mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
                <!--//app-pagination-->
            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->



    </div>
    <script>
        function redirectToView(kode_alat) {
            window.location.href = '/client/pemesanan/' + kode_alat; // Ganti '/view/' dengan URL halaman view yang sesuai
        }
    </script>
@endsection
