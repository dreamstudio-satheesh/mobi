@extends('layouts.partials.others.master')

@section('content')
<div class="container-fluid p-0">
  <div class="row">
    <div class="col-12">
      <div class="login-card login-dark">
        <div>
          <div><a class="logo" href="{{ route('admin.dashboard') }}"><img class="img-fluid for-light"
                src="{{ asset('assets/images/logo/logo.png') }}" alt="looginpage"><img class="img-fluid for-dark"
                src="{{ asset('assets/images/logo/logo_dark.png') }}" alt="looginpage"></a></div>
          <div class="login-main">
            <form class="theme-form">
              <h2>Create Your Password</h2>
              <div class="form-group">
                <label class="col-form-label">New Password</label>
                <div class="form-input position-relative">
                  <input class="form-control" type="password" name="password" required="" placeholder="*********">
                  <div class="show-hide"><span class="show"></span></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label">Retype Password</label>
                <input class="form-control" type="password" name="password" required="" placeholder="*********">
              </div>
              <div class="form-group mb-0">
                <div class="checkbox p-0">
                  <input id="checkbox1" type="checkbox">
                  <label class="text-muted" for="checkbox1">Remember password</label>
                </div>
                <button class="btn btn-primary btn-block w-100" type="submit">Done </button>
              </div>
              <p class="mt-4 mb-0">Don't have account?<a class="ms-2" href="{{ route('admin.sign-up') }}">Create
                  Account</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection