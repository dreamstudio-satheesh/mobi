<div class="col-auto header-left-wrapper">
    <div class="header-logo-wrapper p-0 left-header">
        <div class="logo-wrapper">
            <a href="{{ route('admin.dashboard') }}">
                <img class="img-fluid" src="{{ asset('assets/images/logo/logo_dark.png') }}" alt="">
            </a>
        </div>
    </div>
    <div class="toggle-sidebar">
        <svg class="status_toggle sidebar-toggle">
            <use href="{{ asset('assets/svg/icon-sprite.svg#collapse-sidebar') }}"></use>
        </svg>
    </div>
</div>
@yield('breadcrumb')
<div class="col header-wrapper m-0 header-right-wrapper">
    <div class="row m-0">
        <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                            placeholder="Search anything .." name="q" title="" autofocus>
                        <div class="spinner-border Typeahead-spinner" role="status">
                            <span class="sr-only">
                                Loading...
                            </span>
                        </div><i class="close-search" data-feather="x"></i>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>
        <div class="header-logo-wrapper col-auto p-0 left-header"></div>
        <div class="nav-right col-auto pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
                
                <li>
                    <div class="mode">
                        <svg class="moon-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#moon') }}"></use>
                        </svg>
                        <svg class="sun-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#sun') }}"></use>
                        </svg>
                    </div>
                </li>
              
                <li class="profile-nav onhover-dropdown">
                    <div class="onhover-click">
                        <div class="sidebar-image">
                            <img src="{{ asset('assets/images/user.png') }}" alt="profile">
                            <span class="status status-success"></span>
                        </div>
                        <div class="sidebar-content">
                            <h4>{{ucfirst(auth()?->user()?->first_name) }}</h4>
                            <span class="f-12 f-w-600 f-light">
                                {{ auth()?->user()->role->name }}
                            </span>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li>
                            <a href="{{ route('admin.user.edit-profile',auth()->user()->role->name) }}">
                                <div class="profile-icon">
                                    <svg>
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#user') }}"></use>
                                    </svg>
                                </div><span>My Profile </span>
                            </a>
                        </li>
                        
                       
                        <li>
                            <a href="{{ url('admin.edit-profile') }}">
                                <div class="profile-icon">
                                    <svg>
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#settings') }}"></use>
                                    </svg>
                                </div><span>Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout').submit();">
                                <div class="profile-icon">
                                    <svg>
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#login') }}"></use>
                                    </svg>
                                </div><span>Log out</span>
                            </a>
                        </li>
                        <form action="{{ route('logout') }}" method="POST" id="logout">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
        <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">
                <div class="ProfileCard-avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0">
                        <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1">
                        </path>
                        <polygon points="12 15 17 21 7 21 12 15"></polygon>
                    </svg>
                </div>
                <div class="ProfileCard-details">
                    <div class="ProfileCard-realName">name</div>
                </div>
            </div>
        </script>
        <script class="empty-template" type="text/x-handlebars-template">
            <div class="EmptyMessage">
                Your search turned up 0 results. This most likely means the backend is down, yikes!
            </div>
        </script>
    </div>
</div>