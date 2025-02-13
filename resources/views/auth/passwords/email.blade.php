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

                        @if (session('status'))
                        <div class="alert alert-primary p-2" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form class="theme-form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <h2>Reset Your Password</h2>
                            <div class="form-group">
                                <label for="email" class="col-form-label">Email Address</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email"
                                    name="email" required="" value="{{ old('email') }}" placeholder="test@gmail.com"
                                    autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block w-100 mt-2" type="submit">Send Password Reset
                                    Link
                                </button>
                            </div>
                            <a href="{{ route('login') }}" class="text-center">
                                <p><i class="fa fa-long-arrow-left"></i>
                                    Back to Login Page</p>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection