@extends('layouts.auth.main')

@section('content')
    <div class="col-md-8 pl-md-0">
        <div class="auth-form-wrapper px-4 py-5">
            <a href="#" class="noble-ui-logo d-block mb-2">AURA OF<span> INT</span></a>
            <h5 class="text-muted font-weight-normal mb-4">Please enter the following details to set a new password.</h5>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input id="verification" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">New password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" autocomplete="new-password" autofocus>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Confirm new password</label>
                    <input id="confirmpassword" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="password_confirmation" autofocus>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Setup Password</button>
                </div>
                <div class="mt-3">
                    <hr>
                    <label class="form-check-label text-muted font-weight-normal">
                        <a href="/login">
                            Already Remember Password ?
                        </a>
                    </label>
                </div>
            </form>
        </div>
    </div>
@endsection
