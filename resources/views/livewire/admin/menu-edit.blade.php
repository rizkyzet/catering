<div>

    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header">Ubah Data Menu Makanan</h5>
                <div class="card-body">
                    <form action="{{route('menu.update',$menu)}}" method="POST" enctype="multipart/form-data">


                        <div class="row">
                            <div class="col">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="id_kategori">Kategori</label>
                                    <select class="form-control" name="id_kategori" id="id_kategori"
                                        wire:model="id_kategori">
                                        <option value="" selected>Pilih Kategori</option>
                                        @foreach ($kategori as $k)
                                        <option value="{{$k->id}}">{{$k->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_kategori')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="id_sub_kategori">Sub-Kategori</label>
                                    <div class="d-flex">
                                        <select class="form-control" name="id_sub_kategori" id="id_sub_kategori"
                                            wire:model="id_sub_kategori">
                                            <option value="" selected>Pilih Sub-Kategori</option>
                                            @foreach ($sub_kategori as $sk)
                                            <option value="{{$sk->id}}">{{$sk->nama}}</option>
                                            @endforeach
                                        </select>
                                        <div class="spinner-border ml-2" role="status" wire:loading
                                            wire:target="id_kategori">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    @error('id_sub_kategori')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama Menu</label>
                                    <input type="text" name="nama" id="nama" class="form-control" wire:model='nama'>
                                    @error('nama')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" name="harga" id="harga" class="form-control" wire:model='harga'>
                                    @error('harga')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input class="form-control border-0 p-1" type="file" name="foto" wire:model="foto">
                                    <div class="d-flex">
                                        @error('foto')
                                        <small class=" text-danger">
                                            {{$message}}
                                        </small>
                                        @else
                                        <small class="text-muted">
                                            *isi jika ingin diganti
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30"
                                        rows="8">{{old('deskripsi',$deskripsi)}}</textarea>
                                    @error('deskripsi')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Ubah</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>