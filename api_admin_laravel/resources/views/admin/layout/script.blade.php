<!-- BEGIN: Vendor JS-->
<script src="{{ asset('admin/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('admin/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/tables/datatable/responsive.bootstrap5.js')}}"></script>
<script src="{{ asset('admin/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/tables/datatable/jszip.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
<script src="{{ asset('admin/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/forms/cleave/cleave.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/forms/cleave/addons/cleave-phone.us.js')}}"></script>
<script src="{{ asset('admin/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{ asset('admin/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{ asset('admin/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{ asset('admin/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{ asset('admin/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>


{{-- roles page --}}
<script src="{{ asset('admin/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
{{-- roles page-end --}}

<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('admin/js/core/app-menu.min.js')}}"></script>
<script src="{{ asset('admin/js/core/app.min.js')}}"></script>
<script src="{{ asset('admin/js/scripts/customizer.min.js')}}"></script>

<!-- END: Theme JS-->
<script src="{{ asset('admin/js/scripts/forms/form-validation.js')}}"></script>
<!-- BEGIN: Page JS-->
<script src="{{ asset('admin/js/scripts/forms/pickers/form-pickers.min.js')}}"></script>
<!-- END: Page JS-->


<!-- BEGIN Vendor JS-->

@yield('script')
<script>
  $('#logout-admin').on('click', function() {
    $.ajax({
      type: "GET",
      url: "{{ route('logout.admin') }}",
      processData: false,
      dataType: 'json',
      contentType: false,
      success: function(data) {
        window.location.href = "/admin-login";
      },
      error: function(error) {
        toastr.warning("Có gì đó đang sảy ra !");
        console.log("Đăng xuất không thành công !", error);
      }
    })
  });
  $('#read-all').click(function() {
    $.get('<?= route("read-all") ?>', function() {
      $('a.remove-all').remove();
      $('#count-notifi').remove();
      $('#count-notifi-small').remove();
      $('#del-read-all').remove();
      $('#empty-notifi').attr('hidden',false);
    })
  })
  $(window).on('load', function() {
    if (feather) {
      feather.replace({
        width: 14,
        height: 14
      });
    }
  });
</script>