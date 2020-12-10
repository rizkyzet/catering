@extends('layouts.app')


@section('content')
<div class="container bg-light">
    <div class="row">
        <div class="col-10">
            <h1>Data Saran</h1>
            <hr>
            @include('layouts/alert')
            <table class="table table-bordered table-striped table-hover mt-3">
                <tr class="align-middle">
                    <th>No</th>
                    <th>From</th>
                    <th>Isi</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($saran as $saran)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$saran->from}}</td>
                    <td>{{$saran->saran}}</td>
                    <td>
                        <form action="{{route('saran.delete',$saran)}}" method="POST" class="d-inline">
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