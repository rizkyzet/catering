@extends('layouts.app')

@section('content')

<div class="container container-cart">
    <div class="row justify-content-center">
        <div class="col-12">

            @livewire('home.cart')

        </div>
    </div>

</div>









@include('layouts/footer')
@endsection

@push('before-scripts')
<script src="/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endpush

@push('after-scripts')
<script>
    window.addEventListener('cart-icon', event => {
     
$('.cart-info').html(event.detail.qty);
    });
</script>
@endpush



@push('css')

@endpush