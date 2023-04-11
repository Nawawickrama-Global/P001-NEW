@extends('layouts.auth.main')

@section('content')
    <div class="col-md-8 pl-md-0">
        <div class="auth-form-wrapper px-4 py-5">
            <a href="#" class="noble-ui-logo d-block mb-2" style="color: #004c45">AURA OF<span style="color: #04796d"> INT</span></a>
            <h5 class="text-muted font-weight-normal mb-4">Registration almost done.But, We've sent you a verification code
                to your mobile. Please enter it to verify your account.</h5>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Verification code</label>
                    <input id="verification" type="text" class="form-control" name="email" required
                        autocomplete="email" autofocus>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-dark mr-2 mb-2 mb-md-0 text-white">Verify Account</button>
                </div>
                <br><br><br><br><br>
            </form>
        </div>
    </div>
@endsection
