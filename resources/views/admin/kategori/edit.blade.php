@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
            <h1>Data Kategori</h1>
            <hr>
            <form action="{{route('kategori.update',$kategori)}}" method="POST" class="form-inline">
                @csrf
                @method('patch')
                <input type="text" name="nama" class="form-control" value="{{old('nama',$kategori->nama)}}">
                <button class="btn  btn-success ml-2">Ubah</button>


            </form>
            @error('nama')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

    </div>
</div>
@endsection