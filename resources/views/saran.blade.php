@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            @include('layouts/alert')
            <div class="card saran">
                <div class="card-header">
                    <h5>Suggestion Box</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('saran.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="from">Dari</label>
                            <input type="text" id="from" class="form-control" name="from" value="Anonymous">
                            @error('from')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="saran">Kritik / Saran</label>
                            <textarea name="saran" id="saran" cols="20" rows="10" class="form-control"></textarea>
                            @error('saran')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="card-footer text-muted">
                            <button class="btn btn-saran btn-md float-right" type="submit">Kirim ke admin</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection