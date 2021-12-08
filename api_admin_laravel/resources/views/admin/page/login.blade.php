<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    @include('admin.layout.meta')
    <title>Admin - TimeNails</title>
    <link rel="apple-touch-icon" href="{{ asset('admin/images/ico/apple-icon-120.html')}}">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">


    @include('admin.layout.style')

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/pages/authentication.css')}}">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Login basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="index.html" class="brand-logo">
                               
                                   
                                    <h2 class="brand-text text-danger ms-1">  Time Nails  </h2>
                                </a>

                                <h4 class="card-title mb-1">Chào mừng bạn đến với quản lý TimeNail! 👋</h4>
                                <p class="card-text mb-2">Hãy đăng nhập tài khoản !</p>

                                <form class="auth-login-form mt-2" id="loginForm">
                                    @csrf
                                    <div class="mb-1">
                                        <label for="login-email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="login-email" name="email"
                                            placeholder="john@example.com" aria-describedby="login-email" tabindex="1"
                                            autofocus  />
                                    </div>

                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password">Mật khẩu</label>
                                            {{-- <a href="#">
                                                <small>Quên mật khẩu ?</small>
                                            </a> --}}
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge"
                                                id="login-password" name="password" tabindex="2"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="login-password" autocomplete />
                                            <span class="input-group-text cursor-pointer"><i
                                                    data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <button class="btn btn-danger w-100" tabindex="4" style="background-color: rgb(190, 49, 73) !important;">Đăng Nhập</button>
                                    <br>
                                </form>
                                {{-- <a href="{{ route('google.login.api') }}"><button class="btn btn-danger w-100 mt-25"
                                        tabindex="4">Google</button></a> --}}
                            </div>
                        </div>
                        <!-- /Login basic -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    @include('admin.layout.script')

<script>
function validateEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
$(function () {
  'use strict';
  var pageLoginForm = $('.auth-login-form');
  $('#loginForm').on('submit', function(e){
    e.preventDefault();
   var form = this;
   if (validateEmail($('#login-email').val()) ) {
    $.ajax({
        type:"POST",
        url:"{{ route('login.admin') }}",
        data: new FormData(form),
        processData: false,
        dataType:'json',
        contentType: false,
        async: false,
        success: function(data){
            if (data.error) {
                toastr.error(data.error)
            }
            if (data.success) {
                window.location.href = "/";
                toastr.success(data.success);
            }
        },
        error:function (error) {
            toastr.error('Tài khoản mật khẩu không chính xác')
        }
    })
}else{
    toastr.error('email không đúng định dạng !');
}
});

});
 $(window).on('load',  function(){
if (feather) {
    feather.replace({ width: 14, height: 14 });
}
})
    </script>
</body>
<!-- END: Body-->

</html>