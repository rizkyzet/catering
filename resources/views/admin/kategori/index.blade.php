@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
            <h1>Data Kategori</h1>
            <hr>
            @include('layouts.alert')
            <form action="{{route('kategori.store')}}" method="POST" class="form-inline">
                @csrf
                <input type="text" name="nama" class="form-control " placeholder="Tambah Kategori">
                <button class="btn  btn-primary ml-2">Tambah</button>
            </form>
            @error('nama')
            <small class="text-danger">{{$message}}</small>
            @enderror
            <table class="table table-bordered table-striped table-hover table-sm mt-3">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($kategori as $k)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$k->nama}}</td>
                    <td>
                        <a class="btn btn-sm btn-success" href="{{route('kategori.edit',$k)}}">Ubah</a>
                        <form action="{{route('kategori.delete',$k)}}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection