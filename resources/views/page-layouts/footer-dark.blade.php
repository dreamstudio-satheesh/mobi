@extends('layouts.partials.simple.master')

@section('breadcrumb')
<div class="col-auto header-right-wrapper page-title">
  <div>
    <h2>Footer Dark</h2>
    <nav>
      <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item f-w-500">Page Layout</li>
        <li class="breadcrumb-item f-w-500 active">Footer Dark</li>
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
          <p>The creative minds behind stunning and useful websites are web designers. They possess a special talent for
            transforming concepts into works of art that attract audiences and provide seamless user experiences. Web
            designers bring websites to life by selecting fonts, colour palettes, and other design elements. They create
            layouts that are not only aesthetically pleasing but also optimised for performance and user engagement
            using their technical expertise and creative flare. Web designers can build flexible and dynamic designs
            that fit a variety of devices and screen sizes thanks to their proficiency in coding languages like HTML,
            CSS, and JavaScript. Web designers are essential to helping businesses succeed in an era where having an
            online presence is essential.</p>
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