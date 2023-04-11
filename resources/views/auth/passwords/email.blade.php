@extends('layouts.auth.main')

@section('content')
    <div class="col-md-8 pl-md-0">
        <div class="auth-form-wrapper px-4 py-5">
            <a href="#" class="noble-ui-logo d-block mb-2">AURA OF<span> INT</span></a>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input id="email" type="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror" name="email" required
                        autocomplete="email" autofocus placeholder="admin@email.com">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Reset Password</button>
                </div>
                <div class="form-group">
                    <hr class="mt-2">
                    <label class="form-check-label text-muted font-weight-normal">
                        <a href="/login">
                            Already Remember Password ?
                        </a>
                    </label>
                </div>
                <br><br><br><br><br><br>
            </form>
        </div>
    </div>
@endsection
