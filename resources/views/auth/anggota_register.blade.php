@extends('auth.layouts.app')

@section('title')
    ESport - Register Anggota
@endsection

@section('content')

    <div class="card">
        <div class="card-header text-white">{{ __('Register Anggota') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('anggota.registerpost') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-white text-md-right">{{ __('Nama Lengkap') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <small for="identitas">Nama lengkap sesuai identitas</small>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

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

                <div class="form-group row">
                    <label for="no_wa" class="col-md-4 col-form-label text-white text-md-right">{{ __('Nomor Whatsapp') }}</label>
                    <div class="col-md-6">
                        <input id="no_wa" type="text" class="form-control @error('no_wa') is-invalid @enderror" name="no_wa" value="{{ old('no_wa') }}" required autocomplete="no_wa" autofocus>
                        <small for="identitas">Diharuskan format 62xxxxxxxxxxx</small>
                        @error('no_wa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="identitas" class="col-md-4 col-form-label text-white text-md-right">{{ __('Foto Identitas') }}</label>
                    <div class="col-md-6">
                        <input id="identitas" type="file" class="form-control @error('identitas') is-invalid @enderror" name="identitas" value="{{ old('identitas') }}" required autocomplete="identitas" autofocus accept="image/*">
                        <small for="identitas">Bisa berupa foto KTP/KK/SIM/Kartu Pelajar, MAX: 4MB</small>
                        @error('identitas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0 text-center">
                    <div class="col">
                        <a href={{ route('anggota.login') }} class="btn btn-warning">
                            {{ __('Login') }}
                        </a>
                        <button type="submit" class="btn btn-success">
                            {{ __('Lanjutkan Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-white">
            <span>ESport 2021, made with <i class="fa fa-heart heart text-danger"></i> by Kuronekosan</span>
        </div>
    </div>

@endsection
