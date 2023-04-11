@extends('site.layout.auth')
@section('content')
    <div class="row align-self-stretch">
        <div class="col-lg-6 bg-img" style="background-image: url(/assets/img/contact-img.png)"></div>
        <div class="col-lg-6 pt-5 pb-5">
            <div class="container content text-center">
                <h2>REGISTER NOW</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <form action="{{ route('register-customer') }}" method="POST" class="text-start">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="Fname" class="requred">First Name</label>
                                        <input type="text" name="first_name"
                                            class="form-control @error('first_name') is-invalid @enderror" id="username"
                                            placeholder="First Name" />
                                        @error('first_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Lname" class="requred">Last Name</label>
                                        <input type="text" name="last_name"
                                            class="form-control @error('last_name') is-invalid @enderror" id="username"
                                            placeholder="Last name" />
                                        @error('last_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="email" class="requred">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder="Enter yuour Email" />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="phone" class="requred">Phone Number</label>
                                <input type="text" class="form-control @error('contact_number') is-invalid @enderror"
                                    name="contact_number" id="phone" placeholder="Enter phone number" />
                                @error('contact_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="profession" class="requred">Profession</label>
                                <input type="text" class="form-control @error('profession') is-invalid @enderror"
                                    name="profession" id="profession" placeholder="Enter Profession" />
                                @error('profession')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="cpassword" class="requred" required>*Confirm Password</label>
                                        <input type="password"
                                            class="form-control @error('confirmed') is-invalid @enderror" name="confirmed"
                                            id="cpassword" placeholder="Enter password" />
                                        @error('confirmed')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 mb-3">
                                <div class="col-lg-12">
                                    <label><input type="checkbox" /><span>Would you love to receive inspiration from
                                            us?</span></label>
                                </div>
                                <div class="col-lg-12">
                                    <p>
                                        Your personal data will be used to support your
                                        experience throughout this website, to manage access
                                        to your account, and for other purposes described in
                                        our privacy policy.
                                    </p>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <button type="submit" class="btn btn-log">
                                        Register Now
                                    </button>
                                    <a href="{{ route('customer-login') }}">
                                      <button type="button" class="btn btn-register">Sign In</button>
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
