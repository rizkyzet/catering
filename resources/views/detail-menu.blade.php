@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card mb-3 detail-menu">

        <div class="row no-gutters ">
            <div class="col-md-4">
                <img src="{{asset('storage/'.$menu->foto)}}" class="card-img" alt="...">
            </div>
            <div class="col-md-8 position-relative bg-white px-3">
                <img src="{{asset('storage/images/bg/Ellipse-1.png')}}" alt="" class="ellipse-1">
                <img src="{{asset('storage/images/bg/Ellipse-1.png')}}" alt="" class="ellipse-2">
                <div class="card-body">
                    <h1 class="font-weight-bold">{{$menu->nama}}</h1>
                    <h5>Rp. {{$menu->harga}}</h5>
                    <p class="card-text text-secondary">{{$menu->sub_kategori->kategori->nama}} &middot;
                        {{$menu->sub_kategori->nama}}</p>
                    <hr>
                    <p class="card-text">
                        {{$menu->deskripsi}}
                    </p>

                    <button class="btn">Add to cart</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection