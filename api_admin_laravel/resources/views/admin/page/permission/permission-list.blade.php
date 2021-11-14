@extends('admin.layout.main')
@section('title', 'Permission')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <h3>Danh sách quyền</h3>
      <p>Mỗi danh mục (Cơ bản, Chuyên nghiệp và Kinh doanh) bao gồm bốn vai trò được xác định trước được hiển thị bên dưới.</p>

      <!-- Permission Table -->
      <div class="card">
        <div class="card-datatable table-responsive">
          <table class="datatables-permissions table">
            <thead class="table-light">
              <tr>
                <th></th>
                <th></th>
                <th>Tên Quyền</th>
                <th>Phân công</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <!--/ Permission Table -->
      <!-- Add Permission Modal -->
      <div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 pb-5">
              <div class="text-center mb-2">
                <h1 class="mb-1">Thêm mới quyền</h1>
                <p>Các quyền bạn có thể sử dụng và gán cho người dùng của mình.</p>
              </div>
              <form id="addPermissionForm" method="POST" action="{{ route('permission.add.api') }}" class="row">
                <div class="col-12">
                  <label class="form-label" for="modalPermissionName">Permission Name</label>
                  <input type="text" id="modalPermissionName" name="name" class="form-control"
                    placeholder="Permission Name" autofocus data-msg="Please enter permission name" />
                </div>
                <div class="col-12 mt-75">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="corePermission" />
                    <label class="form-check-label" for="corePermission"> Set as core permission </label>
                  </div>
                </div>
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary mt-2 me-1">Create Permission</button>
                  <button type="reset" class="btn btn-outline-secondary mt-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    Discard
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--/ Add Permission Modal -->
      <!-- Edit Permission Modal -->
      <div class="modal fade" id="editPermissionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 pt-0">
              <div class="text-center mb-2">
                <h1 class="mb-1">Edit Permission</h1>
                <p>Edit permission as per your requirements.</p>
              </div>

              <div class="alert alert-warning" role="alert">
                <h6 class="alert-heading">Warning!</h6>
                <div class="alert-body">
                  By editing the permission name, you might break the system permissions functionality. Please ensure
                  you're
                  absolutely certain before proceeding.
                </div>
              </div>

              <form id="editPermissionForm" class="row" method="POST" action="{{ route('permission.update.api') }}">
                <div class="col-sm-9">
                  <input type="hidden" name="id">
                  <label class="form-label" for="editPermissionName">Permission Name</label>
                  <input type="text"  name="name" class="form-control"
                    placeholder="Enter a permission name" tabindex="-1" data-msg="Please enter permission name" />
                </div>
             
                <div class="col-sm-3 ps-sm-0">
                  <button type="submit" class="btn btn-primary mt-2">Update</button>
                </div>
                <div class="col-12 mt-75">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="editCorePermission" />
                    <label class="form-check-label" for="editCorePermission"> Set as core permission </label>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--/ Edit Permission Modal -->

    </div>
  </div>
</div>
<!-- END: Content-->

@endsection
@section('script')
<script>
  $(function () {
  'use strict';

 
    // assetPath = '../../../app-assets/',
    // dt_permission,
    // userList = 'app-user-list.html';

  // if ($('body').attr('data-framework') === 'laravel') {
  //   assetPath = $('body').attr('data-asset-path');
  //   userList = assetPath + 'app/user/list';
  // }

  // Users List datatable
  var table =  $('.datatables-permissions').DataTable({
      ajax:  {
              "url" : "{{ route('permission.list.api') }}",
              "type" : "GET",
              "dataSrc": ""
              },  
      columns: [
        // columns according to JSON
        { data: '' },
        { data: 'id' },
        { data: 'name' },
        { data: 'roles' },
        { data: 'created_at' },
        { data: '' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          orderable: false,
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          targets: 1,
          visible: false
        },
        {
          // remove ordering from Name
          targets: 2,
          // orderable: false
        },
        {
          targets: 3,
          render: function (e, t, a, s) {
              return  a.roles.map(data => 
                  (`<span class="badge rounded-pill badge-light-dark " text-capitalized>${data.name}</span>`)
                ).join(" ") ;
          },
        },
        {
          // Actions
          targets: -1,
          title: 'Hành động',
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<button class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#editPermissionModal" id="editPermission" data-id="'+full.id+'">' +
              feather.icons['edit'].toSvg({ class: 'font-medium-2 text-body' }) +
              '</i></button>' +
              '<button class="btn btn-sm btn-icon delete-record" id="deletePermission" data-id="'+full.id+'">' +
              feather.icons['trash'].toSvg({ class: 'font-medium-2 text-body' }) +
              '</button>'
            );
          }
        }
      ],
      order: [[1, 'asc']],
      dom:
        '<"d-flex justify-content-between align-items-center header-actions text-nowrap mx-1 row mt-75"' +
        '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
        '<"col-sm-12 col-lg-8"<"dt-action-buttons d-flex align-items-center justify-content-lg-end justify-content-center flex-md-nowrap flex-wrap"<"me-1"f>B>>' +
        '><"text-nowrap" t>' +
        '<"d-flex justify-content-between mx-2 row mb-1"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: 'Show _MENU_',
        search: 'Search',
        searchPlaceholder: 'Search..'
      },
      // Buttons with Dropdown
      buttons: [
        {
          text: 'Thêm mới quyền',
          className: 'add-new btn btn-primary mt-50',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#addPermissionModal'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
          }
        }
      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of Permission';
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      },
      language: {
        paginate: {
          // remove previous & next text from pagination
          previous: '&nbsp;',
          next: '&nbsp;'
        }
      },
      
    });
var  a = $("#addPermissionForm");
var response;
  $.validator.addMethod(
      "uniquePName", 
      function(value, element) {
          $.get('<?=  route("permission.list.api") ?>', function(dataR) {
              response =  dataR.some(e => e.name === value);
                  });
          return !response;
      },"Vai trò đã tồn tại!");
a.length && (a.validate({
          errorClass: "error",
          rules: {
              "name": { required: !0, uniquePName:true },
          },
      }),
      a.on("submit", function (e) {
          e.preventDefault();
          var s = a.valid();
          var form = this;
          if (s) {
          $.ajax({
              type:"POST",
              url:$(form).attr('action'),
              data: new FormData(form),
              processData: false,
              dataType:'json',
              contentType: false,
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              success: function(data){
                  if (data.code==0) {
                      $.each(data.error,function (prefix,val) {
                          $(form).find('span'+prefix+'_error').text(val[0]);
                      });
                  }else{
                      $(form)[0].reset();
                      $('#addPermissionModal').modal("hide");
                      table.ajax.reload();
                      toastr.success(data.msg)
                  }
              },
              error:function (error) {
                  console.log("Thêm không thành công",error);
              }
          });      
        }
      }))



// Delete permission
  $('body').on('click' ,'#deletePermission' , function(){
    var user_id = $(this).data("id");
    Swal.fire({
          title: "Bạn có chắc chắn?",
          text: "Bạn sẽ không thể hoàn tác!",
          icon: "warning",
          showCancelButton: !0,
          cancelButtonText: 'Quay lại',
          confirmButtonText: "Đúng, Xóa!",
          customClass: {
              confirmButton: "btn btn-primary",
              cancelButton: "btn btn-outline-danger ms-1",
          },
          buttonsStyling: !1,
          }).then(function (t) {
              if (t.value) {
                  $.ajax({
                      type:"DELETE",
                      url:"{{ route('permission.list.api') }}"+"/"+user_id,
                      headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                  success: function(){
                      table.ajax.reload();
                      toastr.success("Xóa Thành Công");
                  },
                  error:function () {
                      toastr.error("Xóa không Thành Công");
                  }
              })
              } 
          });

});
// get detail edit
$('body').on('click' ,'#editPermission' , function(){
    var permission_id = $(this).data("id");
    $.get('<?= route("permission.list.api") ?>'+"/show/"+permission_id , function (data) {
        var form = $('#editPermissionForm');
        form.find('input[name="id"]').val(data.id); 
        form.find('input[name="name"]').val(data.name);    

    },'json')
});
// submit edit in db
$('#editPermissionForm').on('submit', function(e){
    e.preventDefault();
    var form = this;
    $.ajax({
        type:"POST",
        url:$(form).attr('action'),
        data: new FormData(form),
        processData: false,
        dataType:'json',
        contentType: false,
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        success: function(data){
                $(form)[0].reset();
                $('#editPermissionModal').modal("hide");
                table.ajax.reload();
                toastr.success(data.msg)
        },
        error:function (error) {
            console.log("Sửa mới không thành công",error);
        }
    })
});



  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});

</script>

@endsection