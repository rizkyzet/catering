<div class="modal-header">
    <h5 class="modal-title font-weight-bold" id="myModalLabel">{{date('l d F Y',strtotime($jadwal->tanggal))}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row justify-content-center">
        <div class="col-10 ">
            <div class="card h-100 shadow">
                <img src="{{$jadwal->menu->foto}}" class="card-img-top" alt="...">

                <div class="card-jadwal->menu card-body d-flex flex-column">
                    <h6 class="card-title font-weight-bold flex-fill">{{$jadwal->menu->nama}}</h6>
                    <small class="text-muted py-2 ">{{$jadwal->menu->sub_kategori->kategori->nama}} &mdash;
                        {{$jadwal->menu->sub_kategori->nama}} </small>
                    <p>
                        {{$jadwal->menu->deskripsi}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>