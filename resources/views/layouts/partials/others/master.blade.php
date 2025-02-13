<!DOCTYPE html>
<html lang="en">
    @include('layouts.partials.others.head')
  <body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
     @yield('content')
    </div>
    @include('layouts.partials.others.script')
  </body>
</html>
