@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
            <h1>Data Sub-Kategori</h1>
            <hr>
            @include('layouts/alert')
            <a href="{{route('sub_kategori.create')}}" class="btn btn-primary">Tambah Sub-Kategori</a>
            <table class="table table-bordered table-striped table-hover mt-3">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Nama Sub-Kategori</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($sub_kategori as $s)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$s->kategori->nama}}</td>
                    <td>{{$s->nama}}</td>
                    <td>
                        <a class="btn btn-sm btn-success" href="{{route('sub_kategori.edit',$s)}}">Ubah</a>
                        <form action="{{route('sub_kategori.delete',$s)}}" method="POST" class="d-inline">
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