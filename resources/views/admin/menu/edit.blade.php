@extends('layouts.app')

@section('content')
<div class="container">
    @livewire('admin.menu-edit',['menu'=>$menu]);
</div>
@endsection