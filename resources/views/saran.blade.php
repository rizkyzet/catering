@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-12">
            @include('layouts/alert')
            <div class="card saran">
                <div class="card-header">
                    <h5>Suggestion Box</h5>
                </div>
                <form action="{{route('saran.store')}}" method="POST">
                    <div class="card-body">
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
                    </div>

                    <div class="card-footer text-muted d-flex justify-content-end">
                        <button class="btn btn-saran btn-md" type="submit">Kirim ke admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection