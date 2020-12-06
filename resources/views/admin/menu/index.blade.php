@extends('layouts.app')


@section('content')
<div class="container bg-light">
    <div class="row">
        <div class="col-10">
            <h1>Data Menu Makanan</h1>
            <hr>
            @include('layouts/alert')
            <a href="{{route('menu.create')}}" class="btn btn-primary">Tambah Makanan</a>
            <table class="table table-bordered table-striped table-hover mt-3">
                <tr class="align-middle">
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Kategori</th>
                    <th>Nama Sub-Kategori</th>
                    <th>Nama Menu</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($menu as $m)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td class="text-center">
                        <img src="{{asset($m->foto)}}" alt="Menu Makanan"
                            style="height: 80px;object-fit:cover;object-position:center;">
                    </td>
                    <td class="align-middle">{{$m->sub_kategori->kategori->nama}}</td>
                    <td class="align-middle">{{$m->sub_kategori->nama}}</td>
                    <td class="align-middle">{{$m->nama}}</td>
                    <td class="align-middle">
                        <a class="btn btn-sm btn-success" href="">Ubah</a>
                        <form action="{{route('menu.delete',$m)}}" method="POST" class="d-inline">
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