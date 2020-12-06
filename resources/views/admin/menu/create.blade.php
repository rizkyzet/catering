@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header">Tambah Data Menu Makanan</h5>
                <div class="card-body">
                    <form action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                @csrf
                                @livewire('admin.menu-create',['id_kategori'=>old('id_kategori'),'id_sub_kategori'=>old('id_sub_kategori')])
                                <div class="form-group">
                                    <label for="nama">Nama Menu</label>
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        value="{{old('nama')}}">
                                    @error('nama')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" name="harga" id="harga" class="form-control"
                                        value="{{old('harga')}}">
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
                                    <input class="form-control border-0 p-1" type="file" name="foto" id="foto">
                                    @error('foto')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30"
                                        rows="8">{{old('deskripsi')}}</textarea>
                                    @error('deskripsi')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Tambah</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection