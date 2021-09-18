<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
 
  @include('admin.layout.meta')
  <title>@yield('title') - TimeNail</title>


  @include('admin.layout.style')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
  data-menu="vertical-menu-modern" data-col="">

  <!-- BEGIN: Header-->
    
  @include('admin.layout.nav.index')
  @include('admin.layout.sreach-suggestion.index')
  <!-- END: Header-->


  <!-- BEGIN: Main Menu-->
  @include('admin.layout.main-menu.index')
  <!-- END: Main Menu-->

  <!-- BEGIN: Content-->
  @yield('content')
  <!-- END: Content-->


  <!-- BEGIN: Customizer-->
  @include('admin.layout.customizer.index')
  <!-- End: Customizer-->

  <!-- Buynow Button-->
  {{-- <div class="buy-now"><a href="#" target="_blank" class="btn btn-danger">Buy Now</a> --}}

  </div>
  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>

  <!-- BEGIN: Footer-->
  @include('admin.layout.footer')

  <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
  <!-- END: Footer-->


  @include('admin.layout.script')

</body>
<!-- END: Body-->


</html>