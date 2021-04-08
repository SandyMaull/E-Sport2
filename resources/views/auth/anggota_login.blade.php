@extends('auth.layouts.app')

@section('title')
    ESport - Login Anggota
@endsection

@section('content')

    <div class="card">
        <div class="card-header text-white">{{ __('Login Anggota') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('anggota.loginpost') }}">
                @csrf

                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label text-white text-md-right">{{ __('Username') }}</label>

                    <div class="col-md-6">
                        <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-white text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0 text-center">
                    <div class="col">
                        <button type="submit" class="btn btn-success">
                            {{ __('Login') }}
                        </button>
                        <a href="{{ url('/anggota/register') }}" class="btn btn-warning">
                            {{ __('Register') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-white">
            <span>ESport 2021, made with <i class="fa fa-heart heart text-danger"></i> by Kuronekosan</span>
        </div>
    </div>

@endsection
