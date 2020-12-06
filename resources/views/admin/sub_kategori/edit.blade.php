@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <h5 class="card-header">Edit Data Sub-Kategori</h5>
                <div class="card-body">
                    <form action="{{route('sub_kategori.update',$sub_kategori)}}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="id_kategori">Nama Kategori</label>
                            <select name="id_kategori" id="id_kategori" class="form-control">
                                <option value=" ">Pilih Kategori</option>
                                @foreach ($kategori as $k)
                                <option {{old('id_kategori',$sub_kategori->id_kategori)==$k->id ? 'selected' : ''}}
                                    value="{{$k->id}}">{{$k->nama}}</option>
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
                            <input type="text" class="form-control" name="nama"
                                value="{{old('nama',$sub_kategori->nama)}}">
                            @error('nama')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <button class="btn btn-success" type="submit">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection