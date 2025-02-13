@extends('layouts.partials.others.master')

@section('content')
<!-- error-400 start-->
<div class="error-wrapper">
  <div class="container"><img class="img-100" src="{{ asset('assets/images/gif/sad.gif') }}" alt="400 error">
    <div class="error-heading">
      <h2 class="headline font-primary">400</h2>
    </div>
    <div class="col-md-8 offset-md-2">
      <p class="sub-content">The page you are attempting to reach is currently not available. This may be because the
        page does not exist or has been moved.</p>
    </div>
    <div><a class="btn btn-primary-gradien btn-lg" href="{{ route('admin.dashboard') }}">BACK TO HOME PAGE</a></div>
  </div>
</div>
<!-- error-400 end-->
@endsection