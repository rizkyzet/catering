<div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <h5 class="card-header">Tambah Jadwal Menu</h5>
                    <div class="card-body">
                        <form wire:submit.prevent="saveJadwal">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class=" form-control @error('tanggal') is-invalid @enderror"
                                    name="tanggal" wire:model.lazy="tanggal" value="">
                                @error('tanggal')
                                <small class="invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="form-control @error('id_menu') is-invalid @enderror"
                                    wire:model.lazy="id_menu">
                                    <option value=" ">Select Menu</option>
                                    @foreach ($menu as $m)
                                    <option value="{{$m->id}}">{{$m->nama}} - {{$m->sub_kategori->kategori->nama}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('id_menu')
                                <small class="invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>