<div>

    <div class="kategori d-flex flex-wrap mt-5 border-bottom border-top">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kategori" id="all" value="all"
                wire:model.lazy="idKategori">
            <label class="form-check-label" for="all">All</label>
        </div>
        @foreach ($kategori as $k)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kategori" id="{{$k->id}}" value="{{$k->id}}"
                wire:model.lazy="idKategori">
            <label class="form-check-label" for="{{$k->id}}">{{$k->nama}}</label>
        </div>
        @endforeach
    </div>

    <div class="sub-kategori d-flex flex-wrap mt-4" wire:loading.class="opacity">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="id_sub_kategori" id="id_sub_kategori" value="all"
                wire:model.lazy="idSubKategori">
            <label class="form-check-label" for="id_sub_kategori">All</label>
        </div>
        @foreach ($sub_kategori as $s)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="id_sub_kategori" id="sub_{{$s->id}}" value="{{$s->id}}"
                wire:model.lazy="idSubKategori">
            <label class="form-check-label" for="sub_{{$s->id}}">{{$s->nama}}</label>
        </div>
        @endforeach
    </div>

    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4  mt-5">
        @foreach ($menu as $m)
        <div class="col mb-4">
            <div class="card h-100 shadow">
                <img src="{{$m->foto}}" class="card-img-top" alt="...">

                <div class="card-menu card-body d-flex flex-column">
                    <h6 class="card-title font-weight-bold flex-fill">{{$m->nama}}</h6>
                    <small class="text-muted py-2 ">{{$m->sub_kategori->kategori->nama}} &mdash;
                        {{$m->sub_kategori->nama}} </small>
                    <p class="font-weight-bold py-0 harga"><span>Rp.</span> {{$m->harga}}</p>
                </div>

                <div class="card-footer d-flex">
                    <a href="{{route('home.detail',$m->slug)}}" class="btn btn-primary btn-sm ml-auto mr-1">Detail</a>
                    <a href="" class=" btn btn-sm btn-dark text-dark disabled">Order</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div>
        {{$menu->links()}}

    </div>


    {{-- @dump($idKategori)
    @dump($id_sub_kategori)
    @dump($menu) --}}
</div>