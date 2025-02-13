@extends('layouts.partials.others.master')

@section('content')
<!-- Page Body Start-->
<div class="container-fluid p-0">
    <div class="comingsoon">
      <div class="comingsoon-inner text-center"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="logo">
        <h5>WE ARE COMING SOON</h5>
        <div class="countdown" id="clock-arrival" data-hours="1" data-minutes="2" data-seconds="3">
          <ul>
            <li><span class="days time"></span><span class="title">days</span></li>
            <li><span class="hours time"></span><span class="title">Hours</span></li>
            <li><span class="minutes time"></span><span class="title">Minutes</span></li>
            <li><span class="seconds time"></span><span class="title">Seconds</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/countdown.js') }}"></script>
@endsection
