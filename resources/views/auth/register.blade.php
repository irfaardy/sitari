@extends('layouts.master_login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card login-card" style="width: 100%;">

        <div class="card-body">
              <h3 class="text-center text-white font-weight-light mb-4">Pendaftaran  {{auth()->check()}}</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        
                            <label for="name" class="col-form-label text-light">{{ __('Name') }}</label>

                            
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          

                        
                            <label for="email" class="col-form-label text-light">{{ __('Email Address') }}</label>

                            
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="no_telp" class="col-form-label text-light">{{ __('No Telp / WA') }}</label>

                            
                                <input id="no_telp" type="no_telp" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp') }}" required autocomplete="no_telp">

                                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          

                        
                            <label for="password" class="col-form-label text-light">{{ __('Password') }}</label>

                            
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        

                        
                            <label for="password-confirm" class="col-form-label text-light">{{ __('Confirm Password') }}</label>

                            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            

                            <label for="alamat_lengkap" class="col-form-label text-light">{{ __('Alamat Lengkap') }}</label>

                            
                                <textarea placeholder="cth: Jl.Soekarno Hatta no.222, Kota Bandung, 40320" class="form-control" name="alamat_lengkap"></textarea>

                                @error('alamat_lengkap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="tempat_lahir" class="col-form-label text-light">{{ __('Tempat Lahir') }}</label>
                                <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" required >

                                <label for="Tanggal Lahir" class="col-form-label text-light">{{ __('Tanggal Lahir') }}</label>
                                <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" required >

                                <label for="jk" class="text-light mt-3" >Jenis Kelamin</label>
                                <div class="mb-4">
                                    <input  type="radio" value="L" id="jenis_kelamin_l" name="jenis_kelamin" checked="">
                                    <label class="form-check-label text-light" for="jenis_kelamin_l">Laki-Laki</label>
                                </div> 
                                <div class="mb-4">
                                    <input  type="radio" value="P" id="jenis_kelamin_p" name="jenis_kelamin" >
                                    <label class="form-check-label text-light" for="jenis_kelamin_p">Perempuan</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mt-3">
                                    {{ __('Register') }}
                                </button>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
