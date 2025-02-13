@extends('layouts.partials.simple.master')

@section('breadcrumb')
<div class="col-auto header-right-wrapper page-title">
  <div>
    <h2>Footer Light</h2>
    <nav>
      <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item f-w-500">Page Layout</li>
        <li class="breadcrumb-item f-w-500 active">Footer Light</li>
      </ol>
    </nav>
  </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card title-line">
        <div class="card-header">
          <h2>Sample Card</h2>
          <p class="f-m-light mt-1">A sample card of the yuri theme.</p>
        </div>
        <div class="card-body">
          <p>A practitioner with expertise in building attractive and useful websites is known as a web designer. Their
            primary objective is to create responsive websites, which can adjust to and show properly on various
            platforms including PCs, tablets, and mobile phones. A web designer gives considerable thought to a
            website's style, navigation, and general user experience to make sure the target audience will find it easy
            to use and visually appealing.</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/header-slick.js') }}"></script>
<script src="{{ asset('assets/js/touchspin_2/custom_touchspin.js') }}"></script>
<script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection