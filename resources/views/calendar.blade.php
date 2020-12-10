@extends('layouts/app')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        {{-- <div class="col-4 d-flex align-items-end justify-content-end py-0">
            <img class="img-fluid py-0"
                src="https://res.cloudinary.com/kiddos-catering/image/upload/v1607531922/char/hijabsis_hxv2ht.png"
                alt="">
        </div> --}}
        <div class="col-12 col-lg-8">
            {!!$calendar::calendar()!!}
            <small class="font-italic mt-2 float-right">*Klik nama makanan di calendar untuk melihat detail
                makanan.</small>
        </div>

    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="content-menu">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection




@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.css"
    integrity="sha256-uq9PNlMzB+1h01Ij9cx7zeE2OR2pLAfRw3uUUOOPKdA=" crossorigin="anonymous">
<style>
    .fc-direction-ltr {
        direction: ltr;
        text-align: center;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endpush

{{-- first --}}
@push('before-scripts')
<script src="/js/jquery.min.js"></script>
{!!$calendar::script()!!}
@endpush

{{-- second --}}
@push('after-scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.js"
    integrity="sha256-oenhI3DRqaPoTMAVBBzQUjOKPEdbdFFtTCNIosGwro0=" crossorigin="anonymous"></script>
@endpush