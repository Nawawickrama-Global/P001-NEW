@extends('site.layout.auth')
@section('content')
    <div class="row align-self-stretch">
        <div class="col-lg-6 bg-img" style="background-image: url(/assets/img/contact-img.png)"></div>
        <div class="col-lg-6 pt-5 pb-5">
            <div class="container content text-center">
                <h2>Login to your account</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <form action="{{ route('login') }}" method="POST" class="text-start">
                            @csrf
                            <div class="form-group">
                                <label for="username" class="requred">Email</label>
                                <input type="text" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="username"
                                    placeholder="Enter Username or Email" />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="password" class="requred" required>Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    placeholder="Enter password" />
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row mt-3 mb-3">
                                <div class="col-lg-6">
                                    <label><input type="checkbox" /><span>Remember Me</span></label>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <a href="">Reset password?</a>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <button type="submit" class="btn btn-log">
                                        Sign In
                                    </button>
                                    <a href="{{ route('customer-registration') }}">
                                        <button type="button" class="btn btn-register">Register Now</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
