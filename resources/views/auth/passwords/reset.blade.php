@extends('layouts.partials.others.master')

@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <div class="login-card login-dark">
                <div>
                    <div><a class="logo" href="{{ route('admin.dashboard') }}"><img class="img-fluid for-light"
                                src="{{ asset('assets/images/logo/logo.png') }}" alt="looginpage"><img
                                class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}"
                                alt="looginpage"></a></div>
                    <div class="login-main">
                        <form class="theme-form" method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <h2>Create Your Password</h2>

                            <div class="form-group">
                                <label for="email" class="col-form-label">Email Address</label>
                                <div class="form-input position-relative">
                                    <input class="form-control @error('email') is-invalid @enderror" id="email"
                                        type="email" name="email" value="{{ $email ?? old('email') }}"
                                        autocomplete="email" autofocus required="" placeholder="test@gmail.com">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-form-label">New Password</label>
                                <div class="form-input position-relative">
                                    <input class="form-control @error('password') is-invalid @enderror" id="password"
                                        type="password" name="password" required="" placeholder="*********"
                                        autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="show-hide"><span class="show"></span></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-form-label">Retype Password</label>
                                <input class="form-control" id="password-confirm" type="password"
                                    name="password_confirmation" placeholder="*********" required
                                    autocomplete="new-password">
                            </div>

                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block w-100" type="submit">Reset Password </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection