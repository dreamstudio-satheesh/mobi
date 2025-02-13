@extends('layouts.partials.simple.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/photoswipe.css') }}">
@endsection

@section('breadcrumb')
<div class="col-auto header-right-wrapper page-title">
  <div>
    <h2>User Profile</h2>
    <nav>
      <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item f-w-500">Users</li>
        <li class="breadcrumb-item f-w-500 active">User Profile</li>
      </ol>
    </nav>
  </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
  <div class="user-profile">
    <div class="row">
      <!-- user profile first-style start-->
      <div class="col-sm-12">
        <div class="card hovercard text-center">
          <div class="cardheader"></div>
          <div class="user-image">
            <div class="avatar"><img alt="" src="{{ asset('assets/images/user/7.jpg') }}"></div>
            <div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div>
          </div>
          <div class="info">
            <div class="row g-3">
              <div class="col-sm-6 col-xl-4 order-sm-1 order-xl-0">
                <div class="row g-3">
                  <div class="col-md-6">
                    <div class="tour-email text-start">
                      <h6><i class="fa fa-envelope"></i>   Email</h6><span>William@jourrapide.com</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="tour-email text-start">
                      <h6><i class="fa fa-calendar"></i>   BOD</h6><span>02 January 2024</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-xl-4 order-sm-0 order-xl-1">
                <div class="user-designation">
                  <div class="title"><a target="_blank" href="">William C. Jennings</a></div>
                  <div class="desc">Web Designer</div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-4 order-sm-2 order-xl-2">
                <div class="row g-3">
                  <div class="col-md-6">
                    <div class="tour-email text-start">
                      <h6><i class="fa fa-phone"></i>   Contact Us</h6><span>US 310-273-0666</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="tour-email text-start">
                      <h6><i class="fa fa-location-arrow"></i>   Location</h6><span>4377 Libby Street Beverly
                        Hills</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="social-media">
              <ul class="list-inline">
                <li class="list-inline-item"><a href="https://www.facebook.com/" target="_blank"><i
                      class="fa fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="https://accounts.google.com/" target="_blank"><i
                      class="fa fa-google-plus"></i></a></li>
                <li class="list-inline-item"><a href="https://twitter.com/" target="_blank"><i
                      class="fa fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="https://www.instagram.com/" target="_blank"><i
                      class="fa fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="https://rss.app/" target="_blank"><i class="fa fa-rss"></i></a>
                </li>
              </ul>
            </div>
            <div class="follow">
              <div class="row">
                <div class="col-6 text-md-end border-right">
                  <div class="follow-num counter">25869</div><span>Follower</span>
                </div>
                <div class="col-6 text-md-start">
                  <div class="follow-num counter">659887</div><span>Following</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- user profile first-style end-->
      <!-- user profile second-style start-->
      <div class="col-sm-12">
        <div class="card">
          <div class="profile-img-style">
            <div class="row">
              <div class="col-sm-8">
                <div class="d-flex"><img class="img-thumbnail rounded-circle me-3"
                    src="{{ asset('assets/images/user/7.jpg') }}" alt="Generic placeholder image">
                  <div class="flex-grow-1 align-self-center">
                    <h5 class="mt-0 user-name">William C. Jennings</h5>
                    <div class="tour-wrapper"><span>26 Jan</span><i class="tour-dot fa fa-circle"></i><span
                        class="txt-danger">6 min read</span></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 align-self-center mt-0 text-end">
                <div class="social-media social-tour" data-intro="This is your social details">
                  <ul class="list-inline">
                    <li class="list-inline-item"><a href="https://www.facebook.com/" target="_blank"><i
                          class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="https://accounts.google.com/" target="_blank"><i
                          class="fa fa-google-plus"></i></a></li>
                    <li class="list-inline-item"><a href="https://twitter.com/" target="_blank"><i
                          class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.instagram.com/" target="_blank"><i
                          class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="https://rss.app/" target="_blank"><i
                          class="fa fa-rss"></i></a></li>
                  </ul>
                </div>
                <div class="float-sm-end"><small>10 Hours ago</small></div>
              </div>
            </div>
            <hr>
            <h5 class="pb-2">Wonderful piece that successfully conveys the magnificence of the mountains and the natural
              world.</h5>
            <p class="block-ellipsis">English Romantic painter, printer, and watercolourist <em
                class="txt-danger">William C. Jennings</em> Is most renowned for his expressive colorization, creative
              landscapes, and stormy, sometimes violent maritime works. However, this moody image of the Devil's Bridge
              in Switzerland, close to the Gotthard Pass, feels incredibly authentic and accurately depicts historical
              occasions when Russian general Suvorov crossed the Alps and fought not only far larger enemy troops!</p>
            <div class="img-container">
              <div class="my-gallery" id="aniimated-thumbnials" itemscope="">
                <figure itemprop="associatedMedia" itemscope=""><a
                    href="{{ asset('assets/images/other-images/profile-style-img3.png') }}" itemprop="contentUrl"
                    data-size="1600x950"><img class="img-fluid rounded"
                      src="{{ asset('assets/images/other-images/profile-style-img3.png') }}" itemprop="thumbnail"
                      alt="gallery"></a>
                  <figcaption itemprop="caption description">Image caption 1</figcaption>
                </figure>
              </div>
            </div>
            <div class="like-comment">
              <ul class="list-inline">
                <li class="border-right pe-3 list-inline-item">
                  <label class="m-0"><a href="#!"><i class="fa fa-heart"></i></a>  Like</label><span
                    class="ms-2 counter">2659</span>
                </li>
                <li class="list-inline-item">
                  <label class="m-0"><a href="#!"><i class="fa fa-comment"></i></a>  Comment</label><span
                    class="ms-2 counter">569</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- user profile second-style end-->
      <!-- user profile third-style start-->
      <div class="col-sm-12">
        <div class="card">
          <div class="profile-img-style">
            <div class="row">
              <div class="col-sm-8">
                <div class="d-flex"><img class="img-thumbnail rounded-circle me-3"
                    src="{{ asset('assets/images/user/7.jpg') }}" alt="Generic placeholder image">
                  <div class="flex-grow-1 align-self-center">
                    <h5 class="mt-0 user-name">William C. Jennings</h5>
                    <div class="tour-wrapper"><span>22 Feb</span><i class="tour-dot fa fa-circle"></i><span
                        class="txt-danger">5 min read</span></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 align-self-center mt-0 text-end">
                <div class="social-media social-tour" data-intro="This is your social details">
                  <ul class="list-inline">
                    <li class="list-inline-item"><a href="https://www.facebook.com/" target="_blank"><i
                          class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="https://accounts.google.com/" target="_blank"><i
                          class="fa fa-google-plus"></i></a></li>
                    <li class="list-inline-item"><a href="https://twitter.com/" target="_blank"><i
                          class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.instagram.com/" target="_blank"><i
                          class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="https://rss.app/" target="_blank"><i
                          class="fa fa-rss"></i></a></li>
                  </ul>
                </div>
                <div class="float-sm-end"><small>4 Hours ago</small></div>
              </div>
            </div>
            <hr>
            <p class="block-ellipsis">A person who interacts with a given system, platform, or gadget in order to carry
              out a particular activity or obtain specific data is referred to as a user. A user is someone who
              interacts with software, websites, or electronic gadgets in the context of technology.</p>
            <div class="row mt-3 pictures my-gallery" id="aniimated-thumbnials-2" itemscope="">
              <figure class="col-sm-6" itemprop="associatedMedia" itemscope=""><a
                  href="{{ asset('assets/images/other-images/profile-style-img3.png') }}" itemprop="contentUrl"
                  data-size="1600x950"><img class="img-fluid rounded"
                    src="{{ asset('assets/images/other-images/profile-style-img.png') }}" itemprop="thumbnail"
                    alt="gallery"></a>
                <figcaption itemprop="caption description">Image caption 1</figcaption>
              </figure>
              <figure class="col-sm-6" itemprop="associatedMedia" itemscope=""><a
                  href="{{ asset('assets/images/other-images/profile-style-img3.png') }}" itemprop="contentUrl"
                  data-size="1600x950"><img class="img-fluid rounded"
                    src="{{ asset('assets/images/other-images/profile-style-img.png') }}" itemprop="thumbnail"
                    alt="gallery"></a>
                <figcaption itemprop="caption description">Image caption 2</figcaption>
              </figure>
            </div>
            <div class="like-comment">
              <ul class="list-inline">
                <li class="border-right pe-3 list-inline-item">
                  <label class="m-0"><a href="#!"><i class="fa fa-heart"></i></a>  Like</label><span
                    class="ms-2 counter">2659</span>
                </li>
                <li class="list-inline-item">
                  <label class="m-0"><a href="#!"><i class="fa fa-comment"></i></a>  Comment</label><span
                    class="ms-2 counter">569</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- user profile third-style end-->
      <!-- user profile fourth-style start-->
      <div class="col-sm-12">
        <div class="card">
          <div class="profile-img-style">
            <div class="row">
              <div class="col-sm-8">
                <div class="d-flex"><img class="img-thumbnail rounded-circle me-3"
                    src="{{ asset('assets/images/user/7.jpg') }}" alt="Generic placeholder image">
                  <div class="flex-grow-1 align-self-center">
                    <h5 class="mt-0 user-name">William C. Jennings</h5>
                    <div class="tour-wrapper"><span>15 Dec</span><i class="tour-dot fa fa-circle"></i><span
                        class="txt-danger">10 min read</span></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 align-self-center mt-0 text-end">
                <div class="social-media social-tour" data-intro="This is your social details">
                  <ul class="list-inline">
                    <li class="list-inline-item"><a href="https://www.facebook.com/" target="_blank"><i
                          class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="https://accounts.google.com/" target="_blank"><i
                          class="fa fa-google-plus"></i></a></li>
                    <li class="list-inline-item"><a href="https://twitter.com/" target="_blank"><i
                          class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.instagram.com/" target="_blank"><i
                          class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="https://rss.app/" target="_blank"><i
                          class="fa fa-rss"></i></a></li>
                  </ul>
                </div>
                <div class="float-sm-end"><small>2 Month ago</small></div>
              </div>
            </div>
            <hr>
            <p class="block-ellipsis">Nature has a role in our lives. We are a part of everything since we sprang from a
              seed and the ground, but we are quickly losing the perception that we are animals much like the rest. Is
              it possible to feel something when you gaze at, appreciate, and hear a tree? Can you pay attention to the
              tiny weed, the creeper climbing the wall, the light on the leaves, and the numerous shadows? All of this
              must be understood, and one must have a feeling of connectedness with the natural world around them.
              Despite living in a town, there are still a few trees here and there. The next garden's bloom could not be
              well-kept.</p>
            <div class="like-comment mt-3">
              <ul class="list-inline">
                <li class="border-right pe-3 list-inline-item">
                  <label class="m-0"><a href="#!"><i class="fa fa-heart"></i></a>  Like</label><span
                    class="ms-2 counter">2659</span>
                </li>
                <li class="list-inline-item">
                  <label class="m-0"><a href="#!"><i class="fa fa-comment"></i></a>  Comment</label><span
                    class="ms-2 counter">569</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- user profile fourth-style end-->
      <!-- user profile fifth-style start-->
      <div class="col-sm-12">
        <div class="card">
          <div class="profile-img-style">
            <div class="row">
              <div class="col-sm-8">
                <div class="d-flex"><img class="img-thumbnail rounded-circle me-3"
                    src="{{ asset('assets/images/user/7.jpg') }}" alt="Generic placeholder image">
                  <div class="flex-grow-1 align-self-center">
                    <h5 class="mt-0 user-name">William C. Jennings</h5>
                    <div class="tour-wrapper"><span>05 Feb</span><i class="tour-dot fa fa-circle"></i><span
                        class="txt-danger">5 min read</span></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 align-self-center mt-0 text-end">
                <div class="social-media social-tour" data-intro="This is your social details">
                  <ul class="list-inline">
                    <li class="list-inline-item"><a href="https://www.facebook.com/" target="_blank"><i
                          class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="https://accounts.google.com/" target="_blank"><i
                          class="fa fa-google-plus"></i></a></li>
                    <li class="list-inline-item"><a href="https://twitter.com/" target="_blank"><i
                          class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.instagram.com/" target="_blank"><i
                          class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="https://rss.app/" target="_blank"><i
                          class="fa fa-rss"></i></a></li>
                  </ul>
                </div>
                <div class="float-sm-end"><small>10 Hours ago</small></div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-lg-12 col-xl-4">
                <div class="my-gallery" id="aniimated-thumbnials-3" itemscope="">
                  <figure itemprop="associatedMedia" itemscope=""><a href="{{ asset('assets/images/blog/img.png') }}"
                      itemprop="contentUrl" data-size="1600x950"><img class="img-fluid rounded"
                        src="{{ asset('assets/images/blog/img.png') }}" itemprop="thumbnail" alt="gallery"></a>
                    <figcaption itemprop="caption description">Image caption 1</figcaption>
                  </figure>
                </div>
                <div class="like-comment mt-3 like-comment-sm-mb">
                  <ul class="list-inline">
                    <li class="border-right pe-3 list-inline-item">
                      <label class="m-0"><a href="#!"><i class="fa fa-heart"></i></a>  Like</label><span
                        class="ms-2 counter">2659</span>
                    </li>
                    <li class="list-inline-item">
                      <label class="m-0"><a href="#!"><i class="fa fa-comment"></i></a>  Comment</label><span
                        class="ms-2 counter">569</span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-xl-8">
                <p class="block-ellipsis pt-xl-0 pt-3">The wind gives life to the planet. This unobservable, enigmatic
                  energy has the power to revitalize a setting. Its absence can cause the world to become serenely
                  motionless. Its strength is scarcely visible on bare mountain summits, but it becomes obvious in woods
                  and on the water. Winds may be violent and even harmful. When we investigate it carefully Nature is
                  not a destination. Home is here. Garry Snyder In a very real sense, our home, or natural environment,
                  is made up of mountains and valleys, the seas and the sky, the sun and the soil, the trees and the
                  flowers. Growing up in the contemporary, civilized environment, it's simple to start believing</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- user profile fifth-style end-->
      <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
          <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
          </div>
          <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
              <div class="pswp__counter"></div>
              <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
              <button class="pswp__button pswp__button--share" title="Share"></button>
              <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
              <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
              <div class="pswp__preloader">
                <div class="pswp__preloader__icn">
                  <div class="pswp__preloader__cut">
                    <div class="pswp__preloader__donut"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
              <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
              <div class="pswp__caption__center"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/header-slick.js') }}"></script>
<script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
<script src="{{ asset('assets/js/photoswipe/photoswipe.min.js') }}"></script>
<script src="{{ asset('assets/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('assets/js/photoswipe/photoswipe.js') }}"></script>
@endsection