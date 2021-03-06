@extends('layouts.app')

@section('content')
<div class="se-pre-con"></div>
<div class="kiddos container">
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner ">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1498837167922-ddd27525d352?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                    class="d-block mx-auto" alt="...">
                <div class="carousel-caption d-none d-md-block p-3 bg-white text-dark">
                    <h5>Selamat Datang di Kiddos Catering</h5>
                    <p>Silahkan untuk melihat menu yang tersedia</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1504754524776-8f4f37790ca0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                    class="d-block mx-auto" alt="...">
                <div class="carousel-caption d-none d-md-block p-3 bg-white text-dark">
                    <h5>Selamat Datang di Kiddos Catering</h5>
                    <p>Silahkan untuk melihat menu yang tersedia</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1515003197210-e0cd71810b5f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                    class="d-block mx-auto" alt="...">
                <div class="carousel-caption d-none d-md-block p-3 bg-white text-dark">
                    <h5>Selamat Datang di Kiddos Catering</h5>
                    <p>Silahkan untuk melihat menu yang tersedia</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>




    @livewire('home.home-select-menu')




    <div class="modal fade modal-welcome" data-backdrop="static" id="welcomeModal" tabindex="-1"
        aria-labelledby="welcomeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-self-center" id="exampleModalLabel">Selamat Datang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Website masih dalam tahap pengembangan, jika ingin memberi saran untuk tampilan website,
                    menemukan <span class="font-weight-bold">error/bug</span>, atau apapun harap hubungi admin <a
                        href="{{route('saran.create')}}">disini</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-modal-welcome" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
@include('layouts/footer')

@endsection

@push('before-scripts')
<script src="/js/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $(".se-pre-con").fadeOut("slow");
})
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endpush

@push('after-scripts')
<script>
    window.addEventListener('alert', event => {
       
        const Toast = Swal.mixin({
  toast: true,
  position: 'top-center',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})   
$('.cart-info').html(event.detail.qty);
Toast.fire({
    icon: 'success',
  title: '<span style="color:white;">Keranjang berhasil ditambah!</span>',
  background: '#aa3a3a',
  iconColor:'#fff',
//   footer:'<div style="background-color:white; width:100%;color:#aa3a3a;"><i class="fas fa-shopping-cart"></i></div>'
})
});


window.addEventListener('alertLogin', event => {
        const Toast = Swal.mixin({
  toast: true,
  position:'top-center',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  willClose: () => {
    window.location.href = event.detail.value;
  }

})
Toast.fire({
    icon: 'warning',
  title: '<span style="color:white;">Anda harus login!</span>',
  background: '#aa3a3a',
  iconColor:'#fff'

})
});


    $(window).on('load',function(){
        $('#welcomeModal').modal('show');
        
    });
  
</script>
@endpush



@push('css')

@endpush