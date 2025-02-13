<!DOCTYPE html>
<html lang="en" @if (Route::currentRouteName()=='admin.layout-rtl' ) dir="rtl" @endif>
    @include('layouts.partials.simple.head')

    @switch(Route::currentRouteName())

    @case('admin.box-layout')

    <body class="box-layout">
        @break

        @case('admin.layout-rtl')

        <body class="rtl">
            @break

            @case('admin.layout-dark')

            <body class="dark-only">
                @break

                @default

                <body>
                    @endswitch

                    <!-- loader starts-->
                    <div class="loader-wrapper">
                        <div class="loader"></div>
                    </div>
                    <!-- loader ends-->

                    <!-- tap on top starts-->
                    <div class="tap-top">
                        <i data-feather="chevrons-up"></i>
                    </div>
                    <!-- tap on tap ends-->

                    <!-- page-wrapper Start-->
                    <div class="page-wrapper compact-wrapper" id="pageWrapper">
                        <div class="page-header row">
                            <!-- Page Header Start-->
                            @include('layouts.partials.simple.header')
                            <!-- Page Header Ends-->
                        </div>
                        <!-- Page Body Start-->
                        <div class="page-body-wrapper">
                            <!-- Page Sidebar Start-->
                            @include('layouts.partials.simple.sidebar')
                            <!-- Page Sidebar Ends-->
                            <div class="page-body">
                                <!-- Container-fluid starts-->
                                @yield('content')
                                <!-- Container-fluid Ends-->
                            </div>
                            <!-- footer start-->
                            @include('layouts.partials.simple.footer')
                            <!-- footer Ends-->
                        </div>
                    </div>
                    @include('layouts.partials.simple.script')
                    @include('admin.inc.alerts')
                </body>

</html>