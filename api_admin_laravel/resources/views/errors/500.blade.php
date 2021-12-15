<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin timenail, nail store">
    <meta name="author" content="TimeNail">
    <title>Error</title>
    <link rel="apple-touch-icon" href="{{ asset('admin/images/ico/apple-icon-120.html')}}">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/themes/dark-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/themes/bordered-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/themes/semi-dark-layout.min.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/pages/page-misc.min.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css')}}">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <!-- Error page-->
          <div class="misc-wrapper"><a class="brand-logo" href="index.html">
            <img style="height: 28px; width:50.96px" src="{{ asset('admin/images/logo/logo.png')}}" alt="">
              <h2 style="color:#e77d7d;" class="brand-text ms-1">TimeNails</h2></a>
            <div class="misc-inner p-2 p-sm-3">
              <div class="w-100 text-center">
                <h2 class="mb-1">Không Tìm Thấy Trang 🕵🏻‍♀️</h2>
                <p class="mb-2">Xin lỗi! 😖 Hiện tại chúng tôi không thể tìm thấy đường dẫn của bạn.</p><a class="btn btn-primary mb-2 btn-sm-block" href="{{route('dashboard')}}">Back to home</a><img class="img-fluid" src="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/pages/error.svg" alt="Error page"/>
              </div>
            </div>
          </div>
          <!-- / Error page-->
        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin/js/core/app-menu.min.js')}}"></script>
    <script src="{{ asset('admin/js/core/app.min.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      });
    </script>
  </body>
  <!-- END: Body-->

</html>