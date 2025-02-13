@extends('layouts.partials.simple.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/photoswipe.css') }}">
@endsection

@section('breadcrumb')
<div class="col-auto header-right-wrapper page-title">
  <div>
    <h2>User Cards</h2>
    <nav>
      <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item f-w-500">Users</li>
        <li class="breadcrumb-item f-w-500 active">User Cards</li>
      </ol>
    </nav>
  </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 col-xxl-3 col-xl-4 col-ed-4 box-col-4">
      <div class="card social-profile">
        <div class="card-body">
          <div class="social-img-wrap">
            <div class="social-img"><img src="{{ asset('assets/images/avtar/2.jpg') }}" alt="profile"></div>
            <div class="edit-icon">
              <svg>
                <use href="{{ asset('assets/svg/icon-sprite.svg#profile-check') }}"></use>
              </svg>
            </div>
          </div>
          <div class="social-details">
            <h5 class="mb-1 f-w-600"><a href="{{ route('admin.social-app') }}">Brooklyn Simmons</a></h5><span
              class="f-light">@brookly.simmons</span>
            <ul class="card-social">
              <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://accounts.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://rss.app/" target="_blank"><i class="fa fa-rss"></i></a></li>
            </ul>
            <ul class="social-follow">
              <li>
                <h3 class="f-w-600 mb-0">1,908</h3><span class="f-light">Posts</span>
              </li>
              <li>
                <h3 class="f-w-600 mb-0">34.0k</h3><span class="f-light">Followers</span>
              </li>
              <li>
                <h3 class="f-w-600 mb-0">897</h3><span class="f-light">Following</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xxl-3 col-xl-4 col-ed-4 box-col-4">
      <div class="card social-profile">
        <div class="card-body">
          <div class="social-img-wrap">
            <div class="social-img"><img class="img-fluid" src="{{ asset('assets/images/avtar/3.jpg') }}" alt="profile">
            </div>
            <div class="edit-icon">
              <svg>
                <use href="{{ asset('assets/svg/icon-sprite.svg#profile-check') }}"></use>
              </svg>
            </div>
          </div>
          <div class="social-details">
            <h5 class="mb-1 f-w-600"><a href="{{ route('admin.social-app') }}">Mark Jecno</a></h5><span
              class="f-light">@mark.jeco</span>
            <ul class="card-social">
              <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://accounts.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://rss.app/" target="_blank"><i class="fa fa-rss"></i></a></li>
            </ul>
            <ul class="social-follow">
              <li>
                <h3 class="f-w-600 mb-0">875</h3><span class="f-light">Posts</span>
              </li>
              <li>
                <h3 class="f-w-600 mb-0">12.0k</h3><span class="f-light">Followers</span>
              </li>
              <li>
                <h3 class="f-w-600 mb-0">1400</h3><span class="f-light">Following</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xxl-3 col-xl-4 col-ed-4 box-col-4">
      <div class="card social-profile">
        <div class="card-body">
          <div class="social-img-wrap">
            <div class="social-img"><img class="img-fluid" src="{{ asset('assets/images/avtar/11.jpg') }}"
                alt="profile"></div>
            <div class="edit-icon">
              <svg>
                <use href="{{ asset('assets/svg/icon-sprite.svg#profile-check') }}"></use>
              </svg>
            </div>
          </div>
          <div class="social-details">
            <h5 class="mb-1 f-w-600"><a href="{{ route('admin.social-app') }}">Dev John</a></h5><span
              class="f-light">@john.dev</span>
            <ul class="card-social">
              <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://accounts.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://rss.app/" target="_blank"><i class="fa fa-rss"></i></a></li>
            </ul>
            <ul class="social-follow">
              <li>
                <h3 class="f-w-600 mb-0">1,274</h3><span class="f-light">Posts</span>
              </li>
              <li>
                <h3 class="f-w-600 mb-0">15.0k</h3><span class="f-light">Followers</span>
              </li>
              <li>
                <h3 class="f-w-600 mb-0">1874</h3><span class="f-light">Following</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xxl-3 col-xl-4 col-ed-4 box-col-4">
      <div class="card social-profile">
        <div class="card-body">
          <div class="social-img-wrap">
            <div class="social-img"><img class="img-fluid" src="{{ asset('assets/images/avtar/16.jpg') }}"
                alt="profile"></div>
            <div class="edit-icon">
              <svg>
                <use href="{{ asset('assets/svg/icon-sprite.svg#profile-check') }}"></use>
              </svg>
            </div>
          </div>
          <div class="social-details">
            <h5 class="mb-1 f-w-600"><a href="{{ route('admin.social-app') }}">Johan Deo</a></h5><span
              class="f-light">@deo.johan</span>
            <ul class="card-social">
              <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://accounts.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://rss.app/" target="_blank"><i class="fa fa-rss"></i></a></li>
            </ul>
            <ul class="social-follow">
              <li>
                <h3 class="f-w-600 mb-0">500</h3><span class="f-light">Posts</span>
              </li>
              <li>
                <h3 class="f-w-600 mb-0">8.0k</h3><span class="f-light">Followers</span>
              </li>
              <li>
                <h3 class="f-w-600 mb-0">570</h3><span class="f-light">Following</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xxl-3 col-xl-4 col-ed-4 box-col-4">
      <div class="card social-profile">
        <div class="card-body">
          <div class="social-img-wrap">
            <div class="social-img"><img class="img-fluid" src="{{ asset('assets/images/user/7.jpg') }}" alt="profile">
            </div>
            <div class="edit-icon">
              <svg>
                <use href="{{ asset('assets/svg/icon-sprite.svg#profile-check') }}"></use>
              </svg>
            </div>
          </div>
          <div class="social-details">
            <h5 class="mb-1 f-w-600"><a href="{{ route('admin.social-app') }}">Douglas Reichel</a></h5><span
              class="f-light">@reichel.douglas</span>
            <ul class="card-social">
              <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://accounts.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://rss.app/" target="_blank"><i class="fa fa-rss"></i></a></li>
            </ul>
            <ul class="social-follow">
              <li>
                <h3 class="f-w-600 mb-0">460</h3><span class="f-light">Posts</span>
              </li>
              <li>
                <h3 class="f-w-600 mb-0">2k</h3><span class="f-light">Followers</span>
              </li>
              <li>
                <h3 class="f-w-600 mb-0">350</h3><span class="f-light">Following</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xxl-3 col-xl-4 col-ed-4 box-col-4">
      <div class="card social-profile">
        <div class="card-body">
          <div class="social-img-wrap">
            <div class="social-img"><img class="img-fluid" src="{{ asset('assets/images/avtar/4.jpg') }}" alt="profile">
            </div>
            <div class="edit-icon">
              <svg>
                <use href="{{ asset('assets/svg/icon-sprite.svg#profile-check') }}"></use>
              </svg>
            </div>
          </div>
          <div class="social-details">
            <h5 class="mb-1 f-w-600"><a href="{{ route('admin.social-app') }}">Lisa lillian</a></h5><span
              class="f-light">@lisa.lillian</span>
            <ul class="card-social">
              <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://accounts.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://rss.app/" target="_blank"><i class="fa fa-rss"></i></a></li>
            </ul>
            <ul class="social-follow">
              <li>
                <h3 class="f-w-600 mb-0">547</h3><span class="f-light">Posts</span>
              </li>
              <li>
                <h3 class="f-w-600 mb-0">3.5k</h3><span class="f-light">Followers</span>
              </li>
              <li>
                <h3 class="f-w-600 mb-0">822</h3><span class="f-light">Following</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xxl-3 col-xl-4 col-ed-4 box-col-4">
      <div class="card social-profile">
        <div class="card-body">
          <div class="social-img-wrap">
            <div class="social-img"><img class="img-fluid" src="{{ asset('assets/images/user/1.jpg') }}" alt="profile">
            </div>
            <div class="edit-icon">
              <svg>
                <use href="{{ asset('assets/svg/icon-sprite.svg#profile-check') }}"></use>
              </svg>
            </div>
          </div>
          <div class="social-details">
            <h5 class="mb-1 f-w-600"><a href="{{ route('admin.social-app') }}">Olivia Rose</a></h5><span
              class="f-light">@rose.olivia</span>
            <ul class="card-social">
              <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://accounts.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://rss.app/" target="_blank"><i class="fa fa-rss"></i></a></li>
            </ul>
            <ul class="social-follow">
              <li>
                <h3 class="f-w-600 mb-0">868</h3><span class="f-light">Posts</span>
              </li>
              <li>
                <h3 class="f-w-600 mb-0">1k</h3><span class="f-light">Followers</span>
              </li>
              <li>
                <h3 class="f-w-600 mb-0">742</h3><span class="f-light">Following</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xxl-3 col-xl-4 col-ed-4 box-col-4">
      <div class="card social-profile">
        <div class="card-body">
          <div class="social-img-wrap">
            <div class="social-img"><img class="img-fluid" src="{{ asset('assets/images/user/2.png') }}" alt="profile">
            </div>
            <div class="edit-icon">
              <svg>
                <use href="{{ asset('assets/svg/icon-sprite.svg#profile-check') }}"></use>
              </svg>
            </div>
          </div>
          <div class="social-details">
            <h5 class="mb-1 f-w-600"><a href="{{ route('admin.social-app') }}">Sarah Karen</a></h5><span
              class="f-light">@karen.sarah</span>
            <ul class="card-social">
              <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://accounts.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://rss.app/" target="_blank"><i class="fa fa-rss"></i></a></li>
            </ul>
            <ul class="social-follow">
              <li>
                <h3 class="f-w-600 mb-0">972</h3><span class="f-light">Posts</span>
              </li>
              <li>
                <h3 class="f-w-600 mb-0">2.5k</h3><span class="f-light">Followers</span>
              </li>
              <li>
                <h3 class="f-w-600 mb-0">864</h3><span class="f-light">Following</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/header-slick.js') }}"></script>
@endsection