<div>
    <div class="form-group">
        <label for="id_kategori">Kategori</label>
        <select class="form-control" name="id_kategori" id="id_kategori" wire:model="id_kategori">
            <option value=" " selected>Pilih Kategori</option>
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
            <select class="form-control" name="id_sub_kategori" id="id_sub_kategori" wire:model="id_sub_kategori">
                <option value=" " selected>Pilih Sub-Kategori</option>
                @foreach ($sub_kategori as $s)
                <option value="{{$s->id}}">{{$s->nama}}</option>
                @endforeach
            </select>
            <div class="spinner-border ml-2" role="status" wire:loading wire:target="id_kategori">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        @error('id_sub_kategori')
        <small class="text-danger">
            {{$message}}
        </small>
        @enderror
    </div>
</div>