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

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endpush



@push('before-scripts')
<script src="/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endpush

@push('after-scripts')
<script type="text/javascript">
    window.addEventListener('cart-icon', event => {
     
$('.cart-info').html(event.detail.qty);
    });


    window.addEventListener('cart-empty', event => {
       
       const Toast = Swal.mixin({
 toast: true,
 position: 'center',
 showConfirmButton: false,
 timer: 2000,
 timerProgressBar: true,
 didOpen: (toast) => {
   toast.addEventListener('mouseenter', Swal.stopTimer)
   toast.addEventListener('mouseleave', Swal.resumeTimer)
 }
})   

Toast.fire({
   icon: 'warning',
 title: '<span style="color:white;">Keranjang anda kosong!</span>',
 background: '#aa3a3a',
 iconColor:'#fff',
//   footer:'<div style="background-color:white; width:100%;color:#aa3a3a;"><i class="fas fa-shopping-cart"></i></div>'
})
});
</script>
@endpush



@push('css')

@endpush