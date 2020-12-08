@extends('layouts/app')
@section('content')
<div class="container">

    {!!$calendar::calendar()!!}
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
@endpush

{{-- second --}}
@push('after-scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.js"
    integrity="sha256-oenhI3DRqaPoTMAVBBzQUjOKPEdbdFFtTCNIosGwro0=" crossorigin="anonymous"></script>
{!!$calendar::script()!!}

<script>
    function tes(){
    $('#myModal').modal('show')
}
</script>
@endpush

{{-- first --}}
@push('before-scripts')
<script src="/js/jquery.min.js"></script>
@endpush