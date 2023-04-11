@extends('layouts.auth.main')

@section('content')
    <div class="col-md-8 pl-md-0">
        <div class="auth-form-wrapper px-4 py-5">
            <a href="#" class="noble-ui-logo d-block mb-2" style="color: #004c45">AURA OF<span style="color: #04796d"> INT</span></a>
            <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input id="phone" type="text" class="form-control @error('email') is-invalid @enderror"
                        name="email" required autocomplete="email" value="{{ old('email') }}" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-login mr-2 mb-2 mb-md-0 text-white" style="background-color: #004c45">Login to portal</button>
                </div>
                <div class="form-group">
                    <hr class="mt-2">
                    <label class="">
                        @if (Route::has('password.request'))
                            <a class="" href="{{ route('password.request') }}" style="color: #004c45">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </label>
                </div>
            </form>
        </div>
    </div>
@endsection
