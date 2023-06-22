
<!-- Detail Modal -->
<div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ url('manager/detail-kategori/{name_categories}/detail-unit') }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" value="{{ $item->kode_alat }}" name="alat">
                {{-- {!! Form::model($item, ['method' => 'patch', 'route' => ['admin.kategori', $item->id_categories]]) !!} --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Detail Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('image/' . $item->detailUnit->image) }}" class="card-img-top"
                                alt="dataUnit.{{ $item->kode_alat }}">
                        </div>
                        <div class="col-8">
                                <div class="description-ktp-peminjam" style="color: black; font-size:16px">
                                    <span>Harga :</span>
                                    <label for="floatingInputGroup1" class="text-capitalize">Rp.
                                        {{ number_format($item->detailUnit->harga) }} /
                                        {{ $item->detailUnit->type_book }}</label>
                                </div>
                                <div class="description-ktp-peminjam" style="color: black; font-size:16px">
                                     <span>Jenis Booking :</span>
                                     <label for="floatingInputGroup1" class="text-capitalize">
                                    {{ $item->detailUnit->type_book }}</label>
                                </div>
                                <div class="description-ktp-peminjam" style="color: black; font-size:16px">
                                    <span>Deskripsi :</span>
                                     <label for="floatingInputGroup1" class="text-capitalize">
                                    {{ $item->detailUnit->deskripsi }}</label>
                                </div>
                            </div>     
                            <div class="input-group" style="height:80px">
                                
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fa fa-times"></i>
                        Cancel</button>
                    {{ Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                </div> --}}
                {{-- {!! Form::close() !!} --}}
            </form>
        </div>
    </div>
</div>
