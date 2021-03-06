@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Request::session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{Request::session()->get('success')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h6>Login</h6>
                    <a href="{{route('register')}}" class="btn btn-sm btn-danger btn-menu-card">
                        Daftar
                    </a>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <a href="{{route('social.login','google')}}" class="btn btn-md btn-light btn-google">
                            <img class="mr-1" src="{{asset('icon/google-icon.png')}}" alt="" style="width: 22px;">
                            Akses
                            dengan
                            Google
                        </a>
                    </div>
                    <div class="d-flex my-2">
                        <div class="flex-grow-1">
                            <hr>
                        </div>
                        <div class="text-center text-muted px-3 pt-2 font-weight-bold">
                            atau
                        </div>
                        <div class="flex-grow-1">
                            <hr>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                </div>
            </div>
        </div> --}}

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-sm btn-danger btn-red">
                    {{ __('Login') }}
                </button>


                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
@endsection