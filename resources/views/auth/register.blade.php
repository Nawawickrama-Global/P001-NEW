@extends('layouts.auth.main')

@section('content')
    <div class="col-md-8 pl-md-0">
        <div class="auth-form-wrapper px-4 py-5">
            <a href="#" class="noble-ui-logo d-block mb-2" style="color: #004c45">AURA OF<span style="color: #04796d"> INT</span></a>
            <h5 class="text-muted font-weight-normal mb-4">Welcome, and please create your account.</h5>
            <form method="POST" action="#">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">First name</label>
                        <input id="fname" type="first_name" value="{{ old('first_name') }}"
                            class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                            autocomplete="first_name" autofocus>
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Last name</label>
                        <input id="lname" type="last_name" class="form-control @error('last_name') is-invalid @enderror"
                            {{ old('last_name') }} name="last_name" autocomplete="last_name" autofocus>
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Email address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            {{ old('email') }} name="email" autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Contact number</label>
                        <input id="contact" type="number" class="form-control @error('contact_number') is-invalid @enderror"
                            {{ old('contact_number') }} name="contact_number" autocomplete="email" autofocus>
                        @error('contact_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Confirm password</label>
                        <input id="confirmpassword" type="password"
                            class="form-control @error('confirmed') is-invalid @enderror" name="confirmed"
                            autocomplete="current-password">
                        @error('confirmed')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Register Now</button>
                </div>
            </form>
        </div>
    </div>
@endsection
