@extends('layouts.app')


@section('content')
<div class="container bg-light">
    <div class="row">
        <div class="col-10">
            <h1>Data Jadwal Menu</h1>
            <hr>
            @include('layouts/alert')
            <a href="{{route('jadwal.create')}}" class="btn btn-primary">Tambah Jadwal</a>
            <table class="table table-bordered table-striped table-hover mt-3">
                <tr class="align-middle">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Foto</th>
                    <th>Nama menu</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($jadwal as $j)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$j->tanggal}}</td>
                    <td> <img src="{{asset($j->menu->foto)}}" alt="Menu Makanan"
                            style="height: 80px;object-fit:cover;object-position:center;"></td>
                    <td>{{$j->menu->nama}}</td>
                    <td>
                        <form action="{{route('jadwal.delete',$j)}}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger"
                                onclick="return confirm('yakin ingin hapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@push('after-scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(document).ready(function(){
    $('.drp').daterangepicker()
    });
</script>
@endpush