@extends('layouts.app_off')

@section('content')
<style>
    #fullpage {margin-left: 1px; }
    html,body{ background-color: #FFF; background-image: url("{{asset('app-assets/images/bglogin.jpg')}} " ); background-repeat: no-repeat; background-attachment: fixed;background-position: center;  }
    .header-navbar-shadow{ display: none !important;}
    .nomelog{color: #66619c; padding-left: 1rem;margin-bottom: 0;font-weight: 600;letter-spacing: 0.01rem;font-size: 1.45rem;}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="justify-content:normal ">
                    <img src="{{ asset('assets') }}/img/ge_logo.png" alt="" width="80" class="img-fluid">
                    <span class="nomelog" style=" ">Gestão Escolar</span>
                    
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                    <!-- <img src="{{ asset('paper') }}/img/lgo-g.png" alt="" width="100" class="img-fluid" style="float:left"> -->
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembrar') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu sua senha?') }}
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
