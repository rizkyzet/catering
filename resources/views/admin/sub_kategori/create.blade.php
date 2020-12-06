@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <h5 class="card-header">Tambah Data Sub-Kategori</h5>
                <div class="card-body">
                    <form action="{{route('sub_kategori.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="id_kategori">Nama Kategori</label>
                            <select name="id_kategori" id="id_kategori" class="form-control">
                                <option value=" ">Pilih Kategori</option>
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
                            <label for="nama">Nama Sub-Kategori</label>
                            <input type="text" class="form-control" name="nama">
                            @error('nama')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection