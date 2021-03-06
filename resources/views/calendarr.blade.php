<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.css"
        integrity="sha256-uq9PNlMzB+1h01Ij9cx7zeE2OR2pLAfRw3uUUOOPKdA=" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .fc-direction-ltr {
            direction: ltr;
            text-align: center;
        }
    </style>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> --}}
    {{-- Font-awasome --}}
    <script src="https://kit.fontawesome.com/583cd20739.js" crossorigin="anonymous"></script>

    <title>Hello, world!</title>
</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top shadow">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mx-auto ">
                        <li class="nav-item">
                            <a href="{{route('home.kiddos')}}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link disabled">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link disabled">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('calendar.index')}}" class="nav-link">Jadwal</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link disabled" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{route('kategori.index')}}" class="dropdown-item">Kategori</a>
                                <a href="{{route('sub_kategori.index')}}" class="dropdown-item">Sub Kategori</a>
                                <a href="{{route('menu.index')}}" class="dropdown-item">Menu Makanan</a>
                                <a href="{{route('jadwal.index')}}" class="dropdown-item">Jadwal</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            <div class="container">
                <div class="row animate__animated animate__lightSpeedInLeft">
                    {{-- <div class="col-4 d-flex align-items-end justify-content-end py-0">
                        <img class="img-fluid py-0"
                            src="https://res.cloudinary.com/kiddos-catering/image/upload/v1607531922/char/hijabsis_hxv2ht.png"
                            alt="">
                    </div> --}}
                    <div class="col-12"> {!!$calendar::calendar()!!}</div>
                </div>

            </div>


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

        </main>

    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    {!!$calendar::script()!!}
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.js"
        integrity="sha256-oenhI3DRqaPoTMAVBBzQUjOKPEdbdFFtTCNIosGwro0=" crossorigin="anonymous"></script>

    {{-- <script type="text/javascript">
        function tes(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'http://kiddos-catering.herokuapp.com/ajax',
                data: {
                    id: id
                },
                method: 'post',
                
                success: function (data) {
                    $('.content-menu').html(data);
                    jQuery.noConflict();
                    $("#myModal").modal("show");
                    
                    
                }
            })
        }
        
        
    </script> --}}
    <!-- Modal -->






</body>

</html>