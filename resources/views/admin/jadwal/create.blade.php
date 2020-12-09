@extends('layouts.app')


@section('content')
@livewire('admin.jadwal-create')
@endsection

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-daterangepicker@3.1.0/daterangepicker.css"
    integrity="sha256-lP22bsj+dImBpPIJD99KKgo9vlrOLmXEzkbpXWkr2sc=" crossorigin="anonymous">
@endpush

@push('after-scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-daterangepicker@3.1.0/daterangepicker.min.js"></script>
<script>
    $('.drp').daterangepicker(  {  "singleDatePicker": true});
</script>
@endpush